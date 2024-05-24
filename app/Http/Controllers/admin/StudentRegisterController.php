<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ConstantHelper;
use App\Models\StudentRegister;
use App\Models\College;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StudentRegister as Validator;

class StudentRegisterController extends Controller
{
    public function index(Request $request){

        $studentRegisters = StudentRegister::with('getCollegeDetail')->select('id','college_id','name','email','mobile','gender','current_course','course_name','created_at');
        $search = $request->search;
        $genders=ConstantHelper::GENDER;
        $colleges = College::select('id','name')->get();
        
        if($search){
                $studentRegisters->where(function($query) use ( $search){
                    $query->where('first_name', 'like', "%{$search}%");
                    $query->orWhere('last_name', 'like', "%{$search}%");
                    $query->orWhere('email', 'like', "%{$search}%");
                    $query->orWhere('mobile', 'like', "%{$search}%");
                    $query->orWhere('gender', 'like', "%{$search}%");
                });
            }
            
            if($request->gender){
                $studentRegisters->where('gender', $request->gender);
            }

            if($request->college_id){
                $studentRegisters->where('college_id', $request->college_id);
            }

           
            $studentRegisters = $studentRegisters->paginate(10);


        
        

        // dd($studentRegisters);

        return view('admin.registers.student-index', compact('studentRegisters','genders','colleges'));

    }
    public function create(){
        $colleges = College::select('id','name')->get();
        $genders = ConstantHelper::GENDER;
        return view('admin.registers.student-create', compact('genders','colleges'));

    }
    public function save(Request $request){

        $validator = (new Validator($request))->store();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
           
            $data = new StudentRegister();
            $data->status = 1;
            $data->fill($request->all());
            $data->save();
           
            return redirect()->route('registers.index')->with('success', 'Student created');
        } catch (\Exception $e) {
            return redirect()->route('registers.index')->with('error', "Course not Created $e");
        }

    }

    public function edit(StudentRegister $studentRegister){
        $colleges = College::select('id','name')->get();
        $genders=ConstantHelper::GENDER;
        return view('admin.registers.student-edit', compact('genders','studentRegister','colleges'));
    }

    public function update(Request $request, StudentRegister $studentRegister){

        try {
            $validator = (new Validator($request))->update();
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            
        $dataStudentRegister =  $studentRegister;
        $dataStudentRegister->status = '1';
        $dataStudentRegister->fill($request->all());
        $dataStudentRegister->save();
        if( $dataStudentRegister){
            return redirect()->route('registers.index')->with('success', 'Student Register updated Successfully');
        }
        } catch (\Exception $e) {
            return redirect()->route('registers.index')->with('error', "Student Register not updated Successfully $e");
        }

    }

    public function show(StudentRegister $studentRegister){
        $data = $studentRegister->load('getCollegeDetail');
        return view('admin.registers.student-show', compact('data'));
    }

    public function destroy(StudentRegister $studentRegister){
        $studentRegister->delete();
        return redirect()->route('registers.index')->with("success", "Student record deleted");
    }
}
