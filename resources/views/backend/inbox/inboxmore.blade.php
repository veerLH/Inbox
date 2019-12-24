@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection
@section('content')

<div class="container">
    <div class="row" id="department">
        <div class="col-md-8">
            <div class="card">
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
                    {{--  <tr>
                            <th scope="row">ပေးပို့သည့်</th>
                            <td colspan="2">{{$inboxs->inbox_detail}}</td>

                    </tr>  --}}
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
                                    <a href="{{url('admin/inbox/'.$inboxs->id.'/detail/'.$file)}}">{{$file}}</a> <br>
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
                                <h5 style="font-weight:bold;">အ‌ကြောင်းအရာ</h5>
                        </div>
                        <div class="card-body">
                          <p class="card-text"> {{$inboxs->content}}</p>
                          <br>

                        </div>
                </div>
                <br>
                <br>
                <div class="card">
                        <div class="card-header">
                          <h5> ညွှန်ကြားချက်</h5>
                        </div>
                        <div class="card-body">
                         
                          <p class="card-text"> {{$inboxs->Tododepartment->todo}}</p>
                          <br>
                          {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sem-login">
                                သတ်မှတ်မည်
                          </button>  --}}
                        </div>
                      </div>
        </div>
    </div>
</div>

<form class="seminor-login-form" method="POST">
        <!-- The Modal -->
        <div class="modal fade seminor-login-modal" data-backdrop="static" id="sem-login">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">


              <!-- Modal body -->
              <div class="modal-body seminor-login-modal-body">
               <h5 class="modal-title text-center" id="dept_label">ဌာနသတ်မှတ်ရန်နှင့်ညွှန်ကြားချက်ပေးရန်</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                </button>

                @csrf
                <input type="hidden" name="todoid" value="{{$inboxs->Tododepartment->id}}">

            <input type="hidden" name="inboxid" value="{{$inboxs->id}}">
                <br>
            <div class="form-group">

                    <label for="comment">ဆောင်ရွက်ချက်</label>
                    <textarea class="form-control" rows="5" id="comment" name="todo">
                        {{$inboxs->Tododepartment->todo}}
                    </textarea>
            </div>
              <div class="btn-check-log">
                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#sem-login">
                        သတ်မှတ်မည်
                  </button>
              </div>

              </div>
            </div>
          </div>
        </div>
    </form>

@endsection
