<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.all', [
            'title' => 'All Jobs',
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jobs.new", [
            'title' => 'Post a New Job'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewJobRequest $request)
    {
        // For More Protection
        $validated = $request->safe()->only(['title', 'company', 'description', 'location', 'website', 'logo', 'email', 'tags']);

        // Upload logo to file
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Set the user_id column to the current auth user id
        $validated['user_id'] = auth()->id();

        Job::create($validated);

        return redirect()->route('jobs.index')->with('message', 'Job Posted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.single', [
            'title' => $job->title,
            'job' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'title' => 'Edit Job',
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        // Check if the real author making this request
        if ($job->user_id !== auth()->id()) {
            abort(401);
        }

        // For More Protection
        $validated = $request->validate([
            "title" => 'required|max:255',
            'company' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'website' => 'required|url',
            'logo' => 'image|max:5120|mimes:jpg,png,jpeg',
            'email' => 'required|email',
            'tags' => 'required'
        ]);

        // Upload logo to file
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $job->update($validated);

        return redirect()->route('jobs.show', $job->id)->with('message', 'Job Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        // Check if the real author making this request
        if ($job->user_id !== auth()->id()) {
            abort(401);
        }

        // Delete the corresponding logo image as well to free some space
        if (File::exists(public_path('storage/' . $job->logo))) {
            File::delete(public_path('storage/' . $job->logo));
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('message', 'Yay! Job Deleted 🥳');
    }

    /**
     * Display page to manage authenticated user's jobs
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        return view("jobs.manage", [
            "title" => 'Manage Your Jobs',
            "jobs" => auth()->user()->jobs()->get(),
        ]);
    }
}
