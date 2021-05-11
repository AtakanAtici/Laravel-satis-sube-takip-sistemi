<?php

use Illuminate\Support\Facades\Auth;


$user = Auth::user();

$role = $user->author_no;

/* 
Rol numaraları:
1: Yönetici,
2: Saha personeli
*/

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Optima Şube ve Satış Takip Sistemi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img width="120px" height="40px" src="{{ asset('img/logo.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon no-border "><img src="{{ asset('img/icons/menu-white.png') }}" alt="toggle"></span>
    </button>
    <div class="collapse navbar-collapse settings" id="navbarSupportedContent">
     
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Ara.." aria-label="Search">
        <button class="btn btn-outline-danger no-border" type="submit"><img src="{{ asset('img/icons/logout.png') }}" alt="Çıkış Yap"></button>
      </form>
    </div>
  </div>
</nav>
<?php
  if ($role == 1)
  { ?>
    @yield('contentformanager')
<?php  }
  else if ($role == 2)
  { ?>
@yield('contentforstaff')
 <?php }
 ?>




<footer class="footer">
 
</footer>
   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>

   
</body>
</html>
