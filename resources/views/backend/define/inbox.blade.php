@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('content')

<div class="container">

    <div class="row mx-auto" id="department">
        <div class="col-md-12 mx-auto">
                <div class="card border-warning">
                        <div class="card-header text-center" id="headertxt"style="font-weight:bold;color:blue;">ဌာနသတ်မှတ်ရန်နှင့်ညွှန်ကြားချက် ပေးရန်ကျန်ရှိသည့်၀င်စာများ</div>
                        <div class="card-body">
                                <table class="table table-hover">
                                        <thead >
                                          <tr class="table-info">
                                            <th scope="col">၀င်စာအမှတ်</th>
                                            <th scope="col">ပေးပို့သည့်ဌာန/တက္ကသိုလ်</th>
                                            
                                            <th scope="col">ရရှိသည့်ရက်စွဲ</th>
                                            <th scope="col">အပြည့်အစုံ</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inboxs as $inbox)
                                          <tr>
                                            <th scope="row">{{$inbox->inboxid}}</th>
                                            <td>{{$inbox->senduniversity}}</td>
                                                             
                                            <td>{{$inbox->receive_date}}</td>
                                          <td class="text-danger font-weight-bold"><a href="{{url('admin/create/inbox/'.$inbox->id.'/detail')}}"> More --</a></td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                        </div>
            </div>
        </div>
    </div>


</div>




@endsection
