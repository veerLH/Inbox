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
                    <div class="card-header col-md-12 d-flex justify-content-center" id="headertxt">မှတ်ချက်ပေးထားသည့်တိုက်ရိုက်ထွက်စာများ</div>
                    <div class="card-body">
                            <table class="table table-hover">
                                    <thead class="table-primary">
                                      <tr>
                                        <th scope="col">စာအကြောင်းအရာ</th>
                                        <th scope="col">မှတ်ချက်</th>
                                        <th scope="col">စာဖတ်ရန်</th>
                                        <th scope="col">အပြည့်အစုံ</th>

                                      </tr>
                                            @foreach ($Completestatus as $Complete)
                                            <tr>
                                            <th scope="row">{{$Complete->content}}</th>

                                              <td>{{$Complete->recontent}}</td>
                                                <td>
                                                        @foreach (unserialize($Complete->filelink) as $file)
                                                        <a href="{{url('super/unioutbox/'.$Complete->id.'/read/'.$file)}}" class="card-title">{{$file}}</a>
                                                            @endforeach
                                                </td>
                                              <td class="text-danger font-weight-bold"><i class="fa fa-bars" style="float:left;font-size:1.5em;color:#0d47a1" data-toggle="modal" data-target="#exampleModal{{$Complete->id}}"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('super/delete/'.$Complete->id.'/uniout')}}"><i class="far fa-trash-alt" style="float-left:7%;font-size:1.5em;color:red"></i></a></td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{$Complete->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">to chage account</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">



                                                            <div class="form-group">

                                                                    <label for="comment">ဆောင်ရွက်ချက်</label>
                                                                    <textarea class="form-control " rows="5" readonly >
                                                                            {{$Complete->recontent}}
                                                                    </textarea>
                                                            </div>
                                                            <br>
                                                            @foreach (unserialize($Complete->filelink) as $file)
                                                        <a href="{{url('super/unioutbox/'.$Complete->id.'/read/'.$file)}}" class="card-title">{{$file}}</a>
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
