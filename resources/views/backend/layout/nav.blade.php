
<nav class="navbar navbar-expand-lg navbar-light" id="navcolor">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#" id="navcomputer">{{Auth::user()->name}}</a>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                <a class="nav-link " href="{{url('admin/inbox')}}" id="textnav">ဝင်စာ</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link " href="{{url('admin/outbox')}}" id="textnav">ထွက်စာ</a>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="textnav" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ထည့်သွင်းရန်
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('admin/department')}}" >ဌာနထည့်ရန်</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{url('admin/create/Account')}}">အကောင့်ထည့်ရန်</a>

                        </div>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="textnav" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         လုပ်ဆောင်ချက်
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('admin/create/inbox')}}">ဝင်စာသတ်မှတ်ရန်</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{url('admin/feedback')}}">ထွက်စာသတ်မှတ်ရန်</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{url('admin/account/show')}}" >သုံးစွဲသူအကောင့်များ</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{url('admin/unioutbox/show')}}" >မိမိကျောင်းမှထွက်စာ</a>
                        </div>
                </li>
                <li class="nav-item">
                        <a class="nav-link " href="{{url('/logout')}}" id="textnav">ထွက်ရန်</a>
                </li>
            </ul>

        </div>
    </div>
    </nav>

