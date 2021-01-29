<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="{{route('home')}}">
    <img src="https://scontent.fdac5-1.fna.fbcdn.net/v/t1.15752-9/92449805_268524210824916_5326400543923372032_n.png?_nc_cat=101&_nc_sid=b96e70&_nc_eui2=AeGxIpyfPwzSekqFx6P41q8cQhdiUGPZQtNCF2JQY9lC05siD9dN8ntDmGATYjrqAenlmL-8KRoP4RbxAADkfuyk&_nc_ohc=n5XQU74MhVAAX_9mi6y&_nc_ht=scontent.fdac5-1.fna&oh=c7cdd32f17dcab97ae8ff7048107cbb2&oe=5EB3BAEC" height="50" class="d-inline-block align-top"
      alt="EWUCoPC logo"><b> East West University Computer Programming club </b><br>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">

    <ul class="navbar-nav ml-auto nav-flex-icons">

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home')}}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('about')}}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/register')}}">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('recruitmenthomepage')}}">Recruitment</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="{{route('adminlogin')}}">Admin Log In</a>
          <a class="dropdown-item" href="{{route('homelogin')}}">Sign In</a>
          <a class="dropdown-item" href="{{url('/register')}}">Sign Up</a>
          <a class="dropdown-item" href="{{route('homelogin')}}">My Profile</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
