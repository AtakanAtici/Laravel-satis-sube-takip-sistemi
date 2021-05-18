@extends('layouts.manage')

@section('title')
	İncele
@endsection

@section('css')
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
@endsection 

@section('content')


		<div class="invoice-box mt-4">
			<table>
				<tr class="top">
					<td colspan="5">
						<table>
							<tr>
								<td class="title">
									
									<img src="{{asset('img/visit/'.$visit->image)}}" alt="Ziyaret Resmi" style="width: 100%; max-width: 300px" />
								</td>
								<p style="text-align: center;">	Fotoğraf / Kayıt edilen lokasyon</p>
								<td>

									<div id="harita">
										
									</div>

									 <br />
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="5">
						<table>
							<tr>
								<td>
									
								</td>
								{{ $personel->name }}  -  {{$branch->name}}
								<td>
								
								Planlanan Tarih:	{{$visit->visit_date}} <br>
								Ziyaret Tarihi: 	{{ $visit->updated_at }} <br>
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

			

				<tr class="heading ">
					<td>Açıklama</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr class="item">
					<td>
							<p>{{$visit->description}}</p>
						
					</td>
				</tr>

			</table>
			<input type="hidden" id="enlem" name="enlem" value="{{ $visit->latitude }}">
			<input type="hidden" id="boylam" name="boylam" value="{{ $visit->longitude }}">
		</div>
@endsection

@section('js')
	  
<script src="https://maps.google.com/maps/api/js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWSpUZJzzOt8nfCsA7bewYE5ApFogS-Fs&callback=initMap"
  type="text/javascript"></script>
<script>
  function konumuGetir() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(konumuGoster, hataGoster);
    } else {
      document.write("Tarayıcınız Geolocation API desteklemiyor.");
    }
  }

  function konumuGoster(konum) {
    enlem = document.getElementById('enlem').value;
    boylam = document.getElementById('boylam').value;
    latlon = new google.maps.LatLng(enlem, boylam)
    harita = document.getElementById('harita')
    harita.style.height = '260px';
    harita.style.width = '350px';

    var secenekler = {
      center: latlon, zoom: 14,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL }
    }

    var map = new google.maps.Map(harita, secenekler);
    var marker = new google.maps.Marker({ position: latlon, map: map, title: "Buradasınız!" });
  }

  function hataGoster(hata) {
    document.write(hata.message);
  }

  konumuGetir();
</script>
@endsection