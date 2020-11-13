<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $primaryKey='student_id';
    public $timestamps = false;
    protected $fillable = [
        'student_id','student_name', 'class_roll', 'exam_roll', 'reg_num','session','cur_semester','hall_name','user_id'
    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function gradesheet()
    {
        return $this->hasMany('App\GradeSheet');

    }

public function tabulation(){
    return $this->hasMany('App\TabulationSheet');
}

}

