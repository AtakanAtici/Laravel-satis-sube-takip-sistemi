<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Firma Bilgileri | Optima Şube ve Satış Takip Sistemi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>
<body>
   <div class="container welcome shadow">
       <div class="text-center setup-header">
         <img width="64px" class="rounded" src="{{asset('img/icons/background.png')}}">
         <h2>Firma Bilgileri</h2>
         <p>"Bu kısımda firmanız ile ilgili istenen bilgileri girmeniz gerekiyor. Bu bilgileri daha sonra düzenleyebilirsiniz."</p>
       </div>
       <form method="POST" action="{{ route('setup.addCompany') }}">
       {{ csrf_field() }}
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">Fırma Adı:</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Örn:Yılmaz İnşaat A.Ş">
          </div>
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">Sektör:</label>
            <input type="text" name="sector" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Yapı Malzemeleri">
          </div>
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">E Posta Adresi:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Örn:birisi@yilmazinsaat.com">
          </div>
          <div class="form-group form-eleman">
            <label for="exampleInputEmail1">Telefon Numarası:</label>
            <input type="text" name="tel_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="(+90) ">
          </div>

          <input type="submit" name="saveCompany" class="btn btn-primary form-eleman form-button" value="Devam"></input>
          
        </form>
        
       
   </div>

   <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
   <script src="{{asset('js/app.js')}}" defer></script>

   
</body>
</html>
