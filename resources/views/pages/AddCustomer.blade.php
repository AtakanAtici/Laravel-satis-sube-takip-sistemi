@extends('layouts.add')

@section('title')
Yeni Müşteri Ekle
@endsection

@section('headLine')
Müşteri Bilgisi Ekle
@endsection

@section('content')
<div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('add.customer') }}" id="formPersonnel">
          @csrf
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Firma adı:</span>
                <input name="name" id="customerName" class="form-control" type="text">
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
                <span>Müşteri No: (örn:MSTR-01)</span>
                <input name="customer_no" id="customerNo" class="form-control" type="text" value="MSTR-">
              </div>
              <div class="col-md-6 form-group">
                <span>Yetkili ad soyad:</span>
                <input name="owner_name" id="owner_name" class="form-control" type="text">
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
    let customerName = document.querySelector('#customerName').value;
    let telNo = document.querySelector('#telNo').value;
    let email = document.querySelector('#email').value;
    let customerNo = document.querySelector('#customerNo').value;
    let owner_name = document.querySelector('#owner_name').value;

    

    if (customerName.trim() == '' )
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
    else if (customerNo.trim() == '' )
    {
      Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Personel numarası boş geçilemez.'
               })
    }
    else if (customerNo.trim() == 'MSTR-' )
    {
      Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Geçerli bir personel numarası girin.'
               })
    }
    else if (owner_name.trim() == '' )
    {
      Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Yetkili ad soyad kısmı boş geçilemez.'
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
                confirmButtonText: '<a class="text-white" style="text-decoration:none" href="{{ route('show.customer') }}">Evet</a> ',
                cancelButtonText: 'Hayır'
            })
        });
</script>
@endsection