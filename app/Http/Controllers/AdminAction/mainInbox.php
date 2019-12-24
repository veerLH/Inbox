<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inbox;
use App\department;
use App\Outbox;
use Illuminate\Support\Facades\Response;
use App\Tododepartment;
use App\ministry;

class mainInbox extends Controller
{
    //
    public function inboxshow()
    {
        $departments=department::all();
        $tododepartments=department::all();
        $inboxs=Inbox::orderBy('inboxid','desc')->paginate(7);
        return view('backend.inbox.inbox',compact('inboxs','departments','tododepartments'));
    }
    public function inboxsearch(Request $request)
    {
        $departments=department::all();
        $search=$request->get('search');
        $inboxs=Inbox::where('inbox_detail','LIKE', '%'.$search.'%')
                       ->orwhere('senduniversity','LIKE', '%'.$search.'%')
                       ->orwhere('senddept','LIKE', '%'.$search.'%')
                       ->orWhere('inbox_detail','LIKE','%'.$search.'%')
                       ->orWhere('inbox_no','LIKE','%'.$search.'%')
                       ->orWhere('sendbranch','LIKE','%'.$search.'%')
                       ->orWhere('content','LIKE','%'.$search.'%')
                       ->orWhere('receiver','LIKE','%'.$search.'%')
                       ->orderBy('inboxid','desc')
                       ->paginate(7);
        $inboxs->withPath(url('admin/inboxsearch'));
        return view('backend.inbox.searchinbox',compact('inboxs','departments'));
    }


    public function inboxdeptsearch(Request $request)
    {
        $departments=department::all();
        $id=$request->get('deptid');
       

                if ($id==0) {
                    $inboxs=Inbox::orderBy('inboxid','desc')->paginate(7);
                    return view('backend.inbox.searchdept',compact('inboxs','departments','id'));
                } else {
                    $inboxs=Inbox::where('department_id','=',$id)->orderBy('inboxid','desc')->paginate(7);
                    $inboxs->withPath(url('admin/deptsearch'));
                    return view('backend.inbox.searchdept',compact('inboxs','departments','id'));
                }
                                 

    }

    public function datesearch(Request $request)
    {
        $departments=department::all();
        $date=$request->get('datesearch');
        $inboxs=Inbox::where('receive_date','=',$date)
                        ->orWhereDate('out_date','=',$date)
                        ->orderBy('inboxid','desc')
                        ->paginate(2);
        $inboxs->withPath(url('admin/datesearch'));
        return view('backend.inbox.searchdate',compact('inboxs','departments'));
    }

    public function outboxshow()
    {
        $departments=department::all();
        $outboxs=Outbox::orderBy('outboxid','desc')->paginate(7);
        return view('backend.inbox.outbox',compact('outboxs','departments'));
    }

    public function outboxsearch(Request $request)
    {
        $departments=department::all();
        $search=$request->get('search');
        $outboxs=Outbox::where('sendoutdepartment','LIKE', '%'.$search.'%')
                        ->orWhere('sendoutuniversity','LIKE','%'.$search.'%')
                        ->orWhere('outbox_detail','LIKE','%'.$search.'%')
                        ->orWhere('content','LIKE','%'.$search.'%')
                        ->orWhere('senddept','LIKE','%'.$search.'%')
                        ->orWhere('senduniversity','LIKE','%'.$search.'%')
                        ->orWhere('sendby','LIKE','%'.$search.'%')
                        ->paginate(7);
        $outboxs->withPath(url('admin/outboxsearch'));
        return view('backend.inbox.searchoutbox',compact('outboxs','departments'));

    }

    public function outboxdeptsearch(Request $request)
    {
        $departments=department::all();
        $id=$request->get('deptid');      

        if ($id==0) {
            $outboxs=Outbox::orderBy('outboxid','desc')->paginate(7);
            return view('backend.inbox.searchoutboxdept',compact('outboxs','departments','id'));
        } else {
            $outboxs=Outbox::where('department_id','=',$id)
                            ->orderBy('outboxid','desc') 
                            ->paginate(7);
            $outboxs->withPath(url('admin/outdeptsearch'));
            return view('backend.inbox.searchoutboxdept',compact('outboxs','departments','id'));
        }
    }

    public function outboxdatesearch(Request $request)
    {
        $departments=department::all();
        $date=$request->get('datesearch');
        $outboxs=Outbox::where('out_date','=',$date)
                        ->orwhereDate('senddate','=',$date)
                        ->paginate(7);
        $outboxs->withPath(url('admin/outboxdatesearch'));
        return view('backend.inbox.searchoutboxdate',compact('outboxs','departments'));
    }

    public function inboxmore($id)
    {
        $inboxs=Inbox::find($id);
        return view('backend.inbox.inboxmore',compact('inboxs'));
    }

    public function edittodo(Request $request)
    {
        $inboxid=$request->get('inboxid');

        $todoid=$request->get('todoid');

        $tododept=Tododepartment::find($todoid);
        $tododept->todo=$request->get('todo');
        $tododept->update();
        return redirect('admin/inbox/'.$inboxid.'/more');
    }

    public function outboxmore($id)
    {
        $outboxs=Outbox::find($id);
        $ministry=ministry::all();
        return view('backend.inbox.outboxmore',compact('outboxs','ministry'));
    }
   

    public function infileread($id,$name)
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

    public function outfileread($id,$name)
    {
        $inbox=Outbox::find($id);

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
}
