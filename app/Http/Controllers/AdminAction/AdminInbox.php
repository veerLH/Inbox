<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Inbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\department;
use App\sendministry;
use App\tododepartment;
use App\TempInbox;
use App\ministry;
use App\Completestatus;

class AdminInbox extends Controller
{
    //
    public function showinsertinbox()
    {
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $ministries=ministry::all();

            return view('backend.superadmin.work.writeinbox',compact('checkdept','counts','ministries'));
           }
        }

    }

    public function showinsertoutbox()
    {
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $depts=department::all();
                $ministries=ministry::all();
               
            return view('backend.superadmin.work.writeoutbox',compact('checkdept','depts','counts','ministries'));
           }
        }
    }
    public function inboxdelete($id)
    {
        $inboxs=TempInbox::find($id);
        $inboxs->delete();

        return redirect('super/review/inbox');

    }

    public function insertinbox(Request $request)
    {
        $files=$request->file('filelink');
        $filearray=array();

        foreach ($files as $file) {
            # code...
            $extention=$file->getClientOriginalExtension();
            $filename=rand(111111111,999999999).'.'.$extention;
            $fullpath=$filename;
            $file->move(base_path().'/public/pdf/',$fullpath);
            array_push($filearray,$fullpath);
        }

        TempInbox::create
        (
            [
                'inboxid'=>$request->get('inboxid'),
                'receive_date'=>$request->get('receive_date'),
                'ministry_id'=>$request->get('ministry_id'),
                'senddept'=>$request->get('senddept'),
                'senduniversity'=>$request->get('senduniversity'),
                'sendbranch'=>$request->get( 'sendbranch'),
                'inbox_detail'=>$request->get('inbox_detail'),
                'inbox_no'=>$request->get('inbox_no'),
                'out_date'=>$request->get('out_date'),
                'receiver'=>$request->get('receiver'),
                'content'=>$request->get('content'),
                'filelink'=>serialize($filearray),
            ]
        );

        return redirect('/super/writeinbox')->with('ok','insert');

    }

    //--------------Inbox --------------//

    public function inboxshow()
    {
              # code...
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $inboxs=TempInbox::paginate(7);

            return view('backend.superadmin.work.inboxshow',compact('inboxs','checkdept','counts'));
           }
        }
    }

    public function inboxreviewmores($id)
    {

        $counts=count(TempInbox::all());
        $inboxs=TempInbox::find($id);
        $ministries=ministry::all();
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
            return view('backend.superadmin.work.reviewinoboxmore',compact('inboxs','checkdept','counts','ministries'));
           }
        }
    }

    public function inboxedit(Request $request,$id)
    {


        $inboxs=TempInbox::find($id);
        $inboxs->inboxid=$request->get('inboxid');
        $inboxs->receive_date=$request->get('receive_date');
        $inboxs->ministry_id=$request->get('ministry_id');
        $inboxs->senddept=$request->get('senddept');
        $inboxs->senduniversity=$request->get('senduniversity');
        $inboxs->sendbranch=$request->get( 'sendbranch');
        $inboxs->inbox_detail=$request->get('inbox_detail');
        $inboxs->inbox_no=$request->get('inbox_no');
        $inboxs->out_date=$request->get('out_date');
        $inboxs->receiver=$request->get('receiver');
        $inboxs->content=$request->get('content');


        if ($request->hasFile('filelink')) {
            //

        $files=$request->file('filelink');
        $filearray=array();

        foreach ($files as $file) {
            # code...
            $extention=$file->getClientOriginalExtension();
            $filename=rand(111111111,999999999).'.'.$extention;
            $fullpath=$filename;
            $file->move(base_path().'/public/pdf/',$fullpath);
            array_push($filearray,$fullpath);
        }
         $inboxs->filelink=serialize($filearray);
        }
        $inboxs->update();

        return redirect('super/review/inbox/'.$id.'/more');

    }

    public function finalinboxedit(Request $request,$id)
    {
        $inboxs=Inbox::find($id);
        $inboxs->inboxid=$request->get('inboxid');
        $inboxs->receive_date=$request->get('receive_date');
        $inboxs->ministry_id=$request->get('ministry_id');
        $inboxs->senddept=$request->get('senddept');
        $inboxs->senduniversity=$request->get('senduniversity');
        $inboxs->sendbranch=$request->get( 'sendbranch');
        $inboxs->inbox_detail=$request->get('inbox_detail');
        $inboxs->inbox_no=$request->get('inbox_no');
        $inboxs->out_date=$request->get('out_date');
        $inboxs->receiver=$request->get('receiver');
        $inboxs->content=$request->get('content');


        if ($request->hasFile('filelink')) {
            //

        $files=$request->file('filelink');
        $filearray=array();

        foreach ($files as $file) {
            # code...
            $extention=$file->getClientOriginalExtension();
            $filename=rand(111111111,999999999).'.'.$extention;
            $fullpath=$filename;
            $file->move(base_path().'/public/pdf/',$fullpath);
            array_push($filearray,$fullpath);
        }
         $inboxs->filelink=serialize($filearray);
        }
        $inboxs->update();

        return redirect('super/inbox/'.$id.'/more');
    }

    public function show()
    {
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                if ($checkdept=='w') {
                    $inboxs=Inbox::orderBy('inboxid','desc')->paginate(7);
                    return view('backend.superadmin.work.showtoinbox',compact('inboxs','checkdept','counts','depid'));
                }else {
                    $inboxs=Inbox::where('department_id','=',$did)
                                ->orwhere('department_id','=',1)
                                    ->orderBy('inboxid','desc')
                                    ->paginate(7);
                    return view('backend.superadmin.work.showtoinbox',compact('inboxs','checkdept','counts'));
                }
            
           }
        }
        Auth::logout();
        return redirect('/login');
    }

    public function showdept(Request $request)
    {
        $deptid=$request->get('deptid');
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;

                if ($deptid==0) {
                    $inboxs=Inbox::orderBy('inboxid','desc')->paginate(7);
                    return view('backend.superadmin.work.deptinboxes',compact('inboxs','checkdept','counts','depid','deptid'));
                } else {
                    $inboxs=Inbox::where('department_id','=',$deptid)
                                    ->paginate(7);
                    $inboxs->withPath(url('super/deptinbox'));
                
                    return view('backend.superadmin.work.deptinboxes',compact('inboxs','checkdept','counts','depid','deptid'));
                }
                            
           
            
           }
        }

    }


    public function inboxsearch(Request $request)
    {
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $search=$request->get('search');
                if ($id->department_type=='w') {
                    $inboxs=Inbox::where('senduniversity','LIKE', '%'.$search.'%')
                                ->orwhere('senddept','LIKE', '%'.$search.'%')
                                ->orWhere('inbox_detail','LIKE','%'.$search.'%')
                                ->orWhere('inbox_no','LIKE','%'.$search.'%')
                                ->orWhere('sendbranch','LIKE','%'.$search.'%')
                                ->orWhere('content','LIKE','%'.$search.'%')
                                ->orWhere('receiver','LIKE','%'.$search.'%')
                                ->orderBy('inboxid','desc')
                                ->paginate(7);
                $inboxs->withPath(url('super/inboxsearch'));
                return view('backend.superadmin.work.searchinbox',compact('inboxs','checkdept','counts','depid'));
                }else{
                    $inboxs=Inbox::where('senduniversity','LIKE', '%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orwhere('senddept','LIKE', '%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('inbox_detail','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('inbox_no','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('sendbranch','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('content','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('receiver','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orderBy('inboxid','desc')
                    ->paginate(7);
                $inboxs->withPath(url('super/inboxsearch'));
                return view('backend.superadmin.work.searchinbox',compact('inboxs','checkdept','counts','depid'));
                    
                }
               
           }
        }
    }
    public function fileread($id,$name)
    {
        $inbox=Inbox::find($id);

        foreach (unserialize($inbox->filelink) as $files)
        {
            # code...
            if ($files==$name) {
                # code...
                return Response::make(file_get_contents('pdf/'.$files), 200, [
                    'content-type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$files.'"'
                ]);
            }
        }

    }
    public function reviewfileread($id,$name)
    {
        $inbox=TempInbox::find($id);

        foreach (unserialize($inbox->filelink) as $files)
        {
            # code...
            if ($files==$name) {
                # code...
                return Response::make(file_get_contents('pdf/'.$files), 200, [
                    'content-type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$files.'"'
                ]);
            }
        }

    }
    public function inboxmores($id)
    {
                $did=Auth::user()->department_id;
                $counts=count(TempInbox::all());
                $inboxs=Inbox::find($id);
                $ministries=ministry::all();
                $check=count(Completestatus::where('inbox_id','=',$id)->where('department_id','=',$did)->where('status','=',1)->where('agreestatus','=',1)->get());
                $checkpost=count(Completestatus::where('inbox_id','=',$id)->where('department_id','=',$did)->get());
                $depid=department::all();
                foreach ($depid as $id) {
                    # code...
                   if ($id->id==$did) {
                       # code...
                        $checkdept=$id->department_type;
                        return view('backend.superadmin.work.inboxmore',compact('inboxs','checkdept','counts','check','ministries','did','checkpost'));

                   }
                }

    }

    public function inboxdatesearch(Request $request)
    {
        $counts=count(TempInbox::all());
        $date=$request->get('datesearch');
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                if ($id->department_type=='w') {
                    $inboxs=Inbox::whereDate('receive_date','=',$date)
                                    ->orWhereDate('out_date','=',$date)
                                    ->orderBy("out_date",'desc')
                                    ->paginate(7);
                                    $inboxs->withPath(url('super/inboxdatesearch'));
                                    return view('backend.superadmin.work.searchdate',compact('inboxs','checkdept','counts','depid'));
                    }
                    else {
                        $inboxs=Inbox::whereDate('receive_date','=',$date)->whereIn('department_id',[$did,1])
                        ->orWhereDate('out_date','=',$date)->whereIn('department_id',[$did,1])
                        ->orderBy("out_date",'desc')
                        ->paginate(7);
                        $inboxs->withPath(url('super/inboxdatesearch'));
                        return view('backend.superadmin.work.searchdate',compact('inboxs','checkdept','counts','depid'));
                    }
            
           }
        }

    }

    public function feedback(Request $request)
    {

        $deptid=$request->get('department_id');
        $showdeptid=$request->get('show_department_id');
        $inboxid=$request->get('inbox_id');
        $Completestatus=Completestatus::where('department_id','=',$showdeptid)->where('inbox_id','=',$inboxid)->get();

        if(count($Completestatus)>0){
            $Completestat=Completestatus::where('inbox_id','=',$inboxid)->where('department_id','=',$showdeptid)->firstOrFail();
                $Completestat->inbox_id=$request->get('inbox_id');
                $Completestat->department_id=$request->get('show_department_id');
                $Completestat->content=$request->get('content');
                $Completestat->status=$request->get('status');
                $Completestat->feedback=$request->get('feedback');
                $Completestat->agreestatus =$request->get('agree');

                if ($request->hasFile('filelink')) {
                    //
        
                $files=$request->file('filelink');
                $filearray=array();
        
                foreach ($files as $file) {
                    # code...
                    $extention=$file->getClientOriginalExtension();
                    $filename=rand(111111111,999999999).'.'.$extention;
                    $fullpath=$filename;
                    $file->move(base_path().'/public/pdf/',$fullpath);
                    array_push($filearray,$fullpath);
                }
                $Completestat->filelink=serialize($filearray);
                }
                $Completestat->update();
        
           return redirect('/super/inbox/'.$request->get('inbox_id').'/more')->with('edit','your works is complete');

        }else {
            $filearray=array();
            if ($request->hasFile('filelink')) {
                //

            $files=$request->file('filelink');


            foreach ($files as $file) {
                # code...
                $extention=$file->getClientOriginalExtension();
                $filename=rand(111111111,999999999).'.'.$extention;
                $fullpath=$filename;
                $file->move(base_path().'/public/pdf/',$fullpath);
                array_push($filearray,$fullpath);
            }

            }
            Completestatus::create([
                'inbox_id'=>$request->get('inbox_id'),
                'department_id'=>$request->get('show_department_id'),
                'content'=>$request->get('content'),
                'status'=>$request->get('status'),
                'feedback'=>$request->get('feedback'),
                'agreestatus'=>$request->get('agree'),
                'filelink'=>serialize($filearray),
            ]);
                return redirect('/super/inbox/'.$request->get('inbox_id').'/more')->with('ok','success');
        
        }

    }
}
