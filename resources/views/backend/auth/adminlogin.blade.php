@extends('backend.auth.authmain')
@section('title','Login')
@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-6 mb-4 col-sm-6 col-xs-8 mx-auto" id="adminregister">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Login</h3>
                                <!--Body-->
                            <form method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <div class="md-form">
                                        <i class="fa fa-envelope prefix"></i>
                                        <input type="email" id="inputValidationEx" name="email" class="form-control validate">
                                        <label for="inputValidationEx" data-error="wrong" data-success="right">အီးမေးလ်ထည့်သွင်းရန်</label>
                                </div>
                                <div class="md-form">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" id="inputValidationEx2" name="password" class="form-control">
                                        <label for="inputValidationEx2" data-error="wrong" data-success="right">လျှို့၀ှက်နံပါတ်ထည့်သွင်းရန်</label>
                                </div>



                                <div class="text-center">
                                    <button type="submit" class="btn waves-effect waves-light" id="btncolor">၀င်မည်</button>
                                </div>
                            </div>
                        </div>
                    </form>
        </div>
    </div>

@endsection

