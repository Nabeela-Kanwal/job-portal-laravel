<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(Request $request){
        $categories = category::where('status',1)->get();
        $jobTypes = JobType::where('status',1)->get();
        $jobs = Job::where('status',1);
        
        // Search Using Keywords
        if(!empty($request->keyword)){
            $jobs = $jobs->where(function($query) use ($request){
                $query->orWhere('title', 'like', '%' .$request->keyword. '%');
                $query->orWhere('keyword', 'like', '%' .$request->keyword. '%');
            });
        }

        // Search Using Location
        if(!empty($request->location)){
            $jobs = $jobs->where('location',$request->location);
        }

        // Search Using Category
        if(!empty($request->category)){
            $jobs = $jobs->where('category_id',$request->category);
        }

        // Search Using Job Type
        if(!empty($request->jobType)){
          $jobTypeArray =  explode(',',$request->jobType);
            $jobs = $jobs->whereIn('job_type_id',$jobTypeArray);
        }

         // Search Using experience
         if(!empty($request->experience)){
            $jobs = $jobs->where('experience',$request->experience);
        }

        $jobs =  $jobs->with(['jobType', 'category'])->orderBy('created_at', 'DESC')->paginate(9);


        return view('front.jobs',[
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs 
        ]);
    }
}
