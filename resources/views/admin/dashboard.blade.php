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
                @include('admin.sidebar')
                <div class="col-lg-9">

                    @include('front.message')

                    <div class="card border-0 shadow mb-4" style="min-height: 500px;">
                        <div class="card-body p-4 d-flex justify-content-center align-items-center">
                            <h3 class="fs-4 mb-1">Welcome Amin!</h3>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
