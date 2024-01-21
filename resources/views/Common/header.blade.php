<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <img src="{{URL::asset('images/logo.png')}}" alt="logo" width="20%"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link home" aria-current="page" href="{{route('dashboard')}}">Home</a>
          <a class="nav-link search" href="{{route('search')}}">Search</a>
        </div>
      </div>
    </div>
  </nav>
