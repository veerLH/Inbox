@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('content')

<div class="container">

    <div class="row d-flex justify-content-center" id="department">
        <div class="col-md-8 col-sm-4 col-xs-8 " >
                {{-- <div class="d-flex justify-content-center">

                </div> --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title myanmar" id="exampleModalLabel">စာရေးသွင်းရန်</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('admin/department')}}" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-university" style="color:#CC0000;font-size: 2em"></i></span>
                                                </div>
                                                <input type="text" name="name" class="form-control myanmar"  placeholder="အမည်" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-briefcase" style="color:#0d47a1;font-size: 2em"></i></span>
                                            </div>
                                            &nbsp;&nbsp;
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="department_type" id="inlineRadio1" value="w" required>
                                            <label class="form-check-label myanmar" for="inlineRadio1">ရေး/ဖတ်</label>
                                          </div>
                                          &nbsp;&nbsp;
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="department_type" id="inlineRadio2" value="r" required>
                                            <label class="form-check-label myanmar" for="inlineRadio2">ဖတ်</label>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                          </div>
                          <div class="modal-footer">
                                <button type="submit" class="btn btn-primary myanmar">ထည့်မည်</button>
                                <button type="button" class="btn btn-secondary myanmar" data-dismiss="modal">မလုပ်ပါ</button>
                           </div>
                            </form>
                            <br>
                        </div>
                        </div>
                      </div>
                </div>
                </div>
            </div>
            <br>
            <br>
    <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-4 col-xs-8 " >
            <div class="card">
                    <div class="card-header">
                            <button type="button" class="btn btn-primary myanmar" data-toggle="modal" data-target="#exampleModal">ထည့်ရန်</button>
                          </div>
                    <div class="card-body">

        <div class="table-responsive table-hover">
            <table class="table">
                        <thead>
                            <tr class="table-primary">

                            <th scope="col" class="tabletext myanmar">အမည်</th>
                            <th></th>
                            <th scope="col" class="tabletext myanmar">လုပ်ဆောင်ချက်</th>
                            <th></th>
                            <th scope="col" class="tabletext myanmar">ပြင်ဆင်ရန်</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department as $deptment)


                            <tr>
                            <td class="tabletext myanmar3" colspan="2">{!! zawuni($deptment->name) !!}</td>
                            <td class="tabletext myanmar" colspan="2">
                                @if ($deptment->department_type =='w')
                                                 ရေး/ဖတ်
                                @else
                                   ဖတ်ရန်
                                @endif

                            </td>
                            <td><i class="far fa-edit" style="font-size:2em;color:#0d47a1" data-toggle="modal"  data-target="#sem-login{{$deptment->id}}"></i>&nbsp;&nbsp;&nbsp;
                                @if ($deptment->id!=1)
                                <a href="{{url('/admin/dashboard/'.$deptment->id.'/delete')}}"><i class="far fa-trash-alt" style="font-size:2em;color:#CC0000"></i></a>
                                @endif
                               </td>
                            </tr>


                        <form class="seminor-login-form" action="{{url('admin/dashboard/'.$deptment->id.'/edit')}}" method="POST">
                                    <!-- The Modal -->
                            <div class="modal fade seminor-login-modal" data-backdrop="static" id="sem-login{{$deptment->id}}">
                                      <div class="modal-dialog ">
                                        <div class="modal-content">


                                          <!-- Modal body -->
                                          <div class="modal-body seminor-login-modal-body">
                                           <h5 class="modal-title text-center" id="dept_label">ဌာနသတ်မှတ်ရန်နှင့်ညွှန်ကြားချက်ပေးရန်</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                            </button>

                                            @csrf

                                            <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-university" style="color:#CC0000;font-size: 2em"></i></span>
                                                    </div>
                                                <input type="text" name="name" class="form-control myanmar" placeholder="အမည်" aria-label="Username" aria-describedby="basic-addon1" value="{{$deptment->name}}" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-briefcase" style="color:#0d47a1;font-size: 2em"></i></span>
                                                </div>
                                                &nbsp;&nbsp;
                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="department_type" id="inlineRadio1" value="w"
                                                        @if ($deptment->department_type=='w')
                                                        checked
                                                        @endif

                                                        required>
                                                        <label class="form-check-label myanmar" for="inlineRadio1">ရေး/ဖတ်</label>
                                                      </div>
                                                      &nbsp;&nbsp;
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="department_type" id="inlineRadio2" value="r"
                                                        @if ($deptment->department_type=='r')
                                                        checked
                                                        @endif
                                                        required>
                                                        <label class="form-check-label myanmar" for="inlineRadio2">ဖတ်</label>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">ပြောင်းလဲမည်</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">မလုပ်ပါ</button>
                                                       </div>
                                                </div>
                                            </div>
                                      </div>

                                      </div>


                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </form>


                            @endforeach
                        </tbody>
            </table>
        </div>

    </div>


            </div>

    </div>
</div>
{{-- for edit --}}


{{--  end for edit --}}
@endsection

@section('script')
@if (session('ok'))

<script>
swal({
    title: "အောင်မြင်စွာ",
    text: "တစ်ခုတိုးပြီးပါပြီ",
    icon: "success",
    button: "ဆက်လုပ်ရန်",
    })

</script>

@endif

@if (session('update'))

<script>
swal({
    title: "အောင်မြင်စွာ",
    text: "တစ်ခုတိုးပြင်ပါပြီ",
    icon: "success",
    button: "ဆက်လုပ်ရန်",
    })

</script>

@endif
@if (session('delete'))

<script>
swal({
    title:"အောင်မြင်စွာ",
    text: "ဖျက်ပြီးပါပြီ",
    icon: "success",
    button: "ဆက်လုပ်ရန်",
    })

</script>

@endif
@endsection
