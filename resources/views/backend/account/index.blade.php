@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('content')

<div class="container">
        <div class="card col-md-10 mx-auto" id="department">
                <div class="card-body">
                    <form method="POST">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                      
                        <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user" style="font-size:14px;color:green"></i></div>
                            <input type="text" name="name" class="form-control myanmar" id="g_name"
                                   placeholder="အမည်" required autofocus>
                        </div>


                    </div>
                </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>
                                <input type="email" name="email" class="form-control myanmar" id="g_nrc"
                                       placeholder="အီးမေးလ်" required autofocus>
                            </div>

                        </div>
                    </div>

        </div>
        <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key" style="font-size:14px;color:green"></i></div>
                            <input type="password" name="password" class="form-control unicode" id="g_name"
                                   placeholder="လျှို့ဝှက်နံပါတ်ထည့်ရန်" required autofocus>
                        </div>


                    </div>
                </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key" style="font-size:14px;color:#1A237E"></i></div>
                                <input type="password" name="password_confirmation" class="form-control unicode" id="g_nrc"
                                 placeholder="လျှို့ဝှက်နံပါတ်အတည်ပြုရန်" required autofocus>
                            </div>

                        </div>
                    </div>

        </div>

        <div class="row d-flex justify-content-center">

                <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-university" style="font-size:14px;color:#BF360C"></i></div>
                                            <select id="year" name="department" class="custom-select myanmar">
                                                    <option class="hidden" value="0" selected >ဌာနရွေးချယ်ရန်</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{$department->id}}" >{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-users" style="font-size:14px;color:#BF360C"></i></div>
                                            <select id="year" name="userlevel" class="custom-select myanmar">
                                                <option value="main">Officer</option>
                                                <option value="normal">Staff</option>
                                            </select>
                                    </div>

                            </div>

                        </div>
                    </div>

        </div>

        <input type="hidden" name="adminstatus" value="0">

        <div class="mx-auto" style="width: 200px;">
                <button type="submit" class="btn btn-primary myanmar"><i class="fa fa-edit"></i>စာရင်းသွင်းမည်</button>
            </div>
        </form>

        </div>

     </div>

</div>

@endsection

@section('script')

@if (session('ok'))

<script>
swal({
    title: "အောင်မြင်ပါက",
    text: "တစ်ခုတိုးသည်",
    icon: "success",
    button: "ဆက်လုပ်ရန်",
    })

</script>

@endif
@endsection
