<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';
    protected $primaryKey='course_id';
    public $timestamps = false;
    protected $fillable = [
        'course_id','course_name', 'course_code', 'course_credit', 'course_teacher','semester',
    ];


    public function gradesheet(){
        return $this->hasOne('App\GradeSheet');
    }
    public function totalmark(){
        return $this->hasOne('App\Totalmark');
    }

    public function tabulation(){
        return $this->belongsTo('App\TabulationSheet');
    }

}
