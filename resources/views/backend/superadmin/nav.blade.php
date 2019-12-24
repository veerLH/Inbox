
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                <a class="navbar-brand" href="#">{{Auth::user()->name}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('super/inbox')}}">ဝင်စာ<span class="sr-only">(current)</span></a>
                    </li>
                   
                   
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="textnav" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             ထွက်စာ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('super/outbox')}}">ထွက်စာ</a>                       
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('super/unioutbox')}}">မိမိကျောင်းထွက်စာ</a>
                                <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('super/outbox/todo')}}">မှတ်ချက်ပေးပြီးသောထွက်စာများ</a>
                            </div>
                    </li>
                    @if ($checkdept=='w')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="textnav" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         ပြန်လည်စစ်ဆေးရန်
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('super/review/inbox')}}">ဝင်စာ&nbsp;&nbsp;<span class="badge badge-info">{{$counts}}</span></a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{url('super/review/outbox')}}">ထွက်စာ</a>
                        </div>
                </li>

                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="textnav" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             ထည့်သွင်းရန်
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{url('super/writeinbox')}}">ဝင်စာထည့်ရန်</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{url('super/writeoutbox')}}">ထွက်စာထည့်ရန်</a>
                            </div>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{url('super/unioutboxes')}}">မိမိထွက်စာထည့်ရန်</a>
                    </li>
                @else
                <li class="nav-item">
                        <a class="nav-link" href="{{url('super/unioutboxes')}}">မိမိထွက်စာထည့်ရန်</a>
                </li>
                @endif

                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">ထွက်ရန်</a>
                    </li>

                  </ul>

                </div>
            </div>
              </nav>

