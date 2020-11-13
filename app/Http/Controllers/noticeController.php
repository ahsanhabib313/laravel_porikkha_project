<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class noticeController extends Controller
{

    public function createNotice(){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        return view('notice.createNotice',['user'=>Auth::user()]);
    }


    public function createNoticeProcess(Request $request){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
            $this->validate($request,[
                'date'=>'required',
                'title'=>'required',
                'content'=>'required'
            ]);


        $title=$request['title'];
        $content=$request['content'];
        $date=$request['date'];

        $notice= new Notice();


        $notice->title=$title;
        $notice->content=$content;
        $notice->date =$date;

        $notice->save();

        $message = 'Notice has been created Successfully';
        return redirect()->intended('/dashboard/notice/create')->with(['message' => $message]);


    }

    public function showDeletePage(){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }

        $notices= Notice::all()->sortByDesc('notice_id') ;
        return view('notice.deleteNotice',['user'=>Auth::user()])->with('notices',$notices);
    }

    public function noticeDelete($id){
        if(Auth::User()->role!="Program Officer"){
            return abort(503,'unauthorized');
        }
        $notice=Notice::find($id);
        $notice->delete();
        return redirect()->intended('dashboard/notice/delete')->with('message','Data has been deleted Successfully');

    }


    public function viewNoticePage(){
        $notices= Notice::all();
        return view('notice.viewNotice',['user'=>Auth::user()])->with('notices',$notices);
    }

}
