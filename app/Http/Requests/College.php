<?php

namespace App\Http\Requests;

use App\Models\College as ModelsCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;

class College
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
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:colleges,name'
            ],
            'spokesperson' => [
                'required',
                'string',
                'max:255',
            ],
            'mobile' => [
                'required',
                'numeric',
                // 'max:10',
                // 'min:10',
                'unique:colleges,mobile'
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                'email',
                'unique:colleges,email'
            ],
            // 'address' => [
            //     'required',
            //     'string',
            //     'max:255'
            // ]


        ]);

        return $validator;
    }

    public function update(): ValidationValidator
    {
        $course = ModelsCollege::find($this->request->college->id);
        $validator = Validator::make($this->request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
             'spokesperson' => [
                'required',
                'string',
                'max:255',
            ],
            // 'mobile' => [
            //     'required',
            //     'numeric',
            //     'max:10',
            //     'min:10',
            //     Rule::unique('colleges', 'mobile')
            //         ->ignore($course->id, 'id')
            //         ->whereNull('deleted_at')
            // ],
            'email' => [
                'required',
                'email',
                Rule::unique('colleges', 'email')
                    ->ignore($course->id, 'id')
                    ->whereNull('deleted_at')
            ],
           
            // 'address' => [
            //     'required',
            //     'string',
            //     'max:255'
            // ]
            ]);
        return $validator;
    }
}
