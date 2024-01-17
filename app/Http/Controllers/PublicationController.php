<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest = Publication::latest()->take(2)->get();
        $news = Publication::whereNotIn('id', $latest->pluck('id'))->latest()->paginate(4);
        $firstLatest = $latest->first();
        $secondLatest = $latest->skip(1)->first();
        return view('publications.index', compact('news', 'latest', 'firstLatest', 'secondLatest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request)
    {
        $request->validated();

        $publication = Publication::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'overview' => $request->input('overview'),
            'body' => $request->input('body'),
            'active' => $request->input('active'),
            'user_id' => Auth::user()->id
        ]);

        if (!is_null($request->input('category_id'))) {
            $publication->forceFill([
                'category_id' => $request->input('category_id')
            ])->save();
        }

        if ($request->hasfile('featured_image')) {
            $publication->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }
        return redirect(route('publications.show', ['publications' => $publication]));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
