<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = category::where('status', 1)->orderBy('name', 'ASC')->take(8)->get();
        $newcategories = category::where('status', 1)->orderBy('name', 'ASC')->get();
        $featuredJobs = Job::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->with('jobType')
            ->where('is_featured', 1)->take(6)->get();

        $latestjobs = Job::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->with('jobType')
            ->take(6)->get();

        return view('front.home', [
            'categories' => $categories,
            'featuredJobs' => $featuredJobs,
            'latestjobs' =>  $latestjobs,
            'newcategories' => $newcategories,
        ]);
    }
}
