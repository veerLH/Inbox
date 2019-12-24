@extends('backend.normal.normal')

@section('title','Inbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')
<div class="container">
        <div class="row d-flex justify-content-center" id="department">
                <div class="col-md-4" >
                        <form method="POST" action="{{url('normal/outboxsearch')}}">
                            @csrf
                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                <div class="input-group mb-4">
                                  <input type="text" name="search" class="form-control" id="inlineFormInputGroup" placeholder="ရှာဖွေရန်" required>
                                  <div class="input-group-prepend">
                                        <button type="submit" class="input-group-text"><i class="fa fa-search" style="font-size:14px;color:#BF360C"></i></button>
                                      </div>

                                </div>
                            </form>
                 </div>
                 @if ($checkdept=='w')
                 <div class="col-md-4" >
                     <form method="POST" action="{{url('normal/outdeptinbox')}}">
                         @csrf
                     <div class="form-group">
                         <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                                         <select id="year" name="deptid" class="custom-select">
                                             <option value="0">ထွက်စာအားလုံး</option>
                                             @foreach ($depid as $dept)
                                             <option value="{{$dept->id}}">{{$dept->name}}</option>
                                             @endforeach
                                         </select>
                                         <div class="input-group-prepend">
                                                 <button type="submit" class="input-group-text"><i class="fas fa-university" style="font-size:14px;color:#BF360C"></i></button>
                                         </div>

                                 </div>

                         </div>
                     </div>
                   </form>
                 </div>
               
                 @endif
                 <div class="col-md-4" >
                        <form method="POST" action="{{url('normal/outboxdatesearch')}}">
                            @csrf
                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                <div class="input-group mb-4">
                                  <input type="date" name="datesearch" class="form-control" id="inlineFormInputGroup" placeholder="Searching" required>
                                  <div class="input-group-prepend">
                                        <button type="submit" class="input-group-text"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i>&nbsp;<i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></button>
                                      </div>

                                </div>
                            </form>
                 </div>


        </div>
<div class="row mx-auto">
    <div class="col-md-12 mx-auto">
        <div class="card border-warning">
                <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ထွက်စာများ</div>
                <div class="card-body">
                        <table class="table table-hover">
                                <thead >
                                  <tr class="table-info">
                                    <th scope="col">ထွက်စာအမှတ်</th>
                                    <th scope="col">စာထွက်သည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ</th>
                                    <th scope="col">စာထွက်သည့်ဌာနစိတ်</th>
                                    <th scope="col">အပြည့်အစုံ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                        @foreach ($outboxs as $outbox)

                                        <tr>
                                        <th scope="row">{{$outbox->outboxid}}</th>
                                          <td>{{$outbox->sendoutuniversity}}</td>
                                          <td>{{$outbox->department->name}}</td>
                                          <td class="text-danger font-weight-bold"><a href="{{url('normal/outbox/'.$outbox->id.'/more')}}">More --</a></td>
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
