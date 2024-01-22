<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(!Auth::check()) {
            return redirect()->route('login');
         }

        //  if (! Gate::allows('update-post', $post)) {
        //     abort(403);
        // }

         // Allow to create article for approval if allowed
         abort_if(!Auth::user()->isAdmin, 403, __("You cannot create a publication."));

        $announcements = Announcement::with('author')->orderBy('created_at', 'DESC')->paginate(8);

        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
