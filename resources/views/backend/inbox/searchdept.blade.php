@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center" id="department">
            <div class="col-md-4" >
                    <form method="POST" action="{{url('admin/inboxsearch')}}">
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
            <form method="POST" action="{{url('admin/deptsearch')}}">
                    <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        @csrf
                                            <select id="year" name="deptid" class="custom-select" required>
                                                 <option value="0"
                                                 @if ($id==0)
                                                     selected
                                                 @endif
                                                 >ဝင်စာအားလုံး</option>   
                                                @foreach ($departments as $department)
                                                <option value="{{$department->id}}"
                                                        @if ($id==$department->id)
                                                                selected
                                                        @endif
                                                >{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-prepend">
                                                    <button type="submit" class="input-group-text"><i class="fas fa-university" style="font-size:14px;color:#BF360C"></i></button>
                                            </div>
                                    </div>
                            </div>
                        </form>
                </div>
                <div class="col-md-4">
                        <form method="POST" action="{{url('admin/datesearch')}}">
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
            <div class="card border-danger">
                    <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ဌာနအလိုက်ရှာဖွေထားသောဝင်စာများ</div>
                    <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                    <thead class="table-primary">
                                      <tr>
                                        <th scope="col">ဝင်စာအမှတ်</th>
                                        <th scope="col">ပေးပို့သည့်ဌာန/တက္ကသိုလ်</th>
                                        <th scope="col">ညွှန်ကြားချက်</th>
                                        <th scope="col">ရရှိသည့်ရက်စွဲ</th>
                                        <th scope="col">အပြည့်အစုံ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inboxs as $inbox)
                                      <tr>
                                        <th scope="row">{{$inbox->inboxid}}</th>
                                        <td>{{$inbox->senduniversity}}</td>
                                        <td>{{$inbox->tododepartment->todo}}</td>
                                        <td>{{$inbox->receive_date}}</td>
                                        <td class="text-danger font-weight-bold"><a href="{{url('admin/inbox/'.$inbox->id.'/more')}}">More --</a></td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                            </div>
                    </div>
            </div>
            <div class="pagination justify-content-end">
                    {{$inboxs->appends(Request::only(['deptid'=>'deptid']))->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
