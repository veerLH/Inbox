@extends('backend.superadmin.super')

@section('title','outbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')

<div class="container">
        <div class="row d-flex justify-content-center" id="department">
                <div class="col-md-4">
                <form method="POST" action="{{url('super/reviewoutdept')}}">
                    @csrf
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                                            <select id="year" name="deptid" class="custom-select">
                                                @foreach ($depid as $dept)
                                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-prepend">
                                                    <button type="submit" class="input-group-text"><i class="fas fa-university" style="font-size:14px;color:#BF360C"></i></button>
                                                  </div>

                                    </div>

                            </div>
                        </form>
                        </div>
                    </div>
        </div>
    <div class="row mx-auto">
        <div class="col-md-12 mx-auto">
            <div class="card border-warning">
                    <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ထွက်စာများပြန်လည်စစ်ဆေးရန်</div>
                    <div class="card-body">
                            <table class="table table-hover">
                                    <thead class="table-primary">
                                      <tr>
                                        <th scope="col">ထွက်စာအမှတ်</th>
                                        <th scope="col">စာထွက်သည့်ဌာနစိတ်</th>
                                        <th scope="col">ပေးပို့သည့်ရက်စွဲ</th>
                                        <th scope="col">အပြည့်အစုံ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($outboxs as $outbox)

                                            <tr>
                                            <th scope="row">{{$outbox->outboxid}}</th>
                                              <td>{{$outbox->department->name}}</td>
                                              <td>{{$outbox->senddate}}</td>
                                              <td class="text-danger font-weight-bold"><a href="{{url('super/review/outbox/'.$outbox->id.'/more')}}">More --</a></td>
                                            </tr>

                                            @endforeach
                                    </tbody>
                                  </table>
                    </div>
            </div>
            <div class="pagination justify-content-end">
                    {{$outboxs->appends(Request::only(['deptid'=>'deptid']))->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
