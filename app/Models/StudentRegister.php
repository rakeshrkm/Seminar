<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentRegister extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seminar_registrations';
    protected $fillable = [
        'college_id',
        'name',
         'email',
         'mobile',
         'dob',
         'gender',
         'current_course',
         'course_name',
         'remarks',
         'status'
        ];

    
    public function setFirstNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }


    public static function boot()
    {
        parent::boot();
        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by = auth()->user()->id;
            });

            static::updating(function ($model) {
                $model->updated_by = auth()->user()->id;
            });

            static::deleting(function ($model) {
                $model->deleted_by = auth()->user()->id;
            });
        }
    }


    public function getCourseDetail(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function getCollegeDetail(){
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function getCollegeDetails(){
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
}
