@extends('layouts.add')

@section('title')
Yeni Kullanıcı Ekle
@endsection

@section('headLine')
Kullanıcı Ekle
@endsection

@section('content')
<div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('add.personnel') }}" id="formPersonnel">
        	@csrf
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Ad soyad:</span>
                <input name="name" id="personnelName" class="form-control" type="text">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Telefon numarası:</span>
                <input name="tel_no" id="telNo" class="form-control" type="text">
              </div>
              <div class="col-md-6 form-group">
                <span>E posta:</span>
                <input name="email" id="email" class="form-control" type="text">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Sicil Numarası:</span>
                <input name="sicil_no" id="sicil_no" class="form-control" type="text">
              </div>
              <div class="col-md-6 form-group">
                <span>Yetki:</span>
                <select name="author_no" class="form-control ">
                  <option value="2" selected>Saha Personeli</option>
                  <option value="1">Yönetici</option>
                </select>
              </div>
          </div>
              <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Personel No: (örn:PRSNL-01)</span>
                <input name="prsnl_no" id="prsnlNo" class="form-control" type="text" value="PRSNL-">
              </div>
              <div class="col-md-6 form-group">
                <span>Şifre:</span>
                <input name="password" id="password" class="form-control" type="password" >
              </div>

            </div>
            <div class="row hucregrup">
             
              <div class="col-md-12 form-group">
                <span>Adres:</span>
                <textarea name="adress" id="adress" class="form-control" rows="3"></textarea>
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
	 	else if (password.trim() == '' )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Şifre boş geçilemez.'
               })
	 	}
	 	else if (password.length < 8 )
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Şifre en az 8 karakter olmalı.'
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