@extends('front.layouts.app')

@section('content')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            @include('front.layouts.sidebar')

            <div class="col-lg-9">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <p class="mb-0 pb-0">{{ Session::get('success') }}</p>
                </div>
                @endif

                @if(Session::has('error'))
                <div class="alert alert-danger">
                    <p class="mb-0 pb-0">{{ Session::get('error') }}</p>
                </div>
                @endif

                <div class="col-lg-12">
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">My Jobs</h3>
                                </div>
                                <div style="margin-top: -10px;">
                                    <a href="{{ route('account.createJob') }}" class="btn btn-primary">Post a Job</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Job Created</th>
                                            <th scope="col">Applicants</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if($jobs->isNotEmpty())
                                            @foreach($jobs as $job)
                                                <tr class="active">
                                                    <td>
                                                        <div class="job-name fw-500">{{ $job->title }}</div>
                                                        <div class="info1">{{ $job->jobType->name}} .
                                                            {{ $job->location }}</div>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                                    <td>0 Applications</td>
                                                    <td>
                                                        @if($job->status == 1)
                                                        <div class="job-status text-capitalize">Active</div>
                                                        @else
                                                        <div class="job-status text-capitalize">Blocked</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="action-dots float-end">
                                                            <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="{{ route('jobDetail', $job->id) }}">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                </a></li>
                                                                <li><a class="dropdown-item" href="{{ route('account.editJob', $job->id) }}">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                                                </a></li>
                                                                <li><a class="dropdown-item" href="#" onclick="deleteJob({{  $job->id }})">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                                </a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">No jobs found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')

<script type="text/javascript">
    function deleteJob(jobId){
        if(confirm("Are your Sure You Want to delete? ")){
            $.ajax({
                url: '{{ route("account.deleteJob")}}',
                type: 'post',
                data: {jobId: jobId},
                dataType: 'json',
                success: function(response){
                    window.location.href='{{ route("account.myJobs") }}';

                }
            });

        }

    }
</script>

@endsection
