<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outbox;
use App\department;
use App\TempInbox;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Unioutbox;
use App\ministry;
use App\Completestatus;
use App\sendministry;

class Adminoutbox extends Controller
{
    //
    public function insertoutbox(Request $request)
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

        Outbox::create
        (
            [
                'outboxid'=>$request->get('outboxid'),
                'ministry_id'=>$request->get('ministry_id'),
                'sendoutdepartment'=>$request->get('sendoutdepartment'),
                'sendoutuniversity'=>$request->get('sendoutuniversity'),
                'department_id'=>$request->get('department_id'),
                'outbox_detail'=>$request->get('outbox_detail'),
                'out_date'=>$request->get('out_date'),
                'content'=>$request->get('content'),
                'sendministry_id'=>$request->get('sendministry'),
                'senddept'=>$request->get('senddept'),
                'senduniversity'=>$request->get('senduniversity'),
                'senddate'=>$request->get('senddate'),
                'sendby'=>$request->get('sendby'),
                'filelink'=>serialize($filearray)
            ]
        );

        return redirect('/super/writeoutbox')->with('ok','insert');

    }

    public function outboxshow()
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
                    # code...
                    $outboxs=Outbox::orderBy('outboxid','desc')->paginate(7);
                    return view('backend.superadmin.work.showtooutbox',compact('outboxs','checkdept','counts','depid'));
                }else{
                    $outboxs=Outbox::where('department_id', '=', $did)
                            ->orwhere('department_id', '=', 1)
                            ->orderBy('outboxid','desc')
                            ->paginate(7);
                    return view('backend.superadmin.work.showtooutbox',compact('outboxs','checkdept','counts','depid'));
                }

               
           }
        }
    }
    public function insertoutboxshow()
    {
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $outboxs=Outbox::paginate(7);
                return view('backend.superadmin.work.outbox',compact('outboxs','checkdept','depid','counts'));
           }
        }
    }

    public function insertoutboxshowdept(Request $request)
    {
        $counts=count(TempInbox::all());
        $deptid=$request->get('deptid');
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $outboxs=Outbox::where('department_id','=',$deptid)->whereIn('department_id',[$did,1])->paginate(7);
                $outboxs->withPath(url('super/reviewoutdept'));
                return view('backend.superadmin.work.reviewoutdept',compact('outboxs','checkdept','depid','counts','deptid'));
           }
        }

    }

    public function unidelete($id)
    {
        $del=Unioutbox::find($id);
        $del->delete();

        return redirect('super/unioutbox');

    }

    public function tododelete($id)
    {
        $del=Completestatus::find($id);
        $del->delete();

        return redirect('super/outbox/todo');

    }


    public function outboxsearch(Request $request)
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
                if ($checkdept=='w') {
                    $outboxs=Outbox::where('sendoutdepartment','LIKE', '%'.$search.'%')
                    ->orWhere('sendoutuniversity','LIKE','%'.$search.'%')
                    ->orWhere('outbox_detail','LIKE','%'.$search.'%')
                    ->orWhere('content','LIKE','%'.$search.'%')
                    ->orWhere('senddept','LIKE','%'.$search.'%')
                    ->orWhere('senduniversity','LIKE','%'.$search.'%')
                    ->orWhere('sendby','LIKE','%'.$search.'%')
                    ->paginate(7);
                $outboxs->withPath(url('super/outboxsearch'));
                return view('backend.superadmin.work.searchoutbox',compact('outboxs','checkdept','counts','depid'));
                }else{
                    $outboxs=Outbox::where('sendoutdepartment','LIKE', '%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('sendoutuniversity','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('outbox_detail','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('content','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('senddept','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('senduniversity','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('sendby','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->paginate(7);
                $outboxs->withPath(url('super/outboxsearch'));
                return view('backend.superadmin.work.searchoutbox',compact('outboxs','checkdept','counts','depid'));
                }
           }
        }
    }

    public function outboxdatesearch(Request $request)
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
                if ($checkdept=='w') {
                    $outboxs=outbox::whereDate('out_date','=',$date)
                                ->orderBy("out_date",'desc')
                                ->paginate(7);
                $outboxs->withPath(url('super/outboxdatesearch'));
            return view('backend.superadmin.work.searchoutdate',compact('outboxs','checkdept','counts','depid'));
                }else{
                    $outboxs=outbox::whereDate('out_date','=',$date)->whereIn('department_id',[$did,1])
                    ->orderBy("out_date",'desc')->whereIn('department_id',[$did,1])
                    ->paginate(7);
                $outboxs->withPath(url('super/outboxdatesearch'));
            return view('backend.superadmin.work.searchoutdate',compact('outboxs','checkdept','counts','depid'));
                }
           }
        }
    }
    public function outboxmore($id)
    {
        $counts=count(TempInbox::all());
        $outboxs=Outbox::find($id);
        $did=Auth::user()->department_id;
        $ministry=ministry::all();
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                return view('backend.superadmin.work.outboxmore',compact('outboxs','checkdept','counts','ministry','depid'));

           }
        }
    }

    public function deptsearchout(Request $request)
    {
        $counts=count(TempInbox::all());
        $deptid=$request->get('deptid');
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;

                if ($deptid==0) {
                    $outboxs=Outbox::orderBy('outboxid','desc')->paginate(7);
                    return view('backend.superadmin.work.outdeptsearch',compact('outboxs','checkdept','depid','deptid','counts'));
                } else {
                    $outboxs=Outbox::where('department_id','=',$deptid)->orderBy('outboxid','desc')->paginate(7);
                    $outboxs->withPath(url('normal/outdeptinbox'));
                
                    return view('backend.superadmin.work.outdeptsearch',compact('outboxs','checkdept','depid','deptid','counts'));
                }
                            
           
            
           }
        }

    }

    public function outboxreviewmores($id)
    {
        $counts=count(TempInbox::all());
        $outboxs=Outbox::find($id);
        $did=Auth::user()->department_id;
        
        $ministry=ministry::all();
        $depts=department::all();
        foreach ($depts as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                return view('backend.superadmin.work.reviewoutboxmore',compact('outboxs','checkdept','counts','ministry','depts'));

           }
        }
    }

    public function fileread($id,$name)
    {
        $outbox=outbox::find($id);

        foreach (unserialize($outbox->filelink) as $files)
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

    public function readtodo($id,$name){
        $outbox=Completestatus::find($id);

        foreach (unserialize($outbox->filelink) as $files)
        {
            # code...
            if ($files==$name) {
                # code...
                return Response::make(file_get_contents('pdf/'.$files), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$files.'"'
                ]);
            }
        }

    }
    public function outboxedits(Request $request,$id)
    {
        $outboxs=Outbox::find($id);
        $outboxs->outboxid=$request->get('outboxid');
        $outboxs->ministry_id=$request->get('ministry_id');
        $outboxs->sendoutdepartment=$request->get('sendoutdepartment');
        $outboxs->sendoutuniversity=$request->get('sendoutuniversity');
        $outboxs->department_id=$request->get('department_id');
        $outboxs->outbox_detail=$request->get('outbox_detail');
        $outboxs->out_date=$request->get('out_date');
        $outboxs->content=$request->get('content');
        $outboxs->sendministry_id=$request->get('sendministry');
        $outboxs->senddept=$request->get('senddept');
        $outboxs->senduniversity=$request->get('senduniversity');
        $outboxs->senddate=$request->get('senddate');
        $outboxs->sendby=$request->get('sendby');

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
        $outboxs->filelink=serialize($filearray);
        }
        $outboxs->update();

        return redirect('super/review/outbox/'.$id.'/more');

    }

    public function outboxdelete($id)
    {
        $outboxs=Outbox::find($id);
        $outboxs->delete();

        return redirect('/super/review/outbox');
    }

    public function outtodo()
    {
        $counts=count(TempInbox::all());

        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $Completestatus=Completestatus::where('status','=',1)->where('department_id','=',$did)->paginate(2);
                return view('backend.superadmin.work.todooutbox',compact('Completestatus','checkdept','counts'));

           }
        }
    }

    public function unioutbox()
    {
        $counts=count(TempInbox::all());
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;

                return view('backend.superadmin.work.unioutbox',compact('checkdept','counts','did'));
           }
        }

    }

    public function postuni(Request $request)
    {


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
        Unioutbox::create([
            'department_id'=>$request->get('department_id'),
            'content'=>$request->get('content'),
            'status'=>$request->get('status'),
            'filelink'=>serialize($filearray),
        ]);
            return redirect('/super/unioutboxes');
    }


    }

    public function unioutboxto()
    {
        $counts=count(TempInbox::all());

        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $Completestatus=Unioutbox::where('status','=',1)->where('department_id','=',$did)->paginate(7);
                return view('backend.superadmin.work.unioutboxshow',compact('Completestatus','checkdept','counts'));

           }
        }
    }

    public function readunioutbox($id,$name)
    {
        $outbox=Unioutbox::find($id);

        foreach (unserialize($outbox->filelink) as $files)
        {
            # code...
            if ($files==$name) {
                # code...
                return Response::make(file_get_contents('pdf/'.$files), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$files.'"'
                ]);
            }
        }
    }
}
