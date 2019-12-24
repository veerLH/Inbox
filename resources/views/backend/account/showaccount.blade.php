@extends('backend.layout.main.mian')

@section('title','Inbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')
<div class="container">
@if (session('ok'))
<div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Well done!</strong> {{session('ok')}} <a href="#" class="alert-link">this important alert message</a>.
      </div>
@endif
@if (session('sorry'))
<div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Well done!</strong> {{session('sorry')}} <a href="#" class="alert-link">this important alert message</a>.
      </div>
@endif
<div class="row mx-auto" id="department">
    <div class="col-md-12 mx-auto">
        <div class="card border-warning">
                <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">သုံးစွဲသူများ၏အချက်အလက်များ</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                                <thead >
                                  <tr class="table-info">
                                    <th scope="col">အမည်</th>
                                    <th scope="col">အီးမေးလ်</th>
                                    <th scope="col">ဌာန</th>
                                    <th scope="col">အမျိူးအစား</th>
                                    <th scope="col">အဆင့်</th>
                                    <th scope="col">လုပ်ဆောင်ချက်</th>
                                  </tr>
                                </thead>
                                <tbody>

                                  <tr>
                                      @foreach ($users as $user)
                                  <th scope="row">{{$user->name}}</th>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->department->name}}</td>
                                    @if ($user->department->department_type=='w')
                                    <td>‌ရေး/ဖတ်</td>
                                    @else
                                    <td>ဖတ်</td>
                                    @endif
                                    
                                    @if ($user->userlevel=="main")
                                    <td>Officer</td>
                                    @else
                                    <td>Staff</td>
                                    @endif
                                    <td class="text-danger font-weight-bold" ><i class="far fa-edit" data-toggle="modal" data-target="#exampleModal{{$user->id}}" style="font-size:2em;color:#0d47a1"></i>&nbsp;&nbsp;&nbsp;<a href="{{url('/admin/account/'.$user->id.'/delete')}}"><i class="far fa-trash-alt" style="font-size:2em;color:#CC0000"></i></a></td>
                                  </tr>
                                  <form method="POST">
                                    @csrf
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">to chage account</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="text" name="name" class="form-control" value="{{$user->name}}"
                                                                   placeholder="Name" autofocus>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></div>
                                                                        <select id="year" name="userlevel" class="custom-select">

                                                                            <option value="main"
                                                                            @if ($user->userlevel=='main')
                                                                            selected
                                                                            @endif
                                                                            >Officer</option>
                                                                            <option value="normal"
                                                                            @if ($user->userlevel=='normal')
                                                                            selected
                                                                            @endif
                                                                            >Staff</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                      <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></div>
                                                                      <select id="year" name="department" class="custom-select">
                                                                        @foreach ($departments as $department)
                                                                        <option value="{{$department->id}}"
                                                                            @if ($department->id==$user->department_id)
                                                                            selected
                                                                            @endif
                                                                            >{{$department->name}}</option>
                                                                        @endforeach

                                                                      </select>
                                                              </div>
                                                      </div>
                                                  </div>
                                          </div>
                                            </div>
                                          <div class="row d-flex justify-content-center">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="email" name="email" class="form-control" value="{{$user->email}}"
                                                                   placeholder="Email" autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="row d-flex justify-content-center">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="password" name="oldpassword" class="form-control"
                                                                   placeholder="Old Password" required autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-center">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                            <input type="password" name="newpassword" class="form-control"
                                                                       placeholder="new Password" autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                    </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                </div>
        </div>
        <div class="pagination justify-content-end">
            {{$users->links()}}
    </div>
    </div>
</div>
</div>
@endsection
