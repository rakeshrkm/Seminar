@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">College</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('college_edit') }}
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
                        <h5>Create Course</h5>
                    </div>
                    <div class="card-body">
                      
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('college.update', $college->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="collegeName">College Name <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="name" value="{{ $college->name }}" id="name" placeholder="Enter college name">
                                        @if($errors->has('name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile">Mobile <sup class="text-danger">*</sup></label>
                                        <input type="number" class="form-control" value="{{ $college->mobile }}" id="mobile" placeholder="Enter mobile">
                                        @if($errors->has('mobile'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('mobile') }}</small>
                                        @endif
                                    </div>     
                                    <div class="form-group">
                                        <label for="address">Address <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" value="{{ $college->address }}" name="address" id="address" placeholder="Enter address">
                                        @if($errors->has('address'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('address') }}</small>
                                        @endif
                                    </div>     
            
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_code">Spokes Person <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="spokesperson" value="{{ $college->spokesperson }}" id="spokesperson" placeholder="Enter spokes person">
                                    @if($errors->has('spokesperson'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('spokesperson') }}</small>
                                    @endif
                                </div>     
                                <div class="form-group">
                                    <label for="email">Email <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" value="{{ $college->email }}" name="email" id="email" placeholder="Enter email">
                                    @if($errors->has('email'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn  btn-primary float-right">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
