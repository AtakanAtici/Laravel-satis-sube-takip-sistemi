<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kurulum Tamamlandı | Optima Şube ve Satış Takip Sistemi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>
   <div class="container">
       <div class="row welcome shadow">
           <div class="col">
               <img class="" src="{{asset('img/icons/balloons.png')}}" alt="Kurulum Tamamlandı">
           </div>
           <div class="col">
                    <div class="row">
                        <div class="col">
                            <h1 class="head-text">Herşey Hazır!</h1>
                        </div>
                        <div class="col">
                            <!-- <img class="setup-logo img-fluid" src="{{asset('img/rocket.png')}}" alt=""> !-->
                        </div>
                    </div>
                    <p class="text-capitalize welcome-text">Tebrikler artık Optima'yı kullanmaya hazırsınız. "Kurulumu Bitir" diyerek kullanmaya başlayabilirsiniz. Kurulum ekranında yaptığınız tüm ayarlamaları ayarlar kısmında da yapabilirsiniz.</p>


                   <div class="row">
                       <div class="col">
                           <label for="kullanimkosullari">
                               
                               Daha Fazla bilgi için
                               <a href="http://atakanatici.online"><i>optima.com</i></a>'u ziyaret edin.
                           </label>
                       </div>
                   </div>
                   <div class="btn-start-setup">
                       <a href="{{ route('hompage') }}"><button id="start-setup" class="btn btn-primary btn-start-setup" >Kurulumu Bitir</button></a>
                   </div>

           </div>
       </div>
   </div>

   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>

  
</body>
</html>
