@extends('layouts.add')

@section('title')
	Yeni Şube Ekle
@endsection

@section('css')
@endsection

@section('headLine')
	Yeni Şube Ekle
@endsection

@section('content')
<div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('add.branch') }}" id="formBranch">
        	@csrf
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Şube ismi:</span>
                <input name="name" id="branchName" class="form-control" type="text">
              </div>
              <div class="col-md-6 form-group">
                <span>Yetkili ad soyad:</span>
                <input name="author_name" id="authorName" class="form-control" type="text" >
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Şube telefon:</span>
                <input name="tel_no" id="telNo" class="form-control" type="text">
              </div>
              <div class="col-md-6 form-group">
                <span>yetkili telefon:</span>
                <input name="author_tel" id="authorTel" class="form-control" type="text">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>E-posta:</span>
                <input name="email" id="email" class="form-control" type="text">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Hizmet başlangıç tarihi:</span>
                <input name="start_date" id="startDate" class="form-control" type="date" >
              </div>
              <div class="col-md-6 form-group">
                <span>Şube numarası:</span>
                <input style="background:lightgray;" id="branchNo" name="branch_no" class="form-control" type="text" value="{{ $branchNo }}" >
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

	$('#btnSave').click(function () {
           let branchName = document.querySelector('#branchName').value;
           let authorName = document.querySelector('#authorName').value;
           let telNo = document.querySelector('#telNo').value;
           let authorTel = document.querySelector('#authorTel').value;
           let email = document.querySelector('#email').value;
           let startDate = document.querySelector('#startDate').value;
           let branchNo = document.querySelector('#branchNo').value;
           let adress = document.querySelector('#adress').value;

           if (branchName.trim() == '')
           {
               Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Şube ismi boş geçilemez.'
               })
           }
           else if(authorName.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'Yetkili ad soyad boş geçilemez.'
	               })
           }
           else if(telNo.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'Firma telefon numarası boş geçilemez.'
	               })
           }
            else if(authorTel.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'Yetkili telefon numarası boş geçilemez.'
	               })
           }
            else if(email.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'e posta kısmı boş geçilemez.'
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
            else if(startDate.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'başlangıç tarihi boş geçilemez.'
	               })
           }
            else if(branchNo.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'Şube numarası boş geçilemez.'
	               })
           }
            else if(adress.trim() == '')
           {
	           	 Swal.fire({
	                   icon: 'error',
	                   title: 'Hata!',
	                   text: 'adres kısmı boş geçilemez.'
	               })
           }

            
           else
           {
               $('#formBranch').submit();
           }

           function emailControl(email)
       		{
           var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
           return regex.test(email);
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
                confirmButtonText: '<a class="text-white" style="text-decoration:none" href="{{ route('show.branchList') }}">Evet</a> ',
                cancelButtonText: 'Hayır'
            })
        });
</script>
@endsection

