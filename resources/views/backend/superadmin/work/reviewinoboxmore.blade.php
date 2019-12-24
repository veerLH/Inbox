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
                    <div class="card-header">
                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit" style="float:left; font-size:2em;color:#0d47a1"></i></a>&nbsp;&nbsp;&nbsp;<a href="{{url('/super/delete/'.$inboxs->id.'/more')}}"><i class="far fa-trash-alt" style="float: right;font-size:2em;color:#CC0000"></i></a>
                    </div>
                <table class="table table-hover">

                    <tbody>
                    <tr>
                        <th scope="row">ဝင်စာအမှတ်</th>
                        <td colspan="2">{{$inboxs->inboxid}}</td>

                    </tr>
                    <tr>
                        <th scope="row">ရရှိသည့်နေ့စွဲ</th>
                        <td colspan="2">{{$inboxs->receive_date}}</td>

                    </tr>
                    <tr>
                        <th scope="row">ပေးပို့သည့်ဝန်ကြီးဌာန</th>
                        @if ($inboxs->ministry_id==0)
                        <td colspan="2"> -</td>
                        @else
                        <td colspan="2"> {{$inboxs->ministry->name}}</td>
                        @endif
                   

                    </tr>
                    <tr>
                            <th scope="row">ပေးပို့သည့်ဦးစီးဌာန</th>
                            <td colspan="2">{{$inboxs->senddept}}</td>

                    </tr>
                    <tr>
                            <th scope="row">ပေးပို့သည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ</th>
                            <td colspan="2">{{$inboxs->senduniversity}}</td>

                    </tr>
                    <tr>
                            <th scope="row">ပေးပို့သည့်ဌာနစိတ်</th>
                            <td colspan="2">{{$inboxs->sendbranch}}</td>

                    </tr>
                    <tr>
                            <th scope="row">စာအမှတ်အပြည့်အစုံ</th>
                            <td colspan="2">{{$inboxs->inbox_detail}}</td>

                    </tr>
                    <tr>
                            <th scope="row">စာနံပါတ်</th>
                            <td colspan="2">{{$inboxs->inbox_no}}</td>

                    </tr>
                    <tr>
                            <th scope="row">စာထွက်သည့်ရက်စွဲ</th>
                            <td colspan="2">{{$inboxs->out_date}}</td>

                    </tr>
                    <tr>
                            <th scope="row">လက်ခံသူ</th>
                            <td colspan="2">{{$inboxs->receiver}}</td>

                    </tr>

                    <tr>
                            <th scope="row">ဝင်စာဖတ်ရန်</th>
                            <td colspan="2">
                                    @foreach (unserialize($inboxs->filelink) as $file)
                                    <a href="{{url('super/review/inbox/'.$inboxs->id.'/detail/'.$file)}}">{{$file}}</a> <br>
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
                          
                          <p class="card-text"> {{$inboxs->content}}</p>
                          <br>

                        </div>
                </div>
                <br>
                <br>

        </div>
    </div>
</div>

{{----------------------------Tempcbox Edit -----------------------------}}
    <form method="POST">
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">ဝင်စာနှင့်သက်ဆိုင်သောအချက်အလက်များပြင်ဆင်ရန်</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                        </div>
                        <div class="modal-body">
                                <div class="card border-success col-md-12 mx-auto" id="department">
                                        <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ဝင်စာရေးရန်</div>
                                        <div class="card-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row d-flex justify-content-center">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="text" name="inboxid" class="form-control" value="{{$inboxs->inboxid}}"
                                                               placeholder="inbox_id" autofocus>
                                                    </div>


                                                </div>
                                            </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                                            <input type="date" name="receive_date" class="form-control" value="{{$inboxs->receive_date}}"
                                                                   placeholder="Receive_Date" autofocus>
                                                        </div>

                                                    </div>
                                                </div>

                                    </div>
                                    <div class="row d-flex justify-content-center">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="text" name="senddept" class="form-control" value="{{$inboxs->senddept}}"
                                                               placeholder="SentDept/Company" autofocus>
                                                    </div>


                                                </div>
                                            </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                                            <input type="text" name="senduniversity" class="form-control" value="{{$inboxs->senduniversity}}"
                                                                   placeholder="sentuniversity" autofocus>
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
                                                                        <select id="year" name="ministry_id" class="custom-select">
                                                                            @foreach ($ministries as $ministry)
                                                                            <option  value="{{$ministry->id}}"
                                                                                @if ($ministry->id==$inboxs->ministry_id)
                                                                                    selected
                                                                                @endif
                                                                                >{{$ministry->name}}</option>
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
                                                                <input type="text" name="sendbranch" class="form-control" value="{{$inboxs->sendbranch}}"
                                                                       placeholder="sendbranch" autofocus>
                                                            </div>

                                                        </div>
                                                    </div>

                                    </div>
                                    <div class="row d-flex justify-content-center">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="text" name="inbox_detail" class="form-control" value="{{$inboxs->inbox_detail}}"
                                                               placeholder="inbox_detail" autofocus >
                                                    </div>


                                                </div>
                                            </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                                            <input type="text" name="inbox_no" class="form-control" value="{{$inboxs->inbox_no}}"
                                                                   placeholder="inbox_no" autofocus>
                                                        </div>

                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="date" name="out_date" class="form-control" value="{{$inboxs->out_date}}"
                                                               placeholder="outdate" autofocus>
                                                    </div>


                                                </div>
                                            </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>

                                                            <input type="text" name="receiver" class="form-control" value="{{$inboxs->receiver}}"
                                                                   placeholder="receiver" autofocus>
                                                        </div>

                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                                        <input type="text" name="content" class="form-control" value="{{$inboxs->content}}"
                                                               placeholder="Content" autofocus>
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
