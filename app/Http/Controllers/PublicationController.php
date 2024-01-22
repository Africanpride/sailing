<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // display publications on front-end

        $publications = Publication::all();
        $latest = Publication::latest()->take(2)->get();
        $news = Publication::whereNotIn('id', $latest->pluck('id'))->latest()->paginate(4);
        $firstLatest = $latest->first();
        $secondLatest = $latest->skip(1)->first();
        return view('publications.index', compact('news', 'latest', 'firstLatest', 'secondLatest', 'publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // dd(Auth::user()->UserRole);

        if(!Auth::check()) {
           return redirect()->route('login');
        }
        // Allow to create article for approval if allowed
        abort_if(!Auth::user()->isAdmin, 403, __("You cannot create a publication."));
        $categories = Category::all();
        return view('publications.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // StorePublicationRequest
    public function store(StorePublicationRequest $request)
    {

        // dd($request->all());
        $request->validated();

        $defaultCategoryId = 1;

        $publication = Publication::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'overview' => $request->input('overview'),
            'body' => $request->input('body'),
            'active' => $request->input('active'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id', $defaultCategoryId), // Use provided category_id or default
        ]);



        if ($request->hasfile('featured_image')) {
            $publication->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }


        return redirect()->route('publications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $publication = Publication::where('slug', $slug)->firstOrFail();
        $latestPublication = Publication::with('author')->with('media')->orderBy('created_at', 'DESC')->where('id', '!=', $publication->id)->take(3)->get();


        return view(
            'publications.show',
            [
                'publication' => $publication,
                'latestPublication' => $latestPublication
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $categories = Category::all();
        return view('publications.edit', compact('publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, Publication $publication): RedirectResponse
    {
        $validated = $request->validated();

        // Update publication fields
        $publication->update($validated);

        // Handle featured_image update
        if ($request->hasFile('featured_image')) {
            // Remove existing media
            $publication->clearMediaCollection('featured_image');

            // Add new media
            $publication->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }

        return redirect()->route('publications.index');
    }


    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Publication $publication)
    {
        // Check if the user is an admin or the author of the publication
        if (Auth::user()->isAdmin || Auth::user()->id == $publication->user_id) {
            // User has the necessary permissions to delete
            $publication->delete();
            return redirect()->route('publications.index');
        } else {
            // User does not have the necessary permissions
            return abort(403, 'Unauthorized action.');
        }
    }

}
