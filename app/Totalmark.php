<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totalmark extends Model
{
    protected $table = "totalmarks";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
       'id', 'course_id','class_test_1_total', 'class_test_2_total', 'assignment_total', 'mid_1_total','mid_2_total','lab_total','cont_evaluation_total','final_exam_mark','total_mark','gpa','year'
    ];


    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function gradesheet(){
        return $this->belongsTo('App\GradeSheet');
    }


}
