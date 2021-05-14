@extends('layouts.edit')

@section('title')
Düzenle - {{ $personnel->name }}
@endsection

@section('css')
@endsection

@section('headLine')
Düzenle - {{ $personnel->name }}
@endsection

@section('content')

    	
   <div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('edit.personnel') }}" id="formPersonnel">
        	@csrf
        	<input type="hidden" name="id" value="{{ $personnel->id }}">
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Ad soyad:</span>
                <input name="name" id="personnelName" class="form-control" type="text" value="{{ $personnel->name }}">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Telefon numarası:</span>
                <input name="tel_no" id="telNo" class="form-control" type="text" value="{{ $personnel->tel_no }}">
              </div>
              <div class="col-md-6 form-group">
                <span>E posta:</span>
                <input name="email" id="email" class="form-control" type="text" value="{{ $personnel->email }}">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Sicil Numarası:</span>
                <input name="sicil_no" id="sicil_no" class="form-control" type="text" value="{{ $personnel->sicil_no }}">
              </div>

              <div class="col-md-6 form-group">
                <span>Yetki:</span>
                <select name="author_no" class="form-control ">
                  <option value="2" 
                  <?php if($personnel->author_no == 2) {echo 'selected';}  ?>
                  >Saha Personeli</option>
                  <option value="1"
                  	<?php if($personnel->author_no == 1) {echo 'selected';}  ?>
                  >Yönetici</option>
                </select>
              </div>
          </div>
              <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Personel No: (örn:PRSNL-01)</span>
                <input name="prsnl_no" id="prsnlNo" class="form-control" type="text" value="{{ $personnel->prsnl_no }}">
              </div>
              <div class="col-md-6 form-group">
                <span>Şifre:</span>
                <input name="password" id="password" class="form-control" type="password" placeholder="************************************" disabled >
                <a style="text-decoration: none; float:right;" id="changePass" href="#">Değiştir</a>
              </div>

            </div>
            <div class="row hucregrup">
             
              <div class="col-md-12 form-group">
                <span>Adres:</span>
                <textarea name="adress" id="adress" class="form-control" rows="3">{{ $personnel->adress }}</textarea>
              </div>
            </div>
        </form>
      </div>
      <div class="layoutFotter">
      <button type="button" id="btnSave" class="btn btn-success btnFooter"><img src="{{ asset('img/icons/save.png') }}"> <span class="btnFooterText">Kaydet</span> </button>
      <button type="button" id="btnCancel" class="btn btn-danger btnFooter"><img src="{{ asset('img/icons/cancel.png') }}"><span class="btnFooterText">İptal</span></button>
    </div>
    </div>
    
  </div>
    
 
@endsection

@section('js')
<script>
	$(document).ready(function () {
           $('#changePass').click(function () {
               $('#password').prop("disabled", !$("#changePass").click);
           })
       });

	 $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr("content")
            }
        });
	 $('#btnSave').click(function (){
	 	let personnelName = document.querySelector('#personnelName').value;
	 	let telNo = document.querySelector('#telNo').value;
	 	let email = document.querySelector('#email').value;
	 	let prsnlNo = document.querySelector('#prsnlNo').value;
	 	let password = document.querySelector('#password').value;

	 	

	 	if (personnelName.trim() == '' )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Ad soyad boş geçilemez.'
               })
	 	}
	 	else if (telNo.trim() == '' )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Telefon numarası boş geçilemez.'
               })
	 	}

	 	else if (email.trim() == '' )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'E posta boş geçilemez.'
               })
	 	}
	 	else if (prsnlNo.trim() == '' )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Personel numarası boş geçilemez.'
               })
	 	}
	 	else if (prsnlNo.trim() == 'PRSNL-' )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Geçerli bir personel numarası girin.'
               })
	 	}
	 	else if (!password.trim() == '' )
	 	{
	 		 if (password.length < 8 )
	 		{
		 		Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'Şifre en az 8 karakter olmalı.'
	            }) 
		 	}
		 	else{
	 		$('#formPersonnel').submit();
	 	}
	 		
	 	}
	 	
	 	
	 	else{
	 		$('#formPersonnel').submit();
	 	}

	 	
	 });
	 $('#btnCancel').click(function () {
            Swal.fire({
                title: "Emin Misiniz?",
                text:" Yaptığınız Değişiklikler kaybolacak",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<a class="text-white" style="text-decoration:none" href="{{ route('show.personnelList') }}">Evet</a> ',
                cancelButtonText: 'Hayır'
            })
        });

</script>
@endsection