<?php

namespace App\Http\Controllers;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Course;
use App\GradeSheet;
use App\Student;
use App\TabulationSheet;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class tabulationController extends Controller
{



    public function search()
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        return view('tabulationSheet.search', ['user' => Auth::user()]);
    }

    public function create(Request $request)
    {  if(Auth::User()->role!="Coordinator"){
        return abort(503,'unauthorized');
    }

        $this->validate($request, [

            'semester' => 'required'


        ]);

        $semesters = $request['semester'];


        $tabulation = TabulationSheet::where('semester', $semesters)->first();

        if (!$tabulation) {
            $course = Course::where('semester', $semesters)->get();
            $students = Student::where('cur_semester', $semesters)->get();

            return view('tabulationSheet.create', ['user' => Auth::user()])->with('student', $students)
                ->with('course', $course)->with('semester', $semesters)->with('courses', $course);
        } else {

            $message = 'This semester Tabulation Sheet already exist..';
            return redirect()->intended('/dashboard/tabulationSheet/search')->with('message', $message);

        }

    }

    public function createPage(Request $request)
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }

        $student_ids = $request['student_id'];
        $semesters = $request['semester'];
        $cur_sem_gpas = $request['cur_sem_gpa'];
        $upto_cur_sem_cgpas = $request['upto_cur_sem_cgpa'];
        $count = count($student_ids);


        for ($i = 0; $i < $count; $i++) {

            $tabulationSheet = new TabulationSheet();

            $tabulationSheet->student_id = $student_ids[$i];
            $tabulationSheet->semester = $semesters[$i];
            $tabulationSheet->cur_sem_gpa = $cur_sem_gpas[$i];
            $tabulationSheet->upto_cur_sem_cgpa = $upto_cur_sem_cgpas[$i];

            $tabulationSheet->save();
        }

        return redirect()->intended('/dashboard/tabulationSheet/search')->with('message', 'Tabulation Sheet created Successfully');

    }

    public function printSearch()
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        return view('tabulationSheet.printSearch', ['user' => Auth::user()]);
    }

    public function printPage(Request $request)
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }

        $this->validate($request, [

            'semester' => 'required'

        ]);

        $semesters = $request['semester'];
        $course = Course::where('semester', $semesters)->get();
        $tabulation = TabulationSheet::where('semester', $semesters)->get();


        return view('tabulationSheet.print', ['user' => Auth::user()])->with('tabulation', $tabulation)->with('semester', $semesters)->with('courses', $course);


    }


    public function print_process($id)
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        return view('tabulationSheet.print_process', ['user' => Auth::user()])->with('id', $id);
    }


    public function printButton($id)
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $tabulation = TabulationSheet::where('semester', $id)->get();
        $course = Course::where('semester', $id)->get();

        return view('tabulationSheet.printPage', ['user' => Auth::user()])->with('tabulation', $tabulation)->with('semester', $id)->with('courses', $course);

    }


    public function searchView()
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        return view('tabulationSheet.searchView', ['user' => Auth::user()]);
    }

    public function view(Request $request)
    {
        if(Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [

            'semester' => 'required'

        ]);

        $semesters = $request['semester'];
        $course = Course::where('semester', $semesters)->get();
        $tabulation = TabulationSheet::where('semester', $semesters)->get();
        return view('tabulationSheet.view', ['user' => Auth::user()])->with('tabulation', $tabulation)->with('semester', $semesters)->with('courses', $course);
    }

}
