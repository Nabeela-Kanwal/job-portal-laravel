@extends('front.layouts.app')
@section('content')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
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
              <form action="{{ route("account.myJobs") }}" method="post" id="createJobForm" name="createJobForm">
              @csrf
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Job Details</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if($categories->isNotEmpty())
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                
                                <p></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                <select class="form-select" name="job_type_id" id="job_type_id">
                                    <option value="">Select a Job Type</option>
                                    @if($jobTypes->isNotEmpty())
                                    @foreach($jobTypes as $jobType)
                                    <option value="{{$jobType->id}}">{{$jobType->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                <p></p>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input type="text" placeholder="location" id="location" name="location" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                        </div>
                        
                        

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords</span></label>
                            <input type="text" placeholder="keyword" id="keyword" name="keyword" class="form-control">
                        </div>

                        
                        <div class="mb-4">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
                           <select name="experience" id="experience" class="form-control">
                            <option value="">Select a Job Experience</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Year</option>
                            <option value="3">3 Year</option>
                            <option value="4">4 Year</option>
                            <option value="5">5 Year</option>
                            <option value="6">6 Year</option>
                            <option value="7">7 Year</option>
                            <option value="8">8 Year</option>
                            <option value="9">9 Year</option>
                            <option value="10">10 Year</option>
                            <option value="10_plus">10+ years</option>
                        </select>
                        <p></p> 
                        </div>

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                <p></p>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input type="text" placeholder="Location" id="company_location" name="company_location" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input type="text" placeholder="Website" id="company_website" name="company_website" class="form-control">
                        </div>
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Save Job</button>
                    </div>               
            </div>
              </form>
                              
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')

<script type="text/javascript">

$("#createJobForm").submit(function(e){
    e.preventDefault();
    $("button[type='submit']").prop('disable', true);

    $.ajax({
        url: '{{ route("account.saveJob") }}',
        type: 'POST',
        dataType: 'json',
        data: $("#createJobForm").serializeArray(),
        success: function(respone){
        $("button[type='submit']").prop('disable', false);

            if(respone.status == true){
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


                    window.location.href = '{{ route("account.myJobs") }}';



            }else{
                var errors = respone.errors;
                if(errors.title){
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

                    if(errors.category_id){
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

                    if(errors.job_type_id){
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

                    if(errors.vacancy){
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

                    if(errors.salary){
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

                    if(errors.location){
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

                    if(errors.company_name){
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

                    if(errors.experience){
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
