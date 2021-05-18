@extends('layouts.edit')

@section('title')
	Ziyareti Tamamla
@endsection

@section('headLine')
	Ziyareti Tamamla
@endsection

@section('content')
<div class="container">
    
    <div class="layoutBody">
      <div class="form formAdd">
        <form  class="form" method="POST" action="{{ route('complete.visit') }}" id="formComplete" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $visit->id }}" >
          <input type="hidden" name="enlem" id="enlem" value="" >
          <input type="hidden" name="boylam" id="boylam" value="" >
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Ziyaret edilen şube:</span>
                <span><b>{{$branch->name}}</b></span>
              </div>
            </div>
             <div class=" row hucregrup camera">
              <div  id="my_camera" class="col-md-6 " >
              </div>
              <div class="col-md-6 photo">
                <div id="results">"Fotoğraf çek butonuna tıklayın"</div>
            </div>
              
            </div>
            <br>
            <input type=button value="Fotoğraf Çek" onClick="take_snapshot()">
            <input type=button value="Konum Ekle"  onClick="showPosition()">
              <input type="hidden" name="image" class="image-tag">
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Mesaj:</span>
               <textarea class="form-control" name="description" id="note" rows="10"></textarea>
              </div>
             
            </div>
            
             
           
        </form>
      </div>
      <div class="layoutFotter">
      <button type="button" id="btnSend" class="btn btn-success btnFooter"><img src="{{ asset('img/icons/send.png') }}"> <span class="btnFooterText">Gönder</span> </button>
      <button type="button" id="btnCancel" class="btn btn-danger btnFooter"><img src="{{ asset('img/icons/cancel.png') }}"><span class="btnFooterText">İptal</span></button>
    </div>
    </div>
    
  </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script>
   $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr("content")
            }
        });
   //Location
    
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Tarayıcınız geolocation desteklemiyor";
  }
}

function showPosition(position) {
  document.getElementById("enlem").value = position.coords.latitude;
  document.getElementById("boylam").value = position.coords.longitude;
}
getLocation();


	 Webcam.set({
        width: 455,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90,
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }	



    $('#btnSend').click(function(){
    	$('#formComplete').submit();
    });
</script>
@endsection