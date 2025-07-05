<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::orderBy('id', 'desc')->with('job', 'user', 'employee')->paginate(10);
        return view('admin.jobApplications.job-application-list', compact('applications'));
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $job = JobApplication::find($id);

        if ($job == null) {
            session()->flash('error', 'Either Job Deleted Or Not Found');
            return response()->json([
                'status' => false
            ]);
        }

        $job->delete();

        session()->flash('success', 'Job Deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
