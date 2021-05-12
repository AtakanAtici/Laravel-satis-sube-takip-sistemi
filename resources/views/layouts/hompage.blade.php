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
@include('layouts.header')
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


<!--
<footer class="footer">
 
</footer>
-->
   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>

   
</body>
</html>
