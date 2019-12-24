<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\department;
use App\Inbox;
use App\Outbox;
use App\ministry;


class Normal extends Controller
{
    //
    public function normalinbox()
    {
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $inboxs=Inbox::where('department_id','=',$did)
                            ->orwhere('department_id','=',1)
                            ->orderBy('inboxid','desc')
                            ->paginate(7);
                return view('backend.normal.work.inboxshow',compact('inboxs','checkdept','depid'));
           }
        }

    }

    public function showdept(Request $request)
    {
        $deptid=$request->get('deptid');
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;

                if ($deptid==0) {
                    $inboxs=Inbox::orderBy('inboxid','desc')->paginate(7);
                    return view('backend.normal.work.inboxshow',compact('inboxs','checkdept','depid','deptid'));
                } else {
                    $inboxs=Inbox::where('department_id','=',$deptid)
                                  ->orderBy('inboxid','desc')
                                ->paginate(7);
                    $inboxs->withPath(url('normal/deptinbox'));
                
                    return view('backend.normal.work.deptinboxes',compact('inboxs','checkdept','depid','deptid'));
                }
                            
    
           }
        }

    }
    public function normaloutbox()
    {
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $outboxs=Outbox::whereIn('department_id',[$did,1])->paginate(7);
                return view('backend.normal.work.outboxshow',compact('outboxs','checkdept','depid'));
           }
        }

    }


    public function outmore($id)
    {
        $outboxs=Outbox::find($id);
        $did=Auth::user()->department_id;
        $depid=department::all();
        
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                $ministry=ministry::all();
                return view('backend.normal.work.outboxmore',compact('outboxs','checkdept','ministry'));

           }
        }
    }

    public function searchinbox(Request $request)
    {
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
                return view('backend.normal.work.searchinbox',compact('inboxs','checkdept','depid'));
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
                return view('backend.normal.work.searchinbox',compact('inboxs','checkdept','depid'));
                    
                }

           }
        }
    }

    public function searchdate(Request $request)
    {
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
                $inboxs->withPath(url('normal/inboxdatesearch'));
                return view('backend.normal.work.searchdate',compact('inboxs','checkdept','depid'));
                }
                else {
                    $inboxs=Inbox::whereDate('receive_date','=',$date)->whereIn('department_id',[$did,1])
                    ->orWhereDate('out_date','=',$date)->whereIn('department_id',[$did,1])
                    ->orderBy("out_date",'desc')
                    ->paginate(7);
    $inboxs->withPath(url('normal/inboxdatesearch'));
    return view('backend.normal.work.searchdate',compact('inboxs','checkdept','depid'));
                }
           }
        }
    }

    public function normaloutboxsearch(Request $request)
    {
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
            $outboxs->withPath(url('normal/outboxsearch'));
            return view('backend.normal.work.searchoutbox',compact('outboxs','checkdept','depid'));
                }else{
                    $outboxs=Outbox::where('sendoutdepartment','LIKE', '%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('sendoutuniversity','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('outbox_detail','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('content','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('senddept','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('senduniversity','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->orWhere('sendby','LIKE','%'.$search.'%')->whereIn('department_id',[$did,1])
                    ->paginate(7);
    $outboxs->withPath(url('normal/outboxsearch'));
    return view('backend.normal.work.searchoutbox',compact('outboxs','checkdept','depid'));
                }
              
           }
        }
    }

    public function outboxsearchdate(Request $request)
    {
        $date=$request->get('datesearch');
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                if ($checkdept=='w') {
                    $checkdept=$id->department_type;
                    $outboxs=outbox::whereDate('out_date','=',$date)
                    ->orderBy("out_date",'desc')
                    ->paginate(7);
                $outboxs->withPath(url('normal/outboxdatesearch'));
            return view('backend.normal.work.searchoutdate',compact('outboxs','checkdept','depid'));
                }else {
                    $outboxs=outbox::whereDate('out_date','=',$date)->whereIn('department_id',[$did,1])
                    ->orderBy("out_date",'desc')->whereIn('department_id',[$did,1])
                    ->paginate(7);
    $outboxs->withPath(url('normal/outboxdatesearch'));
return view('backend.normal.work.searchoutdate',compact('outboxs','checkdept','depid'));
                }
             
           }
        }
    }

    public function normalinboxmore($id)
    {

        $inboxs=Inbox::find($id);
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;
                return view('backend.normal.work.inboxmore',compact('inboxs','checkdept'));

           }
        }

    }

    public function read($id,$name)
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

    public function outboxlist(Request $request)
    {
        $deptid=$request->get('deptid');
        $did=Auth::user()->department_id;
        $depid=department::all();
        foreach ($depid as $id) {
            # code...
           if ($id->id==$did) {
               # code...
                $checkdept=$id->department_type;

                if ($deptid==0) {
                    $outboxs=Outbox::paginate(7);
                    return view('backend.normal.work.outboxshow',compact('outboxs','checkdept','depid','deptid'));
                } else {
                    $outboxs=Outbox::where('department_id','=',$deptid)->paginate(7);
                    $outboxs->withPath(url('normal/outdeptinbox'));
                
                    return view('backend.normal.work.outdeptinbox',compact('outboxs','checkdept','depid','deptid'));
                }
                            
           
            
           }
        }
    }
}
