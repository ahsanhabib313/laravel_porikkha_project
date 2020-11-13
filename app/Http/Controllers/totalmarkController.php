<?php

namespace App\Http\Controllers;

use App\Course;
use App\Totalmark;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class totalmarkController extends Controller
{

   public function createTotalmarkPage(){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }
       $course=Course::all();
       return view('totalMark.createTotalMark',['user'=>Auth::user()])->with('courses',$course);
   }

   public function createTotalmark(Request $request){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }
       $this->validate($request, [
           'course_id' => 'required',
           'class_test_1_total' => 'required',
           'class_test_2_total' => 'required',
           'assignment_total' => 'required',
           'mid_1_total' => 'required',
           'mid_2_total' => 'required',
           'lab_total' => 'required',
             'cont_evaluation_total' => 'required',
           'final_exam_mark'=>'required',
           'total_mark'=>'required',
           'gpa'=>'required',
           'year'=>'required'


       ]);



       $course_id = $request['course_id'];
       $class_test_1_total = $request['class_test_1_total'];
       $class_test_2_total = $request['class_test_2_total'];
       $assignment_total = $request['assignment_total'];
       $mid_1_total = $request['mid_1_total'];
       $mid_2_total = $request['mid_2_total'];
       $lab_total = $request['lab_total'];
       $cont_evaluation_total = $request['cont_evaluation_total'];
       $final_exam_mark = $request['final_exam_mark'];
       $total_mark =$request['total_mark'];
       $gpa =$request['gpa'];
       $year =$request['year'];


       $totalmark_obj = Totalmark::where([
           ['course_id', $course_id],
           ['year', $year]
       ])->first();

       if($totalmark_obj){

           $message="This Course Total Mark Configuration already exist.... ";
           return redirect()->intended('dashboard/mark/create')->with('message', $message);

       }else



       $totalmarks = new Totalmark();


       $totalmarks->course_id = $course_id;
       $totalmarks->class_test_1_total = $class_test_1_total;
       $totalmarks->class_test_2_total = $class_test_2_total;
       $totalmarks->assignment_total = $assignment_total;
       $totalmarks->mid_1_total = $mid_1_total;
       $totalmarks->mid_2_total = $mid_2_total;
       $totalmarks->lab_total = $lab_total;
       $totalmarks->cont_evaluation_total = $cont_evaluation_total;
       $totalmarks->final_exam_mark =$final_exam_mark;
       $totalmarks->total_mark = $total_mark;
       $totalmarks->gpa = $gpa;
       $totalmarks->year =$year;

       $totalmarks->save();
       $message = 'Total Mark has been created Successfully';
       return redirect()->intended('dashboard/mark/create')->with(['message' => $message]);

   }

   public function showEditTotalmark(){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }
       $totalmark= Totalmark::all();
       return view('totalMark.editTotalmark',['user'=>Auth::user()])->with('totalmarks',$totalmark);
   }

   public function editTotalmark($id){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }
      $totalmark=Totalmark::find($id);

       return view('totalMark.updateTotalmark',['user'=>Auth::user()])->with('totalmarks',$totalmark);
   }

   public function updateTotalmark(Request $request, $id){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }

       $this->validate($request, [

           'class_test_1_total' => 'required',
           'class_test_2_total' => 'required',
           'assignment_total' => 'required',
           'mid_1_total' => 'required',
           'mid_2_total' => 'required',
           'lab_total' => 'required',
           'cont_evaluation_total' => 'required',
           'final_exam_mark' => 'required',
           'total_mark'=>'required',
           'gpa'=>'required',
           'year'=>'required'


       ]);


       $class_test_1_total = $request['class_test_1_total'];
       $class_test_2_total = $request['class_test_2_total'];
       $assignment_total = $request['assignment_total'];
       $mid_1_total = $request['mid_1_total'];
       $mid_2_total = $request['mid_2_total'];
       $lab_total = $request['lab_total'];
       $cont_evaluation_total = $request['cont_evaluation_total'];
       $final_exam_mark = $request['final_exam_mark'];
       $total_mark =$request['total_mark'];
       $gpa =$request['gpa'];


       $totalmarks= Totalmark::find($id);



       $totalmarks->class_test_1_total = $class_test_1_total;
       $totalmarks->class_test_2_total = $class_test_2_total;
       $totalmarks->assignment_total = $assignment_total;
       $totalmarks->mid_1_total = $mid_1_total;
       $totalmarks->mid_2_total = $mid_2_total;
       $totalmarks->lab_total = $lab_total;
       $totalmarks->cont_evaluation_total = $cont_evaluation_total;
       $totalmarks->final_exam_mark = $final_exam_mark;
       $totalmarks->total_mark = $total_mark;
       $totalmarks->gpa = $gpa;

       $totalmarks->save();

       $message = 'Total Mark has been created Successfully';
       return redirect()->intended('dashboard/mark/edit')->with(['message' => $message]);

   }

   public function showDeletePage(){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }
       $totalmark=Totalmark::all();
       return view('totalMark.deleteTotalmark',['user'=>Auth::user()])->with('totalmarks',$totalmark);

   }

   public function markDelete($id){
       if(Auth::User()->role!="Teacher"){
           return abort(503,'unauthorized');
       }
       $totalmark=Totalmark::find($id);
       $totalmark->delete();
       return redirect()->intended('dashboard/mark/delete')->with('message','Data has been deleted Successfully');

   }


}
