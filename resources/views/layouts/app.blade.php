<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>EWUCoPC</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('public/face/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('public/face/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('public/face/css/style.css')}}" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="{{route('home')}}">
    <img src="https://scontent.fdac5-1.fna.fbcdn.net/v/t1.15752-9/92449805_268524210824916_5326400543923372032_n.png?_nc_cat=101&_nc_sid=b96e70&_nc_eui2=AeGxIpyfPwzSekqFx6P41q8cQhdiUGPZQtNCF2JQY9lC05siD9dN8ntDmGATYjrqAenlmL-8KRoP4RbxAADkfuyk&_nc_ohc=n5XQU74MhVAAX_9mi6y&_nc_ht=scontent.fdac5-1.fna&oh=c7cdd32f17dcab97ae8ff7048107cbb2&oe=5EB3BAEC" height="50" class="d-inline-block align-top"
      alt="EWUCoPC logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">

    <ul class="navbar-nav ml-auto nav-flex-icons">

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('homelogin')}}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest




    </ul>
  </div>
</nav>


<body>


                    @yield('content')
                    @include('layouts.footer')
                    <script type="text/javascript" src="{{ asset('public/face/js/jquery-3.4.1.min.js')}}"></script>
                    <!-- Bootstrap tooltips -->
                    <script type="text/javascript" src="{{ asset('public/face/js/popper.min.js')}}"></script>
                    <!-- Bootstrap core JavaScript -->
                    <script type="text/javascript" src="{{ asset('public/face/js/bootstrap.min.js')}}"></script>
                    <!-- MDB core JavaScript -->
                    <script type="text/javascript" src="{{ asset('public/face/js/mdb.min.js')}}"></script>
</body>
</html>
