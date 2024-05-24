@extends('admin.layouts.masters')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <!--<div class="page-header">-->
        <!--    <div class="page-block">-->
        <!--        <div class="row align-items-center">-->
        <!--            <div class="col-md-12">-->
        <!--                <div class="page-header-title">-->
        <!--                    <h5 class="m-b-10">Students</h5>-->
        <!--                </div>-->
        <!--                <ul class="breadcrumb">-->
        <!--                    {{-- <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>-->
        <!--                    <li class="breadcrumb-item"><a href="#!">Create</a></li> --}}-->
        <!--                    {{ Breadcrumbs::render('registers_create') }}-->
        <!--                </ul>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="text-align:center;">
                        <h3 >Registration</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('registers.save') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name">
                                        @if($errors->has('name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Enter email">
                                    @if($errors->has('email'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>    
                            </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="mobile" class="form-control" value="{{ old('mobile') }}" name="mobile" id="mobile" placeholder="Enter mobile">
                                            @if($errors->has('mobile'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('mobile') }}</small>
                                            @endif
                                        </div> 
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" class="form-control" value="{{ old('dob') }}" name="dob" id="dob" placeholder="Enter dob">
                                            @if($errors->has('dob'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('dob') }}</small>
                                            @endif
                                        </div> 
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value=" "> -- Select gender -- </option>
                                                @foreach($genders as $key => $value)
                                                    <option value="{{ $value}}" {{ old('gender') == $value ? 'selected' : ''}}> {{  $value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('gender'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('gender') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label>College / University Name </label>
                                            <select class="form-control" id="college_id" name="college_id">
                                                <option value=" "> -- Select college -- </option>
                                                @foreach($colleges as $key => $value)
                                                    <option value="{{ $value->id}}"> {{  $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('college_id'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('college_id') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="college">Pursuing Course Name</label>
                                            <input type="text" class="form-control" value="{{ old('current_course') }}" name="current_course" id="current_course" placeholder="Current Course">
                                            @if($errors->has('current_course'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('current_course') }}</small>
                                            @endif
                                        </div> 
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Course Name</label>
                                            <input type="text" class="form-control" value="{{ old('course_name') }}" name="course_name" id="course_name" placeholder="Enter course name">
                                            @if($errors->has('course_name'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_name') }}</small>
                                            @endif
                                        </div>  
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter remarks"> {{ old('remarks') }}</textarea>
                                            @if($errors->has('remarks'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('remarks') }}</small>
                                            @endif
                                        </div> 
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
