@extends('backend.superadmin.super')

@section('title','outbox')

@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')

<div class="container">

  
    <div class="row mx-auto" id="department">
        <div class="col-md-12 mx-auto">
            <div class="card border-warning">
                    <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">မှတ်ချက်ပေးပြီးသောထွက်စာများ</div>
                    <div class="card-body">
                            <table class="table table-hover">
                                    <thead class="table-primary">
                                      <tr>
                                        <th scope="col">ဝင်စာအမှတ်</th>
                                        <th scope="col">စာထွက်သည့်ဌာနစိတ်</th>
                                        <th scope="col">ညွှန်ကြားချက်</th>
                                        <th scope="col">လုပ်ဆောင်ချက်</th>
                                      </tr>
                                            @foreach ($Completestatus as $Complete)
                                            <tr>
                                            <th scope="row">{{$Complete->Inbox->inboxid}}</th>
                                              <td>{{$Complete->department->name}}</td>
                                              <td>{{$Complete->recontent}}</td>
                                              <td class="text-danger font-weight-bold"><i class="fa fa-bars" style="float:left;font-size:1.5em;color:#0d47a1;padding-right:15%;padding-left:6%;" data-toggle="modal" data-target="#exampleModal{{$Complete->id}}"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('super/delete/'.$Complete->id.'/todout')}}"><i class="fa fa-trash" style="float:left;font-size:1.5em;color:red"></i></a></td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{$Complete->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်ပေးပြီးသောထွက်စာများ</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <h4 class="card-title">{{$Complete->Inbox->content}}</h4>
                                                            <br>

                                                            <div class="form-group">

                                                                    <label for="comment">မှတ်ချက်</label>
                                                                    <textarea class="form-control " rows="5" readonly >
                                                                            {{$Complete->recontent}}
                                                                    </textarea>
                                                            </div>
                                                            <br>
                                                            @foreach (unserialize($Complete->filelink) as $file)
                                                          <a href="{{url('super/feedback/'.$Complete->id.'/read/'.$file)}}" class="card-title">{{$file}}</a>
                                                            @endforeach
                                                        </div>

                                                      </div>
                                                    </div>
                                                  </div>

                                            @endforeach
                                    </tbody>
                                  </table>
                    </div>
            </div>
            <div class="pagination justify-content-end">
                    {{$Completestatus->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
