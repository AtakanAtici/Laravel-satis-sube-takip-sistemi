<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuruluma Başla | Optima Şube ve Satış Takip Sistemi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>
   <div class="container">
       <div class="row welcome shadow">
           <div class="col">
               <img class="" src="{{asset('img/automation.png')}}" alt="Hoşgeldiniz">
           </div>
           <div class="col">
                    <div class="row">
                        <div class="col">
                            <h1 class="head-text">HOŞGELDİNİZ!</h1>
                        </div>
                        <div class="col">
                            <!-- <img class="setup-logo img-fluid" src="{{asset('img/rocket.png')}}" alt=""> !-->
                        </div>
                    </div>
                    <p class="text-capitalize welcome-text">Optima, müşterileriniz, saha personelleriniz ve şubeleriniz arasındaki bağı
                    güçlendirir. Şube ziyaretlerinizi ve satışlarını kayıt altına alarak firmanızın
                    minimum maliyet ile optimum kazanç yönetimi yapmasını sağlar. Personellerinizin birbirleri
                    arasındaki iletişimi güçlendirir.</p>


                   <div class="row">
                       <div class="col">
                           <label for="kullanimkosullari">
                               <input id="kullanimkosullari" type="checkbox"/>
                               <a href="#"><i>Kullanım Koşulları</i></a>'nı okudum ve kabul ediyorum.
                           </label>
                       </div>
                   </div>
                   <div class="btn-start-setup">
                       <a href="{{ route('show.setup.addFirstManager') }}"><button id="start-setup" class="btn btn-primary btn-start-setup" disabled>Kuruluma Başla</button></a>
                   </div>

           </div>
       </div>
   </div>

   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>

   <script>
       $(document).ready(function () {
           $('#kullanimkosullari').click(function () {
               $('#start-setup').prop("disabled", !$("#kullanimkosullari").prop("checked"));
           })
       });
   </script>
</body>
</html>
