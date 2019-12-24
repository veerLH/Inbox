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
                              <h5 class="modal-title" id="exampleModalLabel">ဌာနပြင်ဆင်ရန်</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('admin/dashboard')}}" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-university" style="color:#CC0000;font-size: 2em"></i></span>
                                                </div>
                                                <input type="text" name="name" class="form-control" placeholder="အမည်" aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-briefcase" style="color:#0d47a1;font-size: 2em"></i></span>
                                            </div>
                                            &nbsp;&nbsp;
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="department_type" id="inlineRadio1" value="w" required>
                                            <label class="form-check-label" for="inlineRadio1">ရေး/ဖတ်</label>
                                          </div>
                                          &nbsp;&nbsp;
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="department_type" id="inlineRadio2" value="r" required>
                                            <label class="form-check-label" for="inlineRadio2">ဖတ်</label>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                          </div>
                          <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ထည့်မည်</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">မလုပ်ပါ</button>
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
                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">ထည့်ရန်</button>
                    </div>
                    <div class="card-body">

        <div class="table-responsive-sm table-hover">
            <table class="table">
                        <thead>
                            <tr class="table-primary">
                            <th scope="col" class="tabletext">အမည်</th>
                            <th></th>
                            <th scope="col" class="tabletext">လုပ်ဆောင်ချက်</th>
                            <th></th>
                            <th scope="col" class="tabletext">ပြင်ဆင်ရန်</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department as $deptment)


                            <tr>
                            <td class="tabletext" colspan="2">{{$deptment->name}}</td>
                            <td class="tabletext" colspan="2">
                                @if ($deptment->department_type =='w')
                                                 ရေး/ဖတ်
                                @else
                                    ဖတ်
                                @endif

                            </td>
                            <td><a href="{{url('/admin/dashboard/'.$deptment->id.'/edit')}}"><i class="far fa-edit" style="font-size:2em;color:#0d47a1"></i></a>&nbsp;&nbsp;&nbsp;<a href="{{url('/admin/dashboard/'.$deptment->id.'/delete')}}"><i class="far fa-trash-alt" style="font-size:2em;color:#CC0000"></i></a></td>
                            </tr>
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




<div class="modal fade" id="myModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ဌာနပြင်ဆင်ရန်</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{url('/admin/dashboard/'.$deptment->id.'/edit')}}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-university" style="color:#CC0000;font-size: 2em"></i></span>
                                </div>
                            <input type="text" name="name" class="form-control myanmar" placeholder="အမည်" aria-label="Username" aria-describedby="basic-addon1" value="{{$departmentedit->name}}" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-briefcase" style="color:#0d47a1;font-size: 2em"></i></span>
                            </div>
                            &nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="department_type" id="inlineRadio1" value="w"
                            @if ($departmentedit->department_type=='w')
                            checked
                            @endif

                            required>
                            <label class="form-check-label myanmar" for="inlineRadio1">ရေး/ဖတ်</label>
                          </div>
                          &nbsp;&nbsp;
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="department_type" id="inlineRadio2" value="r"
                            @if ($departmentedit->department_type=='r')
                            checked
                            @endif
                            required>
                            <label class="form-check-label myanmar" for="inlineRadio2">ဖတ်</label>
                          </div>
                        </div>
                    </div>
                </div>

          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ပြောင်းလဲမည်</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">မလုပ်ပါ</button>
           </div>
            </form>
            <br>
        </div>
        </div>
      </div>
</div>

      @endsection
      @section('script')
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModel').modal('show');
    });
</script>

@if (session('ok'))

<script>
swal({
    title: "အောင်မြင်စွာ",
    text: "ထပ်တိုးပြီးပါပြီ",
    icon: "success",
    button: "ဆက်လုပ်ရန်",
    })

</script>

@endif


@endsection


