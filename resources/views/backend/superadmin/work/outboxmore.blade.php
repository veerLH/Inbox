@extends('backend.superadmin.super')
@section('title','AddDepartment')
@section('link')
<link rel="stylesheet" href="{{asset('/css/admin/morecss.css')}}">

@endsection
@section('content')

<div class="container">
    <div class="row" id='divdetail'>
        <div class="col-md-8">
            <div class="card">
                    @if ($checkdept=='w')
                        <div class="card-header">
                          
                           <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit" style="float:right; font-size:2em;color:#0d47a1"></i></a>&nbsp;&nbsp;&nbsp;
                                   
                         </div>
                         @endif  
                <table class="table table-hover">

                        <tbody>
                                <tr>
                                    <th scope="row">ထွက်စာအမှတ်</th>
                                    <td colspan="2">{{$outboxs->outboxid}}</td>
            
                                </tr>
                                <tr>
                                    <th scope="row">စာထွက်သည့်ဝန်ကြီးဌာန</th>
                                    <td colspan="2">{{$outboxs->ministry->name}}</td>
            
                                </tr>
                                <tr>
                                    <th scope="row">စာထွက်သည့်ဦးစီးဌာန</th>
                                    <td colspan="2"> {{$outboxs->sendoutdepartment}}</td>
            
                                </tr>
                                <tr>
                                        <th scope="row">စာထွက်သည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ</th>
                                        <td colspan="2">{{$outboxs->sendoutuniversity}}</td>
            
                                </tr>
                                <tr>
                                        <th scope="row">စာထွက်သည့်ဌာနစိတ်</th>
                                        <td colspan="2">{{$outboxs->department->name}}</td>
            
                                </tr>
                                <tr>
                                    <th scope="row">စာအမှတ်အပြည့်အစုံ</th>
                                    <td colspan="2">{{$outboxs->outbox_detail}}</td>
            
                            </tr>
                                <tr>
                                        <th scope="row">စာထွက်သည့်ရက်စွဲ</th>
                                        <td colspan="2">{{$outboxs->out_date}}</td>
            
                                </tr>
                                <tr>
                                        <th scope="row">ပေးပို့မည့်ဝန်ကြီးဌာန</th>
                                        @foreach ($ministry as $ministries)
                                        @if ($ministries->id==$outboxs->sendministry_id)
                                        <td colspan="2">{{$ministries->name}}</td>    
                                        @endif
                                     
                                        @endforeach
                                    
            
                                </tr>
                                <tr>
                                        <th scope="row">ပေးပို့မည့်ဦးစီးဌာန</th>
                                        <td colspan="2">{{$outboxs->senddept}}</td>
            
                                </tr>
                                <tr>
                                        <th scope="row">ပေးပို့မည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ</th>
                                        <td colspan="2">{{$outboxs->senduniversity}}</td>
            
                                </tr>
                                <tr>
                                        <th scope="row">စာပို့သည့်ရက်စွဲ</th>
                                        <td colspan="2">{{$outboxs->senddate}}</td>
            
                                </tr>
                                <tr>
                                        <th scope="row">ပေးပို့နည်း</th>
                                        <td colspan="2">{{$outboxs->sendby}}</td>
            
                                </tr>
            
                                <tr>
                                        <th scope="row">ထွက်စာဖတ်ရန်</th>
                                        <td colspan="2">
                                                @foreach (unserialize($outboxs->filelink) as $file)
                                                <a href="{{url('super/outbox/'.$outboxs->id.'/detail/'.$file)}}">{{$file}}</a> <br>
                                                @endforeach
            
                                        </td>
                                </tr>
                                </tbody>
                </table>
            </div>
            <br>
            <br>
        </div>
        <div class="col-md-4">
                <div class="card">
                        <div class="card-header">
                         <h5>အ‌ကြောင်းအရာ</h5>
                        </div>
                        <div class="card-body">
                         
                          <p class="card-text"> {{$outboxs->content}}</p>
                          <br>

                        </div>
                </div>
                <br>
                <br>

        </div>
    </div>
</div>

<form class="seminor-login-form" method="POST">
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                </div>
                                <div class="modal-body">
                                        <div class="card border-success col-md-12 mx-auto" id="department">
                                                <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ထွက်စာနှင့်သက်ဆိုင်သောအချက်အလက်များပြင်ဆင်ရန်</div>
                                                <div class="card-body">
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row d-flex justify-content-center">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                            <input type="text" name="outboxid" class="form-control" value="{{$outboxs->outboxid}}"
                                                                       placeholder="outbox_id" autofocus>
                                                            </div>
        
        
                                                        </div>
                                                    </div>
        
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></div>
                                                                            <select id="year" name="ministry_id" class="custom-select">
                                                                              @foreach ($ministry as $minist)
                                                                              <option value="{{$minist->id}}"
                                                                                @if ($minist->id==$outboxs->ministry_id )
                                                                                    selected
                                                                                @endif  
                                                                                >
                                                                                {{$minist->name}}</option>
                                                                              @endforeach
                                                                               
                                                                            </select>
                                                                    </div>
        
                                                            </div>
        
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                                <input type="text" name="sendoutdepartment" class="form-control" value="{{$outboxs->sendoutdepartment}}"
                                                                       placeholder="SentoutDept/Company" autofocus>
                                                            </div>
        
        
                                                        </div>
                                                    </div>
        
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                                                    <input type="text" name="sendoutuniversity" class="form-control"  value="{{$outboxs->sendoutuniversity}}"
                                                                           placeholder="sentoutuniversity" autofocus>
                                                                </div>
        
                                                            </div>
                                                        </div>
        
                                            </div>
        
                                            <div class="row d-flex justify-content-center">
        
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></div>
                                                                        <select id="year" name="department_id" class="custom-select">
                                                                            @foreach ($depid as $dept)
                                                                            <option value="{{$dept->id}}"
                                                                                @if ($dept->id==$outboxs->department_id )
                                                                                    selected
                                                                                @endif
                                                                                >
                                                                                {{$dept->name}}</option>
                                                                            @endforeach
        
                                                                        </select>
                                                                </div>
        
                                                        </div>
        
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                            <input type="text" name="outbox_detail" class="form-control" value="{{$outboxs->outbox_detail}}"
                                                                   placeholder="outbox_detail" autofocus >
                                                        </div>
        
        
                                                    </div>
                                                </div>
        
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                                <input type="date" name="out_date" class="form-control" value="{{$outboxs->out_date}}"
                                                                       placeholder="out_date" autofocus >
                                                            </div>
        
        
                                                        </div>
                                                    </div>
        
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                                                    <input type="text" name="content" class="form-control" value="{{$outboxs->content}}"
                                                                           placeholder="content" autofocus>
                                                                </div>
        
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></div>
                                                                        <select id="year" name="sendministry" class="custom-select">
                                                                            @foreach ($ministry as $minis)
                                                                            <option value="{{$minis->id}}"
                                                                                @if ($minis->id==$outboxs->sendministry_id)
                                                                                    selected
                                                                                @endif
                                                                                
                                                                                >{{$minis->name}}</option>
                                                                            @endforeach
                                                                            
                                                                        </select>
                                                                </div>
        
                                                        </div>
        
                                                    </div>
                                                </div>
        
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
        
                                                                    <input type="text" name="senddept" class="form-control" value="{{$outboxs->senddept}}"
                                                                           placeholder="senddept"  autofocus>
                                                                </div>
        
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                            <input type="text" name="senduniversity" class="form-control" value="{{$outboxs->senduniversity}}"
                                                                   placeholder="senduniversity" required autofocus>
                                                        </div>
        
        
                                                    </div>
                                                </div>
        
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
        
                                                                <input type="date" name="senddate" class="form-control" value="{{$outboxs->senddate}}"
                                                                       placeholder="date" required autofocus multiple>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                        </div>
                                            <div class="row d-flex justify-content-center">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                                <input type="text" name="sendby" class="form-control" value="{{$outboxs->sendby}}"
                                                                       placeholder="sendby" autofocus>
                                                            </div>
        
        
                                                        </div>
                                                    </div>
        
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
        
                                                                    <input type="file" name="filelink[]" class="form-control" id="g_nrc"
                                                                           placeholder="file" autofocus multiple>
                                                                </div>
        
                                                            </div>
                                                        </div>
                                            </div>
        
                                        </div>
                                        </form>
                                     </div>
        
                                  </div>
                                 <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ပိတ်မည်</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> ပြင်ဆင်မည်</button>
                                 </div>
                                </form>
                        </div>
                </div>
        </form>
@endsection
