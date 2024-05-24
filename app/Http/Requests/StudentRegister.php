<?php

namespace App\Http\Requests;

use App\Models\StudentRegister as ModelsStudentRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Validation\Validator as ValidationValidator;

class StudentRegister
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store(): ValidationValidator
    {
        $requestAll = $this->request->all();

        $validator = Validator::make($requestAll, [
            'college_id' => [
                'required'
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'gender' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                'unique:student_registers,email'
            ],
            'mobile' => [
                'required',
                'numeric',
                'digits:10',
                'unique:student_registers,mobile'
            ],
            'current_course' => [
                'required',
                'string',
                'max:255'
            ],
            // 'course_name' => [
            //     'required',
            //     'string',
            //     'max:255'
            // ],
            'remarks' => [
                'required',
                'string',
                'max:255'
            ],
            'dob' => [
                'required',
                'before:today'
            ],

        ]);

        return $validator;
    }

    public function update(): ValidationValidator
    {
        $student = ModelsStudentRegister::find($this->request->studentRegister->id);
    
        $validator = Validator::make($this->request->all(), [
            'college_id' => [
                'required',
            ],
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('student_registers', 'email')
                    ->ignore($student->id, 'id')
                    ->whereNull('deleted_at')
            ],
            'mobile' => [
                'required',
                'string',
                'digits:10',
                Rule::unique('student_registers', 'mobile')
                    ->ignore($student->id, 'id')
                    ->whereNull('deleted_at')
            ],
           
            'dob' => [
                'required',
                'before:today'
            ],
            'gender' => [
                'required'
            ],
            'current_course' => [
                'required',
                'max:255'
            ],
            // 'course_name' => [
            //     'required',
            //     'max:255'
            // ],
            'remarks' => [
                'required',
                'max:255'
            ]
        ]);
    
        return $validator;
    }
    
}
