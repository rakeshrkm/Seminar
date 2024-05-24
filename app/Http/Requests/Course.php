<?php

namespace App\Http\Requests;

use App\Models\Course as ModelsCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;

class Course
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
            'course_name' => [
                'required',
                'string',
                'max:255',
                'unique:courses,course_name'
            ],
            'course_code' => [
                'required',
                'string',
                'max:255',
                'unique:courses,course_code'
            ],
            'payment_type' => [
                'required',
                'string',
                'max:255'
            ],
            'amount' => [
                'required',
                'string',
                'max:255'
            ],
            'course_time' => [
                'required',
                'string',
                'max:255'
            ]


        ]);

        return $validator;
    }

    public function update(): ValidationValidator
    {
        $course = ModelsCourse::find($this->request->course->id);
        $validator = Validator::make($this->request->all(), [
            'course_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'course_name')
                    ->ignore($course->id, 'id')
                    ->whereNull('deleted_at')
            ],
            'course_code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'course_code')
                    ->ignore($course->id, 'id')
                    ->whereNull('deleted_at')
            ],
            'payment_type' => [
                'required',
                'string',
                'max:255'
            ],
            'amount' => [
                'required',
                'string',
                'max:255'
            ],
            'course_time' => [
                'required',
                'string',
                'max:255'
            ]

            ]);
        return $validator;
    }
}
