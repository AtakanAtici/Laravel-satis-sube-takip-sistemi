<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('sweetAlert/sweetalert2.css')}}">
    @yield('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>

@include('layouts.header')
	<div class="container headline">
		<h2 style="position: relative;" class="headline-text pt-2">
			@yield('headLine')
		</h2>
	</div>

  
  <div class="container">
    <div class="layoutHead"></div>
    @yield('content')
    <!-- 
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form">
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Hücre adı:</span>
                <input class="form-control" type="text" name="">
              </div>
              <div class="col-md-6 form-group">
                <span>Hücre adı:</span>
                <input  class="form-control" type="text" name="">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Hücre adı:</span>
                <input class="form-control" type="text" name="">
              </div>
              <div class="col-md-6 form-group">
                <span>Hücre adı:</span>
                <input  class="form-control" type="text" name="">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Hücre adı:</span>
                <input  class="form-control" type="text" name="">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Hücre adı:</span>
                <input class="form-control" type="text" name="">
              </div>
              <div class="col-md-6 form-group">
                <span>Opinion:</span>
                <select class="form-control">
                  <option selected>Seçenek</option>
                  <option>...</option>
                </select>
              </div>
            </div>
            <div class="row hucregrup">
             
              <div class="col-md-12 form-group">
                <span>TextArea:</span>
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
        </form>
      </div>
      <div class="layoutFotter">
      <button class="btn btn-success btnFooter"><img src="{{ asset('img/icons/save.png') }}"> <span class="btnFooterText">Kaydet</span> </button>
      <button class="btn btn-danger btnFooter"><img src="{{ asset('img/icons/cancel.png') }}"><span class="btnFooterText">İptal</span></button>
    </div>
    -->
    </div>
    


<!--
<footer class="footer">
 
</footer>
-->
   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>
   <script src="{{asset('sweetAlert/sweetalert2.js')}}" defer></script>
   @yield('js')

   
</body>
</html>