<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kullanıcı Bilgileri | Optima Şube ve Satış Takip Sistemi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>
   <div class="container welcome shadow">
       <div class="text-center setup-header">
         <img class="rounded" src="{{asset('img/icons/man.png')}}">
         <h2>Kullanıcı Bilgileri</h2>
         <p>"Bu sizin ilk yönetici kullanıcınız, kurulumu tamamladıktan sonra bu bilgileri düzenleyebilir veya yenisini ekleyebilirsiniz."</p>
       </div>
       <form method="POST" action="{{ route('setup.addFirstManager') }}">
       {{ csrf_field() }}
       
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">Ad Soyad:</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Örn:Ahmet Yılmaz">
          </div>
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">E Posta Adresi:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Örn:birisi@ornek.com">
          </div>
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">Telefon Numarası:</label>
            <input type="tel" name="tel_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="(+90) 0">
          </div>
          <div class="form-group form-eleman">
            <label for="exampleInputPassword1">Şifre:</label>
            <input type="password" required name="password" class="form-control" id="exampleInputPassword1" placeholder="Şifrenizi Girin">
          </div>
          <input type="submit" name="saveFirstManager" class="btn btn-primary form-eleman form-button" value="Devam"></input>
        </form>
       
   </div>

   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>

   
</body>
</html>
