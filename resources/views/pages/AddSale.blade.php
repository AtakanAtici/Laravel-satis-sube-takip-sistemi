@extends('layouts.add')

@section('title')
	Yeni Satış Bilgisi Ekle
@endsection

@section('headLine')
	Satış bilgisi ekle
@endsection

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('add.sale') }}" id="formSales">
          @csrf
          <input type="hidden" name="personelID" value="{{ $user->prsnl_no }}">
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Ürün Adı:</span>
                <input name="product_name" id="pName" class="form-control" type="text">
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Firma:</span>
                <select name="customerID" id="cName" class="form-control custom-select">
                	<option value="0">Firma seç</option>
                	@foreach($customer as $item)
                	<option value="{{ $item->customer_no }}">{{ $item->name }}</option>
                	@endforeach
                </select>
              </div>
             
            </div>
            
              <div class="row hucregrup">
              	<div class="col-md-6 form-group">
                <span>Adet:</span>
                <input name="piece" id="piece" class="form-control" type="number">
              </div>
              <div class="col-md-6 form-group">
                <span>Adet fiyatı:</span>
                <input name="piece_price" id="piecePrice" class="form-control" type="text">
              </div>
               

            </div>
            <div class="row hucregrup">
             
              <div class="col-md-12 form-group">
                <span>Açıklama:</span>
                <textarea name="sales_note" id="salesNote" class="form-control" rows="3"></textarea>
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

	 $('#btnSave').click(function(){
	 	let pName = document.querySelector('#pName').value;
	 	let cName = document.querySelector('#cName').value;
	 	let piece = document.querySelector('#piece').value;
	 	let piecePrice = document.querySelector('#piecePrice').value;

	 	if(pName.trim() == '')
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Ürün adı boş geçilemez.'
               })
	 	}
	 	else if(cName.trim() == '')
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Müşteri boş geçilemez.'
               })
	 	}
	 	else if(cName.trim() == 0)
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Geçerli bir Firma seçin.'
               })
	 	}
	 	else if(piece.trim() == '')
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Adet boş geçilemez.'
               })
	 	}
	 	else if(piecePrice.trim() == '')
	 	{
	 		Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Adet fiyatı boş geçilemez.'
               })
	 	}
	 	else{
	 		$('#formSales').submit();
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
                confirmButtonText: '<a class="text-white" style="text-decoration:none" href="{{ route('hompage') }}">Evet</a> ',
                cancelButtonText: 'Hayır'
            })
        });
</script>
@endsection