<?php

namespace App\Http\Controllers\AdminAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\department;

class deptaction extends Controller
{
    //
    public function department()
    {
        $department=department::all();
        return view('backend.department.department',compact('department'));
    }

    public function departmentinsert(DepartmentRequest $request)
    {
        department::create(
        [
            'name'=>$request->get('name'),
            'department_type'=>$request->get('department_type'),

        ]);

        return redirect('/admin/department')->with('ok','hello');

    }

    public function edit($id){
        $department=department::all();
        $departmentedit=department::find($id);
        return view('backend.department.departmentedit',compact('department','departmentedit'));
    }

    public function update(DepartmentRequest $request,$id)
    {
        $department=department::find($id);
        $department->name=$request->get('name');
        $department->department_type=$request->get('department_type');
        $department->update();
        return redirect('/admin/department')->with('update','hello');
    }

    public function delete($id)
    {
        $department=department::find($id);
        $department->delete();
        return redirect('/admin/department')->with('delete','hello');
    }
}
