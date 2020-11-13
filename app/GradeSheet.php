<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeSheet extends Model
{
    protected $table='gradesheet';
    protected $primaryKey='grade_id';
    public $timestamps = false;
    protected $fillable = [
        'grade_id','course_id','student_id', 'tabulation_id', 'class_test_1', 'class_test_2','assignment','mid_1','mid_2','lab','cont_evaluation','final_mark','total_mark','year','semester','grade',
    ];


    public function student(){
        return $this->belongsTo('App\Student','student_id','student_id');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
    public function totalmark(){
        return $this->hasOne('App\Totalmark');
    }

    public function tabulation(){
        return $this->belongsTo('App\TabulationSheet');
    }


}
