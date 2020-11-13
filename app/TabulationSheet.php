<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabulationSheet extends Model
{
    protected $table='tabulationsheet';
    protected $primaryKey='tabulation_id';
    public $timestamps = false;
    protected $fillable = [
        'tabulation_id','student_id','semester','cur_sem_gpa','upto_cur_sem_cgpa',
    ];


    public function grade(){
       return $this->hasMany('App\GradeSheet');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function course(){
        return $this->hasMany('App\Course');

    }
}
