<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->with('user', 'applications')->paginate(10);
        return view('admin.jobs.job-list', compact('jobs'));
    }

    public function edit(Request $request, $id)
    {
        $categories = category::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobTypes = JobType::orderBy('name', 'ASC')->where('status', 1)->get();
        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $id,
        ])->first();
        if ($job == null) {
            abort(404);
        }
        return view('admin.jobs.edit', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'job' => $job

        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'job_type_id' => 'required|exists:job_types,id',
            'vacancy' => 'required',
            'salary' => 'required',
            'location' => 'required|max:50',
            'description' => 'required',
            'company_name' => 'required|min:3|max:75',
            'experience' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {

            $job = Job::find($id);
            $job->title = $request->title;
            $job->category_id = $request->category_id;
            $job->job_type_id = $request->job_type_id;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->benefits = $request->benefits;
            $job->responsibility = $request->responsibility;
            $job->qualifications = $request->qualifications;
            $job->keyword = $request->keyword;
            $job->experience = $request->experience;
            $job->company_name = $request->company_name;
            $job->company_location = $request->company_location;
            $job->company_website = $request->company_website;
            $job->status = $request->status;
            $job->is_featured = (!empty($request->is_featured)) ? $request->is_featured : 0;

            $job->save();

            session()->flash('success', 'Job Updated Successfully');

            return response()->json([
                'status' => true,
                'errors' => [],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $job = Job::findOrFail($id);

        if ($job == null) {
            session()->flash('error', 'Either Job Deleted Or Not Found');
            return response()->json([
                'status' => true
            ]);
        }
        Job::where('id', $request->jobId)->delete();
        session()->flash('success', 'Job Deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
