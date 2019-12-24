<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inbox;
use Illuminate\Support\Facades\Response;
use App\Tododepartment;
use App\TempInbox;
use App\Unioutbox;
use App\department;
use App\Completestatus;

class DefineInbox extends Controller
{
    //
    public function allinbox()
    {
        $inboxs=TempInbox::all();

        return view('backend.define.inbox',compact('inboxs'));
    }

    public function inboxdetail($id)
    {
        $inboxs=TempInbox::find($id);
        $departments=department::all();
        return view('backend.define.inboxmore',compact('inboxs','departments'));

    }

    public function fileread($id,$name)
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

        public function readfeedback($id,$name)
        {
            $inbox=Completestatus::find($id);

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
    public function inserttodo(Request $request)
    {

        Tododepartment::create(
            [


                'todo'=>$request->get('todo'),
            ]
        );

        $id=$request->get('inbox_id');
        $inbox=TempInbox::find($id);
        $inboxes=[];
        foreach (unserialize($inbox->filelink) as $inn) {
            # code...
            array_push($inboxes,$inn);
        }
        Inbox::create
        (
            [

                'inboxid'=>$inbox->inboxid,
                'receive_date'=>$inbox->receive_date,
                'ministry_id'=>$inbox->ministry_id,
                'senddept'=>$inbox->senddept,
                'senduniversity'=>$inbox->senduniversity,
                'sendbranch'=>$inbox->sendbranch,
                'inbox_detail'=>$inbox->inbox_detail,
                'inbox_no'=>$inbox->inbox_no,
                'out_date'=>$inbox->out_date,
                'receiver'=>$inbox->receiver,
                'content'=>$inbox->content,
                'filelink'=>serialize($inboxes),
                'department_id'=>$request->get('department_id'),

            ]
        );
        $inbox->delete();


        return redirect('admin/create/inbox')->with('ok','success');

    }

    public function feedback()
    {
        $feedbacks=Completestatus::where('status','=',0)->get();
        return view('backend.define.feedback',compact('feedbacks'));
    }

    public function feedbackdelete($id)
    {
        $feedbacks=Completestatus::find($id);
        $feedbacks->delete();
        return redirect('admin/feedback');
    }

    public function feedbackrecontent(Request $request,$id)
    {
       

        switch ($request->input('action')) {
            case 'Disgree':
            $feedbacks=Completestatus::find($id);
            $feedbacks->recontent=$request->get('recontent');
            $feedbacks->status=$request->get('status');
            $feedbacks->agreestatus=0;
            $feedbacks->update();
    
            return redirect('admin/feedback')->with('ok','success');

                break;
    
            case 'Agree':
                $feedbacks=Completestatus::find($id);
            $feedbacks->recontent=$request->get('recontent');
            $feedbacks->status=$request->get('status');
            $feedbacks->agreestatus=$request->get('agreestatus');
            $feedbacks->update();
    
            return redirect('admin/feedback')->with('ok','success');
                break;
    
        }
    }

  

    public function unioutbox(){
        $feedbacks=Unioutbox::where('status','=',0)->get();
        return view('backend.define.unioutbox',compact('feedbacks'));
    }

    public function readuniout($id,$name)
    {
        $inbox=Unioutbox::find($id);

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

    public function unioutboxedit(Request $request,$id)
    {
        $feedbacks=Unioutbox::find($id);
        $feedbacks->recontent=$request->get('recontent');
        $feedbacks->status=$request->get('status');
        $feedbacks->update();

        return redirect('admin/unioutbox/show');
    }
}
