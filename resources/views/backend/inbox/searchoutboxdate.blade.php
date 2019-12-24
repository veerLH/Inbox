@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')

<div class="container">
        <div class="row d-flex justify-content-center" id="department">
                <div class="col-md-4" >
                        <form method="POST" action="{{url('admin/outboxsearch')}}">
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
                <div class="col-md-4">
                <form method="POST" action="{{url('admin/outdeptsearch')}}">
                        <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            @csrf
                                                <select id="year" name="deptid" class="custom-select" required>
                                                    <option value="0">ထွက်စာအားလုံး</option> 
                                                    @foreach ($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-prepend">
                                                        <button type="submit" class="input-group-text"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></button>
                                                      </div>

                                        </div>

                                </div>
                            </form>
                    </div>
                    <div class="col-md-4">
                    <form method="POST" action="{{url('admin/outboxdatesearch')}}">
                        @csrf
                        <div class="form-group">
                                <div class="input-group mb-4">
                                        <input type="date" name="datesearch" class="form-control" id="inlineFormInputGroup" placeholder="Searching" required>
                                        <div class="input-group-prepend">
                                              <button type="submit" class="input-group-text"><i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i>&nbsp;<i class="far fa-calendar-alt" style="font-size:14px;color:#BF360C"></i></button>
                                            </div>

                                </div>

                        </div>
                    </form>
                    </div>
        </div>

        <div class="row mx-auto">
                <div class="col-md-12 mx-auto">
                    <div class="card border-warning">
                            <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ရက်စွဲအလိုက် ရှာဖွေထားသောထွက်စာများ</div>
                            <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <th scope="col">ထွက်စာအမှတ်</th>
                                                <th scope="col">စာထွက်သည့်ဌာန/တက္ကသိုလ်/</th>
                                                <th scope="col">ပေးပို့သည့်ရက်စွဲ</th>
                                                <th scope="col">အပြည့်အစုံ</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($outboxs as $outbox)

                                                    <tr>
                                                        <th scope="row">{{$outbox->outboxid}}</th>
                                                        <td>{{$outbox->sendoutuniversity}}</td>
                                                        <td>{{$outbox->senddate}}</td>
                                                      <td class="text-danger font-weight-bold"><a href="{{url('admin/outbox/'.$outbox->id.'/more')}}">More --</a></td>
                                                    </tr>

                                                    @endforeach
                                            </tbody>
                                          </table>
                            </div>
                            </div>
                    </div>
                    <div class="pagination justify-content-end">
                            {{$outboxs->appends(Request::only(['datesearch'=>'datesearch']))->render()}}
                    </div>
                </div>
            </div>
</div>
@endsection
