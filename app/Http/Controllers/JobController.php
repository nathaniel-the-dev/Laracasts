<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobPosting;
use App\Mail\JobPosted;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->latest()->simplePaginate(6); // Gets paginated jobs

        return view('jobs.index', [
            'title' => 'Jobs',
            'jobs' => $jobs
        ]);
    }
    public function show(Job $job)
    {
        return view('jobs.show', [
            'title' => $job['title'],
            'job' => $job,
        ]);
    }
    public function create()
    {
        return view('jobs.create');
    }

    public function store(StoreJobPosting $request)
    {
        // Save
        $job = Job::store($request);

        // // Send mail
        // \Illuminate\Support\Facades\Mail::to($job->company->user->email)->queue(new JobPosted($job)); // Add mail to queue

        // Redirect
        return redirect('/jobs');
    }

    public function edit(Job $job)
    {

        // Gate::authorize('job.edit', $job); //? Gate defined in AppServiceProvider
        // or
        // if (Auth::user()->can('job.edit')) {

        // }

        // if (Auth::guest()) {
        //     return redirect('/login');
        //     return redirect()->route('login');
        // }

        return view('jobs.edit', [
            'job' => $job,
        ]);
    }
    public function update(StoreJobPosting $request, Job $job)
    {
        // Update
        $job->edit($request);

        // Redirect
        return redirect("/jobs/$job->id");
    }
    public function destroy(Job $job)
    {
        // TODO Authorize

        // Delete
        $job->delete();

        // Redirect
        return redirect("/jobs");
    }
}
