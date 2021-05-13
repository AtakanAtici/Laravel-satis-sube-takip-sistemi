<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>

@include('layouts.header')
	<div class="container headline mt-1">
		<h2 class="headline-text">
			@yield('headLine')
		</h2>
		
			@yield('btnValue') 
		
	</div>
  @yield('content')


<!-- Örnek
<div class="container tablo table-responsive">
  <table class="table">
  <thead class="thead t-head">
    <tr>
      <th scope="col" class="t-head-item">#</th>
      <th scope="col" class="t-head-item">Sutun</th>
      <th scope="col" class="t-head-item">Sutun</th>
      <th scope="col" class="t-head-item">Sutun</th>
      <th scope="col" class="t-head-item">Sutun</th>
      <th scope="col" class="t-head-item">Düzenle</th>
      <th scope="col" class="t-head-item">Sil</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
   
  </tbody>
</table>
</div>
-->

<!--
<footer class="footer">
 
</footer>
-->
   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>
   @yield('js')

   
</body>
</html>