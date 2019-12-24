
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
            <a class="navbar-brand" href="#">{{Auth::user()->name}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{url('normal/inbox')}}">ဝင်စာ<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('normal/outbox')}}">ထွက်စာ</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="{{url('/logout')}}">ထွက်ရန်</a>
                </li>
              </ul>

            </div>
        </div>
          </nav>

       