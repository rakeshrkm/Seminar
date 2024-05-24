<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ConstantHelper;
use App\Models\College;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\College as Validator;

class CollegeController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $colleges = College::select('id','name','spokesperson','email','mobile','address','created_at')->orderBy('id','desc');
        if($search){
            $colleges->where(function($query) use ( $search){
                $query->where('name', 'like', "%{$search}%");
                $query->orWhere('spokesperson', 'like', "%{$search}%");
                $query->orWhere('email', 'like', "%{$search}%");
            });
        }

        $colleges =  $colleges->paginate(10);

        return view('admin.colleges.college-index', compact('colleges'));

    }
    public function create(){
        return view('admin.colleges.college-create');

    }
    public function save(Request $request){
        $validator = (new Validator($request))->store();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
       
        $college = new College();
        $college->fill($request->all());
        $college->save();
        return redirect()->route('college.index')->with("success", "College created !");
       
    }

    public function edit(College $college){
        return view('admin.colleges.college-edit', compact('college'));
    }

    public function update(Request $request, College $college){
      
        $validator = (new Validator($request))->update();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $dataCollege =  $college;
        $dataCollege->fill($request->all());
        $dataCollege->save();
        return redirect()->route('college.index')->with("success", "College updated !");

    }

    public function destroy(College $college){
        $college->delete();
        return redirect()->route('college.index')->with("error", "College deleted!");
    }
}
