@extends('front.layouts.app')
@section('content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="row">
                @include('admin.sidebar')
                <div class="col-lg-9">
                    @include('front.message')
                    <div class="card border-0 shadow p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">Jobs</h3>
                                </div>
                                <div style="margin-top: -10px;">
                                    {{-- <a href="{{ route('account.createJob') }}" class="btn btn-primary">Post a Job</a> --}}
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Employer</th>
                                            <th scope="col">Applied Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if ($applications->isNotEmpty())
                                            @foreach ($applications as $application)
                                                <tr class="active">
                                                    <td>{{ $application->job->title }}</td>
                                                    <td>{{ $application->user->name }}</td>

                                                    <td>{{ $application->employee->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($application->applied_date)->format('d, M Y') }}</td>

                                                    <td>
                                                        <div class="action-dots float-end">
                                                            <button href="#" class="btn" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                {{-- <a class="dropdown-item"
                                                                    href="{{ route('admin.jobApplication.edit', $application->id) }}">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                                                </a> --}}

                                                                <li>
                                                                    <a class="dropdown-item" href="#"
                                                                        onclick="deleteJobApplications({{ $application->id }})">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">No User found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $applications->links() }}
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
        function deleteJobApplications(id) {
            if (confirm("Are you sure you want to delete this job?")) {
                $.ajax({
                    url: '{{ route('admin.jobApplication.delete') }}',
                    type: 'DELETE',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            window.location.href = '{{ route('admin.jobApplication.list') }}';
                        } else {
                            alert('Job not found.');
                        }
                    }
                });
            }
        }
    </script>
@endsection
