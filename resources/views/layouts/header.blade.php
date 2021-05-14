@include('sweetalert::alert')
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('hompage') }}"><img width="120px" height="40px" src="{{ asset('img/logo.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon no-border "><img src="{{ asset('img/icons/menu-white.png') }}" alt="toggle"></span>
    </button>
    <div class="collapse navbar-collapse settings" id="navbarSupportedContent">
     
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Ara.." aria-label="Search">
        <a href="{{ route('logout') }}">
        <button class="btn btn-outline-danger no-border" type="button"><img src="{{ asset('img/icons/logout.png') }}" alt="Çıkış Yap"></button></a>
      </form>
    </div>
  </div>
</nav>