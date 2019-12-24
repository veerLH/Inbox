@extends('backend.superadmin.super')

@section('title','Inbox')
@section('link')
<link rel="stylesheet" href="{{asset('/css/super/super.css')}}">
@endsection

@section('content')

<div class="container">
     <div class="row" id="department">
         <div class="col-md-8 mx-auto">


            <div class="card ">
                    <div class="card-header text-center" >
                      ဌာန/တက္ကသိုလ်/ကုမ္ပဏီမှတိုက်ိရုက်ထွက်သောစာများ
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$did}}" name="department_id">
                            <div class="form-group">

                                    <label for="comment">ဆောင်ရွက်ချက်</label>
                                    <textarea class="form-control" rows="5" id="comment" name="content">

                                    </textarea>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-id-card" style="font-size:14px;color:#1A237E"></i></div>

                                        <input type="file" name="filelink[]" class="form-control" id="g_nrc"
                                               placeholder="file" required autofocus multiple>
                                    </div>

                                </div>

                                <input type="hidden" value="0" name="status">
                                
                              <div class="btn-check-log text-center">
                                  <button type="submit" class="btn btn-primary">
                                        တင်ပြမည်
                                  </button>
                              </div>
                            </form>
                    </div>

            </div>
        </div>
     </div>
</div>

@endsection
