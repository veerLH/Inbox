@extends('backend.auth.authmain')
@section('title','Register')
@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-6 mb-4 col-sm-6 col-xs-8 mx-auto" id="adminregister">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Register</h3>
                                <!--Body-->
                            <form method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="md-form">

                                        <i class="fa fa-user-circle prefix"></i>
                                        <input type="text" id="inputValidationEx2" name="name" class="form-control validate">
                                        <label for="inputValidationEx2" data-error="wrong" data-success="right">Type your Name</label>
                                </div>

                                <div class="md-form">
                                        <i class="fa fa-envelope prefix"></i>
                                        <input type="email" id="inputValidationEx" name="email" class="form-control validate">
                                        <label for="inputValidationEx" data-error="wrong" data-success="right">Type your email</label>
                                </div>
                                <div class="md-form">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" id="inputValidationEx3" name="password" class="form-control validate">
                                        <label for="inputValidationEx3" data-error="wrong" data-success="right">Type your password</label>
                                </div>

                                <div class="md-form">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" id="inputValidationEx4" name="password_confirmation" class="form-control validate">
                                        <label for="inputValidationEx4" data-error="wrong" data-success="right">Type your Comfirm password</label>
                                </div>
                                <input type="hidden" name="userlevel" value="main">
                                <input type="hidden" name="department_id" value="0">
                                <input type="hidden" name="adminstatus" value="1">
                                <div class="text-center">
                                    <button type="submit" class="btn waves-effect waves-light" id="btncolor">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
        </div>
    </div>

@endsection

