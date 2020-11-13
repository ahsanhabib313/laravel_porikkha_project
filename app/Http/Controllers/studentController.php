<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{

    public function showStdRecord()
    {
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $students = User::where('role','student')->get();
       return view('student.createStudent',['user'=> Auth::user()])->with('students',$students);


    }

    public function createStdRecord( Request $request)
    {
        if(Auth::user()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [
            'std_name' => 'required|max:255',
            'class_roll'=>'required',
            'exam_roll'=>'required',
           'user_id'=>'required',
            'semester'=>'required',
            'session'=>'required',
            'reg_num'=>'required',
            'hall_name'=>'required'



        ]);


        $std_name = $request['std_name'];
        $class_roll = $request['class_roll'];
        $exam_roll = $request['exam_roll'];
        $user_id = $request['user_id'];
        $semester = $request['semester'];
        $session = $request['session'];
        $reg_num = $request['reg_num'];
        $hall_name = $request['hall_name'];


        $student = new Student();

        $student->student_name=$std_name;
        $student->class_roll=$class_roll;
        $student->exam_roll=$exam_roll;
        $student->user_id=$user_id;
        $student->reg_num=$reg_num;
        $student->session=$session;
        $student->cur_semester=$semester;
        $student->hall_name=$hall_name;

        $student->save();
        $message = 'Student Record created Succesfully';
        return redirect()->intended('dashboard/student/create')->with(['message' => $message]);



    }

    public function showEditPage(){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $data= Student::all();
        return view('student.editStudent',['user'=> Auth::user()])->with('data',$data);
    }

    public function editStudentRecord($id){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $student= Student::find($id);

        return view('student.updateStudent',['user'=>Auth::user()])->with('student',$student)->with('message','Student Record has been updated successfully');
    }

    public function updateStudentRecord(Request $request, $id){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
            $this->validate($request, [
                'std_name' => 'required|max:255',
                'class_roll' => 'required',
                'exam_roll' => 'required',
                'semester' => 'required',
                'session' => 'required',
                'reg_num' => 'required',
                'hall_name' => 'required'


            ]);

            $std_name = $request['std_name'];
            $class_roll = $request['class_roll'];
            $exam_roll = $request['exam_roll'];
            $semester = $request['semester'];
            $session = $request['session'];
            $reg_num = $request['reg_num'];
            $hall_name = $request['hall_name'];

            $student = Student::find($id);


            $student->student_name = $std_name;
            $student->class_roll = $class_roll;
            $student->exam_roll = $exam_roll;
            $student->reg_num = $reg_num;
            $student->session = $session;
            $student->cur_semester = $semester;
            $student->hall_name = $hall_name;

        $student->save();
        $message = 'Student Record has been updated Successfully';
        return redirect()->intended('dashboard/student/edit')->with(['message' => $message]);

        }

    public function showDeletePage(){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $data= Student::all();
        return view('student.deleteStudent',['user'=> Auth::user()])->with('data',$data);
    }

    public function deleteStudentRecord($id){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $data=Student::find($id);
        $data->delete();
        return redirect()->intended('dashboard/student/delete')->with('message','Data has been deleted Successfully');
    }
public function viewSearchStudentPage(){
    return view('student.search',['user'=> Auth::user()]);
}

    public function viewStudentPage(Request $request){
        $this->validate($request,[
            'semester'=>'required'
        ]);

        $semester =$request['semester'];

        $data= Student::where('cur_semester',$semester)->get();
        return view('student.viewStudent',['user'=> Auth::user()])->with('data',$data);
    }

}
