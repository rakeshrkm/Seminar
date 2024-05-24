@extends('admin.layouts.master', ['title' => 'Student Register'])
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
                            {{ Breadcrumbs::render('registers') }}
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
                       
                        <div class="float-left">
                            <h5>Students Lists</h5>
                            <form method="get">
                                
                            <input type="text" class="" value="{{request('search')}}" name="search"  />
                            <select  id="gender" name="gender" style="height:27px;">
                                <option value=" "> -- Select gender -- </option>
                                @foreach($genders as $key => $value)
                                    <option value="{{ $value}}" {{ request('gender') == $value ? 'selected' : ''}}> {{  $value }}</option>
                                @endforeach
                            </select>
                            <select  id="college" name="college_id" style="height:27px;">
                                <option value=" "> -- Select College -- </option>
                                @foreach($colleges as $key => $value)
                                    <option value="{{ $value->id}}" {{ request('college_id') == $value->id ? 'selected' : ''}}> {{  $value->name }}</option>
                                @endforeach
                            </select>
                                <button type="submit" class="btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                        <a href="{{ route('registers.create') }}" class="btn btn-md btn-primary float-right">Add New Students</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                                @endif
                                @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                                @endif
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sr No. </th>
                                            <th>Name</th>
                                            <th>Pursusing Course</th>
                                          
                                            <th>Email</th>
                                            <th>Mobile</th>
                                              <th>College</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($studentRegisters as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name}}</td>
                                                <td class="text-wrap">{{ $value->current_course }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->mobile }}</td>
                                                <td class="text-wrap">{{ $value->getCollegeDetails->name  }}</td>
                                                <td>{{ date_format($value->created_at, 'd-m-Y')  }}</td>
                                                <td>
                                                    <a href="{{ url('/registers/edit/'.$value->id) }}"> <i class="nav-icon fas fa-edit"></i> </a>
                                                    <a href="{{ url('/registers/destory/'.$value->id) }}" class="text-danger"><i class="nav-icon fas fa-trash"></i></a>
                                                    <a href="{{ url('/registers/show/'.$value->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" ><span class="text-danger text-center"> No Record Found</span></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$studentRegisters->withQueryString()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
