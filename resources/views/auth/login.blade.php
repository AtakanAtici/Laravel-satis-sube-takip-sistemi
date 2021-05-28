<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giriş Yap | Optima Şube ve Satış Takip Sistemi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('sweetAlert/sweetalert2.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--
    <style>
      html,
body {
  height: 100%;
}

body {
  /*display: flex; */
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-image: url('{{asset('img/background-setup.png')}}');
}
    </style>
-->
<style>
    body{
      background: rgb(0,22,66);
background: linear-gradient(90deg, rgba(0,22,66,1) 0%, rgba(0,46,138,1) 100%);
    }
</style>
</head>
<body >
@include('sweetalert::alert')


<div class="loginpage row">
    <div class="col-md-6">
        <img class="loginpageImg"  height="100%" src="{{asset('img/logo.png')}}">
        <span class="login-image-alt">
            <p>
            Daha fazla bilgi almak için <a href="#">optima.com</a>'u ziyaret edin. <br>
            </p>
        </span>
    </div>
    <div class="loginpageContent col-md-6">
         <main class="form-signin shadow">
     <form method="POST" id="formLogin" action="{{ route('login') }}">
     @csrf
       <h1 class="h2 mb-3 fw-normal login-header-text">Giriş Yap</h1>
        <div class="form-floating">
        <input name="email" type="email" class="form-control" id="email" placeholder="E-posta adresiniz" >
       <label  for="floatingPassword">E posta</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Şifreniz">
          <label  for="floatingPassword">Şifre</label>
        </div>
        
         <div style="margin-bottom: 10px" class="form-check">
              <input class="form-check-input" name="remember" type="checkbox" id="flexCheckDefault">
              <label style="float:left; color: #fff;" class="form-check-label" for="flexCheckDefault">
               Beni hatırla
              </label>
          </div>
        
        <input type="button" id="btnLogin" class="w-100 btn btn-lg btn-primary" value="Giriş Yap"></input>

     </form>
   </main>
    </div>
</div>




  <!-- 
    
  -->

   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>
   <script src="{{asset('sweetAlert/sweetalert2.js')}}" defer></script>
   <script>
       $('#btnLogin').click(function () {
           let email = document.querySelector('#email').value;
           let password = document.querySelector('#password').value;
           if (email.trim() == '')
           {
               Swal.fire({
                   icon: 'error',
                   title: 'Hata',
                   text: 'E posta alanı boş bırakılamaz'
               })
           }
         
           else if(!emailControl(email))
           {
               Swal.fire({
                   icon: 'error',
                   title: 'Hata',
                   text: 'Geçerli bir e posta adresi girin'
               })
           }
           else if (password.trim() == '')
           {
               Swal.fire({
                   icon: 'error',
                   title: 'Hata',
                   text: 'Şifre alanı boş bırakılamaz'
               })
           }
           else
           {
               $('#formLogin').submit();
           }
       });

       function emailControl(email)
       {
           var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
           return regex.test(email);
       }
   </script>


</body>
</html>
