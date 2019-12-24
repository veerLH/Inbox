@extends('backend.superadmin.super')

@section('title','Inbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')


<div class="container">
        <div class="card border-success col-md-12 mx-auto" id="department">
                <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ထွက်စာနှင့်သက်ဆိုင်သောအချက်အလက်များဖြည့်သွင်းရန်</div>
                <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                <input type="text" name="outboxid" class="form-control" id="g_name"
                                       placeholder="ထွက်စာအမှတ်" required autofocus>
                            </div>


                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></div>
                                            <select id="year" name="ministry_id" class="custom-select">
                                                    @foreach ($ministries as $ministry)
                                                    <option value="{{$ministry->id}}">{{$ministry->name}}</option>
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
                                <input type="text" name="sendoutdepartment" class="form-control" id="g_name"
                                       placeholder="စာထွက်သည့်ဦးစီးဌာန" autofocus>
                            </div>


                        </div>
                    </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                    <input type="text" name="sendoutuniversity" class="form-control" id="g_nrc"
                                           placeholder="စာထွက်သည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ" required autofocus>
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
                                            @foreach ($depts as $dept)
                                            <option value="{{$dept->id}}">{{$dept->name}}</option>
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
                            <input type="text" name="outbox_detail" class="form-control" id="g_name"
                                   placeholder="စာအမှတ်အပြည့်အစုံ" required autofocus >
                        </div>


                    </div>
                </div>

            </div>
            <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                <input type="date" name="out_date" class="form-control" id="g_name"
                                       placeholder="စာထွက်သည့်ရက်စွဲ" required autofocus >
                            </div>


                        </div>
                    </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                    <input type="text" name="content" class="form-control" id="g_nrc"
                                           placeholder="အကြောင်းအရာ" required autofocus>
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
                                                @foreach ($ministries as $ministry)
                                                <option value="{{$ministry->id}}">{{$ministry->name}}</option>
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

                                    <input type="text" name="senddept" class="form-control" id="g_nrc"
                                           placeholder="ပေးပို့မည့်ဦးစီးဌာန" autofocus>
                                </div>

                            </div>
                        </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                            <input type="text" name="senduniversity" class="form-control" id="g_name"
                                   placeholder="ပေးပို့မည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ" required autofocus>
                        </div>


                    </div>
                </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>

                                <input type="date" name="senddate" class="form-control" id="g_nrc"
                                       placeholder="ပေးပို့သည့်ရက်စွဲ" required autofocus >
                            </div>

                        </div>
                    </div>
        </div>
            <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-id-badge" style="font-size:14px;color:green"></i></div>
                                <input type="text" name="sendby" class="form-control" id="g_name"
                                       placeholder="ပေးပို့နည်း" required autofocus>
                            </div>


                        </div>
                    </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>

                                    <input type="file" name="filelink[]" class="form-control" id="g_nrc"
                                           placeholder="စာဖိုင်" required autofocus multiple>
                                </div>

                            </div>
                        </div>
            </div>
            <input type="hidden" name="adminstatus" value="0">

            <div class="mx-auto" style="width: 200px;">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>စာရင်းသွင်းမည်</button>
                </div>


        </div>
        </form>
     </div>

</div>


@endsection

@section('script')

@if (session('ok'))

<script>
swal({
    title: "အောင်မြင်စွာ",
    text: "တစ်ခုတိုးပြီးပါပြီ",
    icon: "success",
    button: "ဆက်လုပ်ရန်",
    })

</script>

@endif

@endsection
