<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ConstantHelper;
use App\Models\Course;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Course as Validator;

class CourseController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $paymentTypes=ConstantHelper::PAYMENT_TYPE;
        $courses = Course::select('id','course_name','course_code','payment_type','amount','course_time','created_at')->orderBy('id','desc');
        if($search){
            $courses->where(function($query) use ( $search){
                $query->where('course_name', 'like', "%{$search}%");
                $query->orWhere('course_code', 'like', "%{$search}%");
                $query->orWhere('payment_type', 'like', "%{$search}%");
                $query->orWhere('course_time', 'like', "%{$search}%");
            });
        }

        if($request->payment_type){
            $courses->where('gender', $request->gender);
        }

        $courses =  $courses->paginate(10);

        return view('admin.courses.course-index', compact('courses','paymentTypes'));

    }
    public function create(){

        $paymentTypes=ConstantHelper::PAYMENT_TYPE;
        return view('admin.courses.course-create',compact('paymentTypes'));

    }
    public function save(Request $request){


        $validator = (new Validator($request))->store();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        
       
        $course = new Course();
        $course->fill($request->all());
        $course->status = 1;
        $course->save();
        return redirect()->route('courses.index')->with("success", "Course created !");
       
    }

    public function edit(Course $course){
        $paymentTypes = ConstantHelper::PAYMENT_TYPE;
        return view('admin.courses.course-edit', compact('course','paymentTypes'));
    }

    public function update(Request $request, Course $course){
      
      
        $validator = (new Validator($request))->update();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        
       

        $dataCourse =  $course;
        $dataCourse->fill($request->all());
        $dataCourse->save();
        return redirect()->route('courses.index')->with("success", "Course updated !");

    }

    public function destroy(Course $course){
        $course->delete();
        return redirect()->route('courses.index')->with("error", "Course deleted!");
    }
}
