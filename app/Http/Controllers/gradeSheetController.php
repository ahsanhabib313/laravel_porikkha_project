<?php

namespace App\Http\Controllers;

use App\Course;
use App\GradeSheet;
use App\Student;
use App\Totalmark;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class gradeSheetController extends Controller
{


    public function GradeSheetInfo()
    {
        if(Auth::User()->role!="Teacher"){
            return abort(503,'unauthorized');
        }

        $course = Course::all();
        return view('grade.createGrade', ['user' => Auth::user()])->with('course', $course);
    }


    public function createGradeSheet(Request $request)
    {
        if(Auth::User()->role!="Teacher"){
            return abort(503,'unauthorized');
        }

        $this->validate($request, [

            'course_id' => 'required'

        ]);


        $course_id = $request['course_id'];
        $course_semester = Course::where('course_id',$course_id)->first();




        $gradesheet = GradeSheet::where([
            ['course_id', $course_id],
            ['year', date('Y')],
            ['semester', $course_semester->semester]
        ])->first();

        if (!$gradesheet) {
            $students = Student::where('cur_semester', $course_semester->semester)->get();
            $courseName = Course::where('course_id', $course_id)->first();
            $totalmark = Totalmark::where([
                ['course_id', $course_id],
                ['year', date('Y')]
            ])->first();

            if (!$totalmark) {
                $message = "This Course Total Mark does not exist, You must create a Total mark list at first...";
                return redirect()->intended('/dashboard/gradeSheet/create')->with('message', $message);
            }
            return view('grade.createStudentgradeSheet', ['user' => Auth::user()])
                ->with('student', $students)
                ->with('semester', $course_semester->semester)
                ->with('course', $course_id)
                ->with('year', date('Y'))
                ->with('courseNames', $courseName)
                ->with('totalmarks', $totalmark);


        } else {
            $message = "This Course Grade Sheed has been created already...";
            return redirect()->intended('/dashboard/gradeSheet/create')->with('message', $message);
        }
    }


    public function createGradeSheetMark(Request $request)
    {
        if(Auth::User()->role!="Teacher"){
            return abort(503,'unauthorized');
        }


        $course_ids = $request['course_id'];
        $student_ids = $request['student_id'];
        $years = $request['year'];
        $semesters = $request['semester'];
        $mid_term_1s = $request['mid_term-1'];
        $mid_term_2s = $request['mid_term-2'];
        $class_test_1s = $request['class_test-1'];
        $class_test_2s = $request['class_test-2'];
        $assignments = $request['assignment'];
        $labs = $request['lab'];
        $cont_evaluations = $request['cont_evaluation'];
        $final_exams = $request['final_exam'];
        $total_marks = $request['total_mark'];
        $grades = $request['grade'];
        $count = count($student_ids);


        for ($i = 0; $i < $count; $i++) {

            $gradesheet = new GradeSheet();
            $gradesheet->student_id = $student_ids[$i];
            $gradesheet->course_id = $course_ids[$i];
            $gradesheet->class_test_1 = $class_test_1s[$i];
            $gradesheet->class_test_2 = $class_test_2s[$i];
            $gradesheet->assignment = $assignments[$i];
            $gradesheet->mid_1 = $mid_term_1s[$i];
            $gradesheet->mid_2 = $mid_term_2s[$i];
            $gradesheet->lab = $labs[$i];
            $gradesheet->cont_evaluation = $cont_evaluations[$i];
            $gradesheet->final_mark = $final_exams[$i];

            $gradesheet->year = $years[$i];
            $gradesheet->semester = $semesters[$i];


            $classtest = 0;
            $mid = 0;

            if ($class_test_1s[$i] > 0 && $class_test_2s[$i] > 0) {
                $classtest = ($class_test_1s[$i] + $class_test_2s[$i]) / 2;
            } elseif ($class_test_1s[$i] > 0) {
                $classtest = $class_test_1s[$i];
            } elseif ($class_test_2s[$i] > 0) {
                $classtest = $class_test_2s[$i];
            }

            if ($mid_term_1s[$i] > 0 && $mid_term_2s[$i] > 0) {
                $mid = ($mid_term_1s[$i] + $mid_term_2s[$i]) / 2;
            } elseif ($mid_term_1s[$i] > 0) {
                $mid = $mid_term_1s[$i];
            } elseif ($mid_term_2s[$i] > 0) {
                $mid = $mid_term_2s[$i];
            }

            $total_marks[$i] = $classtest + $mid + $assignments[$i] + $labs[$i] + $cont_evaluations[$i] + $final_exams[$i];


            $gradesheet->total_mark = $total_marks[$i];

            // return $total_marks[$i];

            if ($total_marks[$i] >= 80) {
                $grades[$i] = 4;
            } else if ($total_marks[$i] >= 75 && $total_marks[$i] < 80) {
                $grades[$i] = 3.75;
            } else if ($total_marks[$i] >= 70 && $total_marks[$i] < 75) {
                $grades[$i] = 3.50;
            } else if ($total_marks[$i] >= 65 && $total_marks[$i] < 70) {
                $grades[$i] = 3.25;
            } else if ($total_marks[$i] >= 60 && $total_marks[$i] < 65) {
                $grades[$i] = 3.00;
            } else if ($total_marks[$i] >= 55 && $total_marks[$i] < 60) {
                $grades[$i] = 2.75;
            } else if ($total_marks[$i] >= 50 && $total_marks[$i] < 55) {
                $grades[$i] = 2.50;
            } else if ($total_marks[$i] >= 45 && $total_marks[$i] < 50) {
                $grades[$i] = 2.25;
            } else if ($total_marks[$i] >= 40 && $total_marks[$i] < 45) {
                $grades[$i] = 2.00;
            } else if ($total_marks[$i] < 40) {
                $grades[$i] = 0.00;
            }

            $gradesheet->grade = $grades[$i];


            $gradesheet->save();
        }

        return redirect()->intended('/dashboard/gradeSheet/create')->with('message', 'Grade Sheet created Successfully');

    }


    public function searchEdit()
    {
        if(Auth::User()->role!="Teacher"){
            return abort(503,'unauthorized');
        }

        $course = Course::all();
        return view('grade.searchEditInfo', ['user' => Auth::user()])->with('course', $course);

    }

    public function editPage(Request $request)
    {
        if(Auth::User()->role!="Teacher"){
            return abort(503,'unauthorized');
        }



        $this->validate($request, [

            'course_id' => 'required'

        ]);


        $course_id = $request['course_id'];

        $courseName = Course::where('course_id', $course_id)->first();

        $totalmark = Totalmark::where([
            ['course_id', $course_id],
            ['year', date('Y')]
        ])->first();

        if (!$totalmark) {
            $message = "This Course Grade Sheed Total Mark does not exist, please create a total mark sheet for this course at first...";
            return redirect()->intended('dashboard/gradeSheet/edit/search')->with('message', $message);
        }
        $gradesheet = GradeSheet::where([
            ['course_id', $course_id],
            ['year', date('Y')]
        ])->get();

        if (!$gradesheet) {
            $message = "This Course Grade Sheed does not exist, please create this grade sheet at first...";
            return redirect()->intended('dashboard/gradeSheet/edit/search')->with('message', $message);
        } else {
            return view('grade.edit', ['user' => Auth::user()])->with('gradesheet', $gradesheet)
                ->with('totalmarks', $totalmark)
                ->with('courseNames', $courseName)
                ->with('year', date('Y'));

        }


    }


    public function update(Request $request)
    {
        if(Auth::User()->role!="Teacher"){
            return abort(503,'unauthorized');
        }

        $grade_ids = $request['grade_id'];
        $count = count($grade_ids);


        $class_test_1s = $request['class_test-1'];
        $class_test_2s = $request['class_test-2'];
        $assignments = $request['assignment'];
        $mid_term_1s = $request['mid_term-1'];
        $mid_term_2s = $request['mid_term-2'];
        $labs = $request['lab'];
        $cont_evaluations = $request['cont_evaluation'];
        $final_exams = $request['final_exam'];
        $total_marks = $request['total_mark'];
        $grades = $request['grade'];


        for ($i = 0; $i < $count; $i++) {

            $gradesheet = GradeSheet::find($grade_ids[$i]);

            $gradesheet->class_test_1 = $class_test_1s[$i];
            $gradesheet->class_test_2 = $class_test_2s[$i];
            $gradesheet->assignment = $assignments[$i];
            $gradesheet->mid_1 = $mid_term_1s[$i];
            $gradesheet->mid_2 = $mid_term_2s[$i];
            $gradesheet->lab = $labs[$i];
            $gradesheet->cont_evaluation = $cont_evaluations[$i];
            $gradesheet->final_mark = $final_exams[$i];


            //............calculation..............

            $classtest = 0;
            $mid = 0;

            if ($class_test_1s[$i] > 0 && $class_test_2s[$i] > 0) {
                $classtest = ($class_test_1s[$i] + $class_test_2s[$i]) / 2;
            } elseif ($class_test_1s[$i] > 0) {
                $classtest = $class_test_1s[$i];
            } elseif ($class_test_2s[$i] > 0) {
                $classtest = $class_test_2s[$i];
            }

            if ($mid_term_1s[$i] > 0 && $mid_term_2s[$i] > 0) {
                $mid = ($mid_term_1s[$i] + $mid_term_2s[$i]) / 2;
            } elseif ($mid_term_1s[$i] > 0) {
                $mid = $mid_term_1s[$i];
            } elseif ($mid_term_2s[$i] > 0) {
                $mid = $mid_term_2s[$i];
            }

            $total_marks[$i] = $classtest + $mid + $assignments[$i] + $labs[$i] + $cont_evaluations[$i] + $final_exams[$i];


            $gradesheet->total_mark = $total_marks[$i];

            // return $total_marks[$i];

            if ($total_marks[$i] >= 80) {
                $grades[$i] = 4;
            } else if ($total_marks[$i] >= 75 && $total_marks[$i] < 80) {
                $grades[$i] = 3.75;
            } else if ($total_marks[$i] >= 70 && $total_marks[$i] < 75) {
                $grades[$i] = 3.50;
            } else if ($total_marks[$i] >= 65 && $total_marks[$i] < 70) {
                $grades[$i] = 3.25;
            } else if ($total_marks[$i] >= 60 && $total_marks[$i] < 65) {
                $grades[$i] = 3.00;
            } else if ($total_marks[$i] >= 55 && $total_marks[$i] < 60) {
                $grades[$i] = 2.75;
            } else if ($total_marks[$i] >= 50 && $total_marks[$i] < 55) {
                $grades[$i] = 2.50;
            } else if ($total_marks[$i] >= 45 && $total_marks[$i] < 50) {
                $grades[$i] = 2.25;
            } else if ($total_marks[$i] >= 40 && $total_marks[$i] < 45) {
                $grades[$i] = 2.00;
            } else if ($total_marks[$i] < 40) {
                $grades[$i] = 0.00;
            }

                $gradesheet->grade = $grades[$i];


                $gradesheet->save();
        }

          // return view('grade.edit')->with('message', 'Grade Sheet updated Successfully');
            return redirect()->intended('dashboard/gradeSheet/edit/search')->with('message', 'Grade Sheet updated Successfully');



    }


    function viewInfo()
    {
        if(Auth::User()->role!="Teacher" && Auth::User()->role!="Student" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $course = Course::all();
        return view('grade.viewSearch', ['user' => Auth::user()])->with('course', $course);

    }

    function view(Request $request)
    {
        if(Auth::User()->role!="Teacher" && Auth::User()->role!="Student" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [

            'course_id' => 'required'

        ]);


        $course_id = $request['course_id'];

        $courseName = Course::where('course_id', $course_id)->first();

        $totalmark = Totalmark::where([
            ['course_id', $course_id],
            ['year', date('Y')]
        ])->first();


        if (!$totalmark) {
            $message = "This Course Grade Sheed does not exist";
            return redirect()->intended('dashboard/gradeSheet/view/search')->with('message', $message);
        }

        $gradesheet = GradeSheet::where([
            ['course_id', $course_id],
            ['year', date('Y')]
        ])->get();

        if (!$gradesheet) {
            $message = "This Course Grade Sheed does not exist";
            return redirect()->intended('dashboard/mark/create')->with('message', $message);
        } else {
            return view('grade.view', ['user' => Auth::user()])->with('gradesheet', $gradesheet)
                ->with('totalmarks', $totalmark)
                ->with('courseNames', $courseName)
                ->with('year', date('Y'));

        }


    }

    public function printSearch(){
        if(Auth::User()->role!="Teacher" && Auth::User()->role!="Student" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $course = Course::all();
        return view('grade.print_search',['user'=>Auth::user()])->with('course',$course);
    }


    public function printPage(Request $request){
        if(Auth::User()->role!="Teacher" && Auth::User()->role!="Student" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [

            'course_id' => 'required'

        ]);


        $course_id = $request['course_id'];

        $courseName = Course::where('course_id', $course_id)->first();

        $totalmark = Totalmark::where([
            ['course_id', $course_id],
            ['year', date('Y')]
        ])->first();


        if (!$totalmark) {
            $message = "This Course Grade Sheed does not exist";
            return redirect()->intended('dashboard/gradeSheet/view/search')->with('message', $message);
        }

        $gradesheet = GradeSheet::where([
            ['course_id', $course_id],
            ['year', date('Y')]
        ])->get();

        if (!$gradesheet) {
            $message = "This Course Grade Sheed does not exist";
            return redirect()->intended('dashboard/mark/create')->with('message', $message);
        } else {
            return view('grade.print', ['user' => Auth::user()])->with('gradesheet', $gradesheet)
                ->with('totalmarks', $totalmark)
                ->with('courseNames', $courseName)
                ->with('year', date('Y'));

        }

    }


    public function print_process($id1,$id2){
        if(Auth::User()->role!="Teacher" && Auth::User()->role!="Student" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        return view('grade.print_process',['user' => Auth::user()])->with('id1',$id1)->with('id2', $id2);


    }

    public function printButton($id1,$id2){
        if(Auth::User()->role!="Teacher" && Auth::User()->role!="Student" && Auth::User()->role!="Coordinator"){
            return abort(503,'unauthorized');
        }
        $courseName = Course::where('course_id', $id1)->first();

        $totalmark = Totalmark::where([
            ['course_id', $id1],
            ['year', $id2]
        ])->first();


        if (!$totalmark) {
            $message = "This Course Grade Sheed does not exist";
            return redirect()->intended('dashboard/gradeSheet/view/search')->with('message', $message);
        }

        $gradesheet = GradeSheet::where([
            ['course_id', $id1],
            ['year', $id2]
        ])->get();

        if (!$gradesheet) {
            $message = "This Course Grade Sheed does not exist";
            return redirect()->intended('dashboard/mark/create')->with('message', $message);
        } else {
            return view('grade.printPage', ['user' => Auth::user()])->with('gradesheet', $gradesheet)
                ->with('totalmarks', $totalmark)
                ->with('courseNames', $courseName)
                ->with('year', date('Y'));

        }

    }

}
