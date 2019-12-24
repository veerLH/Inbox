@extends('backend.normal.normal')

@section('title','Inbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')
<div class="container">
        <div class="row d-flex justify-content-center" id="department">
                <div class="col-md-4" >
                        <form method="POST" action="{{url('normal/inboxsearch')}}">
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
                     <form method="POST" action="{{url('normal/deptinbox')}}">
                         @csrf
                     <div class="form-group">
                         <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                                         <select id="year" name="deptid" class="custom-select">
                                             <option value="0">ဝင်စာအားလုံး</option>
                                             @foreach ($depid as $dept)
                                             <option value="{{$dept->id}}"
                                               
                                              >{{$dept->name}}</option>
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
                        <form method="POST" action="{{url('normal/inboxdatesearch')}}">
                            @csrf
                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                <div class="input-group mb-4">
                                  <input type="date" name="datesearch" class="form-control" id="inlineFormInputGroup" placeholder="ရှာဖွေရန်" required>
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
                <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">ဝင်စာများ</div>
                <div class="card-body">
                        <table class="table table-hover">
                                <thead >
                                  <tr class="table-info">
                                    <th scope="col">ဝင်စာအမှတ်</th>
                                    <th scope="col">ပေးပို့သည့်ဌာန/တက္ကသိုလ်/ကုမ္ပဏီ</th>
                                    <th scope="col">ရရှိသည့်ရက်စွဲ</th>
                                    <th scope="col">မှတ်ချက်</th>
                                    <th scope="col">အပြည့်အစုံ</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach ($inboxs as $inbox)

                                  <tr>
                                  <th scope="row">{{$inbox->inboxid}}</th>
                                    <td>{{$inbox->senduniversity}}</td>
                                    <td>{{$inbox->receive_date}}</td>
                                    <td>{{$inbox->Tododepartment->todo}}</td>
                                    <td class="text-danger font-weight-bold"><a href="{{url('normal/inbox/'.$inbox->id.'/more')}}">အပြည့်အစုံ</a></td>
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
