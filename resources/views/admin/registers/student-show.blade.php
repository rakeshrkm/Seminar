@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Students</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('registers_view') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Students Details -  {{$data->name}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>  Pursuing Course Name : {{$data->current_course}}</h5>
                            </div>
                    </div>
                    <div class="card-body mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label> Name : </label> {{ $data->name }}
                            </div>
                            <div class="col-md-4">
                                <label> Email : </label> {{ $data->email }}
                            </div>
                            <div class="col-md-4">
                                <label> Mobile : </label> {{ $data->mobile }}
                            </div>
                            <div class="col-md-4 mt-4">
                                <label> Gender : </label> {{ ucwords($data->gender) }}
                            </div>
                            <div class="col-md-4 mt-4">
                                <label> DOB : </label> {{date_format (new DateTime($data->dob), 'd-m-Y')}}
                            </div>
                            <div class="col-md-4 mt-4">
                                <label> Pursuing Course Name : </label> {{ ucfirst($data->current_course) }}
                            </div>
                            {{-- <div class="col-md-4 mt-4">
                                <label>Course Name : </label> {{ ucfirst($data->course_name) }}
                            </div> --}}
                            <div class="col-md-12 mt-4">
                                <label> College / University Name : </label> {{ ucwords($data->getCollegeDetail->name) }}
                            </div>
                            
                            <div class="col-md-12 mt-4">
                                <label> Remarks : </label> {{ $data->remarks }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
