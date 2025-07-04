@extends('front.layouts.app')
@section('content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.job.list', $job->id) }}">Jobs</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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

                            <form action="{{ route('account.myJobs') }}" method="post" id="editJobForm" name="editJobForm">
                                @csrf
                                <div class="card-body card-form p-4">
                                    <h3 class="fs-4 mb-1">Job Details</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="" class="mb-2">Title<span class="req">*</span></label>
                                            <input type="text" value="{{ $job->title }}"placeholder="Job Title"
                                                id="title" name="title" class="form-control">
                                            <p></p>
                                        </div>
                                        <div class="col-md-6  mb-4">
                                            <label for="" class="mb-2">Category<span
                                                    class="req">*</span></label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Select a Category</option>
                                                @if ($categories->isNotEmpty())
                                                    @foreach ($categories as $category)
                                                        <option {{ $job->category_id == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}"> {{ $category->name }} </option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="" class="mb-2">Job Type<span
                                                    class="req">*</span></label>
                                            <select class="form-select" name="job_type_id" id="job_type_id">
                                                <option value="">Select a Job Type</option>
                                                @if ($jobTypes->isNotEmpty())
                                                    @foreach ($jobTypes as $jobType)
                                                        <option {{ $job->job_type_id == $jobType->id ? 'selected' : '' }}
                                                            value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p></p>
                                        </div>
                                        <div class="col-md-6  mb-4">
                                            <label for="" class="mb-2">Vacancy<span
                                                    class="req">*</span></label>
                                            <input type="number" min="1" value="{{ $job->vacancy }}"
                                                placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Salary</label>
                                            <input type="text" value="{{ $job->salary }}" placeholder="Salary"
                                                id="salary" name="salary" class="form-control">
                                            <p></p>
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Location<span
                                                    class="req">*</span></label>
                                            <input type="text" value="{{ $job->location }}" placeholder="location"
                                                id="location" name="location" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <div class="form-check">
                                                <input {{ $job->is_featured == 1 ? 'checked' : '' }}
                                                    class="form-check-input" type="checkbox" value="1" id="is_featured"
                                                    name="is_featured">

                                                <label class="form-check-label" for="is_featured">
                                                    Featured
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <div class="form-check-inline">
                                                <input {{ $job->status == 1 ? 'checked' : '' }} class="form-check-input"
                                                    type="radio" value="1" id="status-active" name="status">
                                                <label class="form-check-label" for="status-active">
                                                    <label class="form-check-label" for="status">
                                                        Active
                                                    </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <input {{ $job->status == 0 ? 'checked' : '' }} class="form-check-input"
                                                    type="radio" value="0" id="status-block" name="status">
                                                <label class="form-check-label" for="status">
                                                    Block
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Description<span
                                                class="req">*</span></label>
                                        <textarea class="teaxtarea" name="description" id="description" cols="5" rows="5"
                                            placeholder="Description">{{ $job->description }}</textarea>
                                        <p></p>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Benefits</label>
                                        <textarea class="teaxtarea" value="{{ $job->benefits }}" name="benefits" id="benefits" cols="5"
                                            rows="5" placeholder="Benefits"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Responsibility</label>
                                        <textarea class="teaxtarea" name="responsibility" id="responsibility" cols="5" rows="5"
                                            placeholder="Responsibility">{{ $job->responsibility }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Qualifications</label>
                                        <textarea class="teaxtarea" value="{{ $job->benefits }}" name="qualifications" id="qualifications" cols="5"
                                            rows="5" placeholder="qualifications"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="mb-2">Keywords</span></label>
                                        <input type="text" value="{{ $job->keyword }}" placeholder="keyword"
                                            id="keyword" name="keyword" class="form-control">
                                    </div>


                                    <div class="mb-4">
                                        <label for="" class="mb-2">Experience<span
                                                class="req">*</span></label>
                                        <select name="experience" id="experience" class="form-control">
                                            <option value="">Select a Job Experience</option>
                                            <option value="1" {{ $job->experience == 1 ? 'selected' : '' }}>1
                                                Year</option>
                                            <option value="2" {{ $job->experience == 2 ? 'selected' : '' }}>2
                                                Year</option>
                                            <option value="3" {{ $job->experience == 3 ? 'selected' : '' }}>3
                                                Year</option>
                                            <option value="4" {{ $job->experience == 4 ? 'selected' : '' }}>4
                                                Year</option>
                                            <option value="5" {{ $job->experience == 5 ? 'selected' : '' }}>5
                                                Year</option>
                                            <option value="6" {{ $job->experience == 6 ? 'selected' : '' }}>6
                                                Year</option>
                                            <option value="7" {{ $job->experience == 7 ? 'selected' : '' }}>7
                                                Year</option>
                                            <option value="8" {{ $job->experience == 8 ? 'selected' : '' }}>8
                                                Year</option>
                                            <option value="9" {{ $job->experience == 9 ? 'selected' : '' }}>9
                                                Year</option>
                                            <option value="10" {{ $job->experience == 10 ? 'selected' : '' }}>
                                                10
                                                Year</option>
                                            <option value="10_plus" {{ $job->experience == '10_plus' ? 'selected' : '' }}>
                                                10+ years
                                            </option>
                                        </select>
                                        <p></p>
                                    </div>

                                    <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Name<span
                                                    class="req">*</span></label>
                                            <input type="text" value="{{ $job->company_name }}"
                                                placeholder="Company Name" id="company_name" name="company_name"
                                                class="form-control">
                                            <p></p>
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Location</label>
                                            <input type="text" value="{{ $job->company_location }}"
                                                placeholder="Location" id="company_location" name="company_location"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="mb-2">Website</label>
                                        <input type="text" value="{{ $job->company_website }}" placeholder="Website"
                                            id="company_website" name="company_website" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer  p-4">
                                    <button type="submit" class="btn btn-primary">Update Job</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#editJobForm").submit(function(e) {
            e.preventDefault();
            $("button[type='submit']").prop('disable', true);

            $.ajax({
                url: '{{ route('admin.job.update', $job->id) }}',
                type: 'PUT',
                dataType: 'json',
                data: $("#editJobForm").serializeArray(),
                success: function(respone) {
                    $("button[type='submit']").prop('disable', false);

                    if (respone.status == true) {

                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#category_id").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#job_type_id").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#vacancy").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#salary").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#company_name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#experience").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');


                        window.location.href = '{{ route('admin.job.list') }}';



                    } else {
                        var errors = respone.errors;
                        if (errors.title) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.title[0]);
                        } else {
                            $("#title").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.category_id) {
                            $("#category_id").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.category_id[0]);
                        } else {
                            $("#category_id").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.job_type_id) {
                            $("#job_type_id").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.job_type_id[0]);
                        } else {
                            $("#job_type_id").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.vacancy) {
                            $("#vacancy").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.vacancy[0]);
                        } else {
                            $("#vacancy").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.salary) {
                            $("#salary").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.salary[0]);
                        } else {
                            $("#salary").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.location) {
                            $("#location").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.location[0]);
                        } else {
                            $("#location").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.company_name) {
                            $("#company_name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_name[0]);
                        } else {
                            $("#company_name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }

                        if (errors.experience) {
                            $("#experience").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.experience[0]);
                        } else {
                            $("#experience").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                    }
                }
            })
        });
    </script>
@endsection
