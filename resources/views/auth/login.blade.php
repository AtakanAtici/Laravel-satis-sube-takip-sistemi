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

</head>
<body class="text-center">
@include('sweetalert::alert')
   <main class="form-signin shadow">
     <form method="POST" id="formLogin" action="{{ route('login') }}">
     @csrf
       <img width="64" src="{{asset('img/rocket.png')}}">
       <h1 class="h3 mb-3 fw-normal login-header-text">Giriş Yap</h1>
        <div class="form-floating">
        <input name="email" type="email" class="form-control" id="email" placeholder="E-posta adresiniz" >
       <label  for="floatingPassword">E posta</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Şifreniz">
          <label  for="floatingPassword">Şifre</label>
        </div>
        <input type="button" id="btnLogin" class="w-100 btn btn-lg btn-primary" value="Giriş Yap"></input>

     </form>
   </main>

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
