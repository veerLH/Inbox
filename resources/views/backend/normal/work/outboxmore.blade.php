@extends('backend.normal.normal')
@section('title','AddDepartment')
@section('link')
<link rel="stylesheet" href="{{asset('/css/admin/morecss.css')}}">

@endsection
@section('content')

<div class="container">
    <div class="row" id='divdetail'>
        <div class="col-md-8">
            <div class="card">
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
                                    <a href="{{url('normal/outbox/'.$outboxs->id.'/detail/'.$file)}}">{{$file}}</a> <br>
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

@endsection
