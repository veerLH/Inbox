<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\department;
use App\User;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Hash;
use App\file;
use Illuminate\Support\Facades\Response;
class Accountcreate extends Controller
{
    //
    public function accountform()
    {
        $departments=department::all();
        return view('backend.account.index',compact('departments'));
    }

    public function createaccount(AccountRequest $request)
    {

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            // 'password' => Hash::make($request->get('password')),
            'password' => Hash::make($request->password),
            'userlevel'=>$request->get('userlevel'),
            'department_id'=>$request->get('department'),

            'adminstatus'=>$request->get('adminstatus'),
        ]);

      return redirect('admin/create/Account')->with('ok','register');


    }

    public function show()
    {
        $departments=department::all();
       $users=User::where('adminstatus','<>',1)->paginate(5);
       return view('backend.account.showaccount',compact('users','departments'));
    }

    public function update(Request $request)
    {
        $id=$request->get('id');

        $user=User::find($id);
        $hashedPassword=$user->password;
        if (Hash::check($request->get('oldpassword'), $hashedPassword)) {
            $user->name=$request->get('name');
            $user->email=$request->get('email');
            $user->userlevel=$request->get('userlevel');
            $user->department_id=$request->get('department');

            if ($request->filled('newpassword')) {
                //
                $user->password=Hash::make($request->get('newpassword'));
            }


            $user->update();

              return redirect('admin/account/show')->with('ok','you changing is complete');
        }
        else{
            return redirect('admin/account/show')->with('sorry','you changing is not work');
        }


    }

    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/account/show');
    }
}
