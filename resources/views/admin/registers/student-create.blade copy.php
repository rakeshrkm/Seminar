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
                            {{-- <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Create</a></li> --}}
                            {{ Breadcrumbs::render('registers_create') }}
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
                        <h5> Add Students </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('registers.save') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="first_name">Name</label>
                                        <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" id="first_name" placeholder="Enter name">
                                        @if($errors->has('first_name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('first_name') }}</small>
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



                                    {{-- <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                                        @if($errors->has('last_name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('last_name') }}</small>
                                        @endif
                                    </div> --}}


                                    
                                    
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

                                    {{-- <div class="form-group">
                                        <label for="father_name">Father Name</label>
                                        <input type="father_name" class="form-control" name="father_name" id="father_name" placeholder="Enter father name">
                                        @if($errors->has('father_name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('father_name') }}</small>
                                        @endif
                                    </div>   --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Interested Course</label>
                                            <select class="form-control" id="course_id" name="course_id">
                                                <option value=" "> -- Select course -- </option>
                                                @foreach($courses as $key => $value)
                                                    <option value="{{ $value->id}}" {{ old('course_id') == $value ? 'selected' : ''}}> {{  $value->course_name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('id_type'))
                                                <small id="error" class="form-text text-muted text-danger">{{ $errors->first('id_type') }}</small>
                                            @endif
                                        </div>
                                    </div>

                           
                               
                                {{-- <div class="form-group">
                                    <label for="amount">Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter mother name">
                                    @if($errors->has('mother_name'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('mother_name') }}</small>
                                    @endif
                                </div>   --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Highest Qualification</label>
                                    <select class="form-control" id="highest_qualification" name="highest_qualification">
                                        <option value=" "> -- Select highest qualification -- </option>
                                        @foreach($highestQualification as $key => $value)
                                            <option value="{{ $value}}"  {{ old('highest_qualification') == $value ? 'selected' : ''}}> {{  $value }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('highest_qualification'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('highest_qualification') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="college">College / University Name</label>
                                    <input type="text" class="form-control" value="{{ old('college_university') }}" name="college_university" id="college_university" placeholder="Enter College / University">
                                    @if($errors->has('college_university'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('college_university') }}</small>
                                    @endif
                                </div> 
                            </div>   

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="college">College / University - Course Name</label>
                                    <input type="text" class="form-control" value="{{ old('college_university_course_name') }}" name="college_university_course_name" id="college_university_course_name" placeholder="Enter College / University Course Name">
                                    @if($errors->has('college_university_course_name'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('college_university_course_name') }}</small>
                                    @endif
                                </div> 
                            </div>   



                                {{-- <div class="form-group">
                                    <label>Occupation Status</label>
                                    <select class="form-control" id="current_status" name="current_status">
                                        <option value=" "> -- Select occupations -- </option>
                                        @foreach($occupations as $key => $value)
                                            <option value="{{ $value}}"> {{  $value }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('current_status'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('current_status') }}</small>
                                    @endif
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label>Id Type</label>
                                    <select class="form-control" id="id_type" name="id_type">
                                        <option value=" "> -- Select id type -- </option>
                                        @foreach($idType as $key => $value)
                                            <option value="{{ $value}}"> {{  $value }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('id_type'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('id_type') }}</small>
                                    @endif
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Id Proof Number</label>
                                        <input type="text" class="form-control" value="{{ old('id_proof_number') }}" name="id_proof_number" id="id_proof_number" placeholder="Enter id proof number">
                                        @if($errors->has('id_proof_number'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('id_proof_number') }}</small>
                                        @endif
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter address"> {{ old('address') }}</textarea>
                                        @if($errors->has('address'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('address') }}</small>
                                        @endif
                                    </div> 
                                </div> 

                                    <button type="submit" class="btn  btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
