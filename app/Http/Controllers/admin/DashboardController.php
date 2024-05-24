<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\StudentRegister;


class DashboardController extends Controller
{
    public function index(){
        $data['student_count'] = StudentRegister::select('id')->get()->count();
        $data['college_count'] = College::select('id')->get()->count();
        return view('admin.dashboard',compact('data'));
    }
}
