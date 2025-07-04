<?php

namespace App\Http\Controllers;

use App\Mail\JobNotificationEmail;
use App\Models\category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $categories = category::where('status', 1)->get();
        $jobTypes = JobType::where('status', 1)->get();
        $jobs = Job::where('status', 1);

        // Search Using Keywords
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function ($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keyword . '%');
                $query->orWhere('keyword', 'like', '%' . $request->keyword . '%');
            });
        }

        // Search Using Location
        if (!empty($request->location)) {
            $jobs = $jobs->where('location', $request->location);
        }

        // Search Using Category
        if (!empty($request->category)) {
            $jobs = $jobs->where('category_id', $request->category);
        }

        $jobTypeArray = [];
        // Search Using Job Type
        if (!empty($request->jobType)) {
            $jobTypeArray =  explode(',', $request->jobType);
            $jobs = $jobs->whereIn('job_type_id', $jobTypeArray);
        }


        // Search Using experience
        if (!empty($request->experience)) {
            $jobs = $jobs->where('experience', $request->experience);
        }

        if ($request->sort == '0') {
            $jobs = $jobs->orderBy('created_at', 'ASC');
        } else {
            $jobs = $jobs->orderBy('created_at', 'DESC');
        }
        $jobs =  $jobs->with(['jobType', 'category']);
        $jobs = $jobs->orderBy('created_at', 'DESC');
        $jobs = $jobs->paginate(9);


        return view('front.jobs', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray
        ]);
    }

    public function detail($id)
    {
        $job = Job::where([
            'id' => $id,
            'status' => 1
        ])->with(['jobType', 'category'])->first();
        if ($job == null) {
            abort(404);
        }

        $count = 0;
        if (Auth::user()) {
            $count = SavedJob::where([
                'user_id' => Auth::user()->id,
                'job_id' => $id,
            ])->count();
        }

        // fetch Applicants
        $applications =  JobApplication::where('job_id', $id)->with('user')->get();

        return view('front.jobDetail', [
            'job' => $job,
            'count' => $count,
            'applications' => $applications,
        ]);
    }
    public function applyJob(Request $request)
    {
        $id = $request->id;
        $job = Job::where('id', $id)->first();
        if ($job == null) {
            session()->flash('error', 'Job does not exist');
            return response()->json([
                'status' => false,
                'message' => "Job doesn't exist"
            ]);
        }

        // you canot apply on your own job

        $employee_id = $job->user_id;
        if ($employee_id == Auth::user()->id) {
            session()->flash('error', 'you canot apply on your own job');
            return response()->json([
                'status' => false,
                'message' => "you canot apply on your own job"
            ]);
        }
        // you cannt appply on a job twice
        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id,
        ])->count();
        if ($jobApplicationCount) {
        }

        $application = new JobApplication();
        $application->job_id = $id;
        $application->user_id = Auth::user()->id;
        $application->employee_id = $employee_id;
        $application->applied_date = now();
        $application->save();

        // send notification Email to employeer
        $employer = User::where('id', $employee_id)->first();
        $mailData = [
            'employer' => $employer,
            'user' => Auth::user(),
            'job' => $job,
        ];
        Mail::to($employer->email)->send(new JobNotificationEmail($mailData));

        session()->flash('success', 'you have Applied Successfully');
        return response()->json([
            'status' => true,
            'message' => "you have Applied Successfully"
        ]);
    }

    public function saveJobs(Request $request)
    {
        $id = $request->id;
        $job = Job::find($id);
        if ($job == null) {
            session()->flash('error', 'Job not found');
            return response()->json([
                'status' => false,
            ]);
        }
        // Check if user already saved the job

        $count = SavedJob::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id,
        ])->count();

        if ($count > 0) {
            session()->flash('error', 'You have already Saved this job');
            return response()->json([
                'status' => false,
            ]);
        }

        $savedJob = new SavedJob;
        $savedJob->job_id = $id;
        $savedJob->user_id = Auth::user()->id;
        $savedJob->save();
        session()->flash('success', 'You have successfully saved this job');
        return response()->json([
            'status' => true,
        ]);
    }
}
