@extends('backend.layout.main.mian')
@section('title','AddDepartment')
@section('content')

<div class="container">
    <div class="row mx-auto" id="department">
                        <div class="card border-warning col-md-12">
                            <div class="card-header text-center" id="headertxt"style="font-size: 1.5em;font-weight: bold;color:blue;">မိမိကျောင်းမှ ထွက်သောထွက်စာများ</div>
                            <div class="card-body">
                                    <table class="table table-hover">
                                            <thead >
                                              <tr class="table-info">
                                                <th scope="col">စာထွက်သည့်ဌာနစိတ်</th>
                                                <th scope="col">ဆောင်ရွက်ချက်</th>
                                                <th scope="col">စာဖိုင်</th>
                                                <th scope="col">အပြည့်အစုံ</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($feedbacks as $feedback)
                                              <tr>
                                              <th scope="row">{{$feedback->department->name}}</th>
                                                <td>{{$feedback->content}}</td>
                                                <td>
                                                @foreach (unserialize($feedback->filelink) as $file)
                                                <a href="{{url('admin/unioutbox/'.$feedback->id.'/detail/'.$file)}}">{{$file}}</a> <br>
                                                @endforeach
                                                </td>
                                              <td class="text-danger font-weight-bold"><a href="#" data-toggle="modal" data-target="#exampleModal{{$feedback->id}}"> More --</a></td>
                                              </tr>
                                              <form method="POST" action="{{url('/admin/unioutbox/'.$feedback->id.'/edit')}}">
                                                @csrf
                                              <div class="modal fade" id="exampleModal{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">ခွင့်ပြုချက်နှင့်ညွှန်ကြားချက်ပေးရန်</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <h4 class="card-title">{{$feedback->content}}</h4>
                                                            <br>

                                                            <div class="form-group">

                                                                    <label for="comment">ညွှန်ကြားချက်</label>
                                                                    <textarea class="form-control myanmar" rows="5" id="comment" name="recontent" required>

                                                                    </textarea>
                                                            </div>

                                                            <input type="hidden" name="status" value="1">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Sent</button>
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
@endsection
