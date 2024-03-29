<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingApplications = Application::where('status', 'pending')->paginate(10);
        $paidApplications = Application::where('status','approved')->where('paid_for', true)->paginate(10);
        $unpaidApplications = Application::where('status', 'approved')->where('paid_for', false)->paginate(10);
        $rejectedApplications = Application::where('status', 'rejected')->where('paid_for', false)->paginate(10);

        return view('admin.applications.index', compact('pendingApplications', 'paidApplications', 'unpaidApplications', 'rejectedApplications'));
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
    public function store(StoreApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
