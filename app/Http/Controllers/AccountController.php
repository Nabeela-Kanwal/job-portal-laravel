<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreJobRequest;
use App\Mail\resetPasswordEmail;
use App\Models\category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class AccountController extends Controller
{
    public function registration()
    {
        return view('front.account.registration');
    }

    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->confirm_password = $request->confirm_password;
            $user->save();

            session()->flash('success', 'You have registered Successfully');

            return response()->json([
                'status' => true,
                'errors' => [],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.login')->with('error', 'Invalid Email Or Password');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput($request->only('email'))
                ->withErrors($validator);
        }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('front.account.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,' . $id . ',id',


        ]);

        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->designation = $request->designation;
            $user->mobile = $request->mobile;
            $user->save();

            session()->flash('success', 'User Information Updated Successfully');

            return response()->json([
                'status' => true,
                'errors' => [],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function updateProfilePic(Request $request)
    {
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if ($validator->passes()) {
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $imageName = $id . '-' . time() . '.' . $extension;
            $image->move(public_path('/profile-pic'), $imageName);
            User::where('id', $id)->update(['image' => $imageName]);


            session()->flash('success', 'Profile Picture Updated Successfully');

            return response()->json([
                'status' => true,
                'errors' => [],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }

    public function createJob()
    {
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobTypes = JobType::orderBy('name', 'ASC')->where('status', 1)->get();
        return view('front.account.job.createJob', [
            'categories' => $categories,
            'jobTypes' => $jobTypes
        ]);
    }


    public function saveJob(Request $request)
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

            $job = new Job();
            $job->title = $request->title;
            $job->category_id = $request->category_id;
            $job->job_type_id = $request->job_type_id;
            $job->user_id = Auth::user()->id;
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
            $job->save();

            session()->flash('success', 'Job Created Successfully');

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


    public function myJobs()
    {
        $jobs = Job::where('user_id', Auth::user()->id)->with('jobType')->paginate(10);
        return view('front.account.job.myJobs', [
            'jobs' => $jobs
        ]);
    }

    public function editJob(Request $request, $id)
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
        return view('front.account.job.editJob', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'job' => $job

        ]);
    }

    public function updateJob(Request $request, $id)
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
            $job->user_id = Auth::user()->id;
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

    public function deleteJob(Request $request)
    {
        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $request->jobId,
        ])->first();

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
    public function myJobApplications()
    {
        $jobApplications = JobApplication::where(
            'user_id',
            Auth::user()->id
        )
            ->with(['job', 'job.jobType', 'job.applications'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('front.account.job.myJobApplications', [
            'jobApplications' => $jobApplications
        ]);
    }

    public function removeJob(Request $request)
    {
        $jobApplications = JobApplication::where([
            'id' => $request->id,
            'user_id' => Auth::user()->id
        ])->first();

        if ($jobApplications == null) {
            session()->flash('error', 'Job Application not found');
            return response()->json([
                'status' => false,
            ]);
        }

        JobApplication::find($request->id)->delete();
        session()->flash('success', 'Job Application is removed sucessfully');
        return response()->json([
            'status' => true,
        ]);
    }

    public function savedJob()
    {
        $savedJobs = SavedJob::where('user_id', Auth::id())
            ->with(['job', 'job.jobType', 'job.applications'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('front.account.job.savedJob', compact('savedJobs'));
    }

    public function removeSavedJob(Request $request)
    {
        $savedJobs = SavedJob::where([
            'id' => $request->id,
            'user_id' => Auth::user()->id
        ])->first();

        if ($savedJobs == null) {
            session()->flash('error', 'Job Application not found');
            return response()->json([
                'status' => false,
            ]);
        }

        SavedJob::find($request->id)->delete();
        session()->flash('success', 'Job Application is removed sucessfully');
        return response()->json([
            'status' => true,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
        if (Hash::check($request->old_password, Auth::user()->password) == false) {
            session()->flash('error', 'Your Old Password is incorrect');
            return response()->json([
                'status' => true,

            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        session()->flash('success', 'Your Password is updated Successfully');
        return response()->json([
            'status' => true,
        ]);
    }
    public function forgotPassword()
    {
        return view('front.account.forgot-password');
    }

    public function processForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) {
            return redirect()->route('account.forgot.password')->withInput()->withErrors($validator);
        }

        $token = Str::random(60);
        \DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        \DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),

        ]);

        // send email
        $user = User::where('email', $request->email)->first();
        $mailData = [
            'token' => $token,
            'user' => $user,
            'subject' => "You have requested to change your password",
        ];
        Mail::to($request->email)->send(new resetPasswordEmail($mailData));

        return redirect()->route('account.forgot.password')->with('success', 'Reset Password email has been send, please check your inbox');
    }


    public function resetPassword($tokenString)
    {
        $token = \DB::table('password_reset_tokens')->where('token', $tokenString)->first();
        if ($token == null) {
            return redirect()->route('account.forgot.password')->with('error', 'Invalid Token');
        }

        return view('front.account.reset-password', compact('tokenString'));
    }

    public function processResetPassword(Request $request)
    {
        $token = \DB::table('password_reset_tokens')->where('token', $request->token)->first();
        if ($token == null) {

            return redirect()->route('account.forgot.password')->with('error', 'Invalid Token');
        }
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',


        ]);
        if ($validator->fails()) {
            return redirect()->route('account.reset.password', $request->token)->withErrors($validator);
        }

        User::where('email', $token->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

            return redirect()->route('account.login')->with('success', 'Password Updated Successfully');

    }
}
