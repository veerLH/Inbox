@extends('backend.superadmin.super')

@section('title','Inbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')

<div class="container">

    <div class="row mx-auto" id="department">
        <div class="col-md-12 mx-auto">
            <div class="card border-warning">
                    <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ဝင်စာများပြန်လည်စစ်ဆေးရန်</div>
                    <div class="card-body">
                            <table class="table table-hover">
                                    <thead class="table-primary">
                                      <tr>
                                        <th scope="col">ဝင်စာအမှတ်</th>
                                        <th scope="col">ပေးပို့သည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ</th>
                                        <th scope="col">စာအမှတ်အပြည့်အစုံ</th>
                                        <th scope="col">ရရှိသည့်ရက်စွဲ</th>
                                        <th scope="col">အပြည့်အစုံ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inboxs as $inbox)
                                        <tr>
                                        <th scope="row">{{$inbox->inboxid}}</th>                                       
                                        <td>{{$inbox->senduniversity}}</td>
                                        <td>{{$inbox->inbox_detail}}</td>
                                        <td>{{$inbox->receive_date}}</td>
                                        <td class="text-danger font-weight-bold"><a href="{{url('super/review/inbox/'.$inbox->id.'/more')}}">More --</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                    </div>
            </div>
            <div class="pagination justify-content-end">
                    {{$inboxs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
