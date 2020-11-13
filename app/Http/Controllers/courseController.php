<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class courseController extends Controller
{

    public function showCourseCreateForm(){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        return view('course.createCourse',['user'=> Auth::user()]);
    }

    public function createCourseRecord(Request $request){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [
            'course_name' => 'required|max:500',
            'course_code'=>'required',
            'course_credit'=>'required',
            'semester'=>'required',
        ]);


        $course_name = $request['course_name'];
        $course_code = $request['course_code'];
        $course_credit = $request['course_credit'];
        $course_teacher=$request['course_teacher'];
        $semester = $request['semester'];

        $course = new Course();

        $course->course_name=$course_name;
        $course->course_code=$course_code;
        $course->course_credit=$course_credit;
        $course->course_teacher=$course_teacher;
        $course->semester=$semester;


        $course->save();
        $message = 'Course Record has been created Successfully';
        return redirect()->intended('/dashboard/course/create')->with(['message' => $message]);



    }


    public function ShowCourseEditPage(){
        if(Auth::User()->role!="Program Officer" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
       $course=Course::all();
        return view('course.editCourse',['user'=> Auth::user()])->with('course',$course);
    }
public function courseUpDatePage($id){
    if(Auth::User()->role!="Program Officer" && Auth::User()->role!="Coordinator"){
        return abort(503,'unauthorized');
    }
    $course=Course::find($id);
    return view('course.updateCourse',['user'=> Auth::user()])->with('course',$course);
}

    public function showCourseUpdatePage(Request $request, $id){
        if(Auth::User()->role!="Program Officer" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [
            'course_name' => 'required|max:500',
            'course_code'=>'required',
            'course_credit'=>'required',
            'semester'=>'required',
        ]);

        $course_name = $request['course_name'];
        $course_code = $request['course_code'];
        $course_credit = $request['course_credit'];
        $course_teacher =$request['course_teacher'];
        $semester = $request['semester'];

        $course=Course::find($id);

        $course->course_name=$course_name;
        $course->course_code=$course_code;
        $course->course_credit=$course_credit;
        $course->course_teacher=$course_teacher;
        $course->semester=$semester;


        $course->save();
        $message = 'Course Record has been updated Successfully';
        return redirect()->intended('/dashboard/course/edit')->with(['message' => $message]);

    }

    public function ShowCoursedeletePage(){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $course=Course::all();
        return view('course.deleteCourse',['user'=> Auth::user()])->with('course',$course);
    }

    public function courseDelete($id){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $course=Course::find($id);
        $course->delete();
        return redirect()->intended('/dashboard/course/delete')->with('message','Data has been deleted Successfully');
    }

    public function searchView(){

        return view('course.searchView',['user'=>Auth::user()]);
    }


    public function view(Request $request){

        $this->validate($request, [
            'semester'=>'required'

        ]);

        $semester = $request['semester'];
        $course=Course::where('semester', $semester)->get();
        return view('course.viewCourse',['user'=> Auth::user()])->with('course',$course);
    }
}
