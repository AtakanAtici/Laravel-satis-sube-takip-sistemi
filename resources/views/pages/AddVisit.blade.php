
@extends('layouts.add')

@section('title')
Yeni Ziyaret Planı Oluştur
@endsection


@section('headLine')
Yeni Ziyaret
@endsection

@section('content')
<div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('add.visit') }}" id="formVisit">
          @csrf
          
            <div class="row hucregrup">
              
              <div class="col-md-6 form-group">
                <span>Personel:</span>
                <select name="personelID" id="personelID" class="form-select" size="10" aria-label="size 3 select example">
				  @foreach($personel as $item)
				 <option value="{{ $item->prsnl_no }}">{{ $item->name }}</option>
				 @endforeach
				</select>
              </div>
              <div class="col-md-6 form-group">
              	<span>Şube:</span>
               <select name="branchID" id="branchID" class="form-select" size="10" aria-label="size 3 select example">
				 @foreach($branch as $item)
				 <option value="{{ $item->branch_no }}">{{ $item->name }}</option>
				 @endforeach
				</select>
              </div>
            </div>
            <div class="row hucregrup ">
            	<div class="col-md-6 "></div>
            	<div class="col-md-6 form-group">
            		<span>Tarih/Saat</span>
            		<input class="form-control" type="datetime-local" id="visitDate" name="visit_date">
            	</div>
            </div>
            
            
             
           
        </form>
      </div>
      <div class="layoutFotter">
      <button type="button" id="btnSend" class="btn btn-success btnFooter"><img src="{{ asset('img/icons/send.png') }}"> <span class="btnFooterText">Oluştur</span> </button>
      <button type="button" id="btnCancel" class="btn btn-danger btnFooter"><img src="{{ asset('img/icons/cancel.png') }}"><span class="btnFooterText">İptal</span></button>
    </div>
    </div>
    
  </div>
@endsection


@section('js')
<script>

	 $('#btnSend').click(function() {
	 	let branchID = document.querySelector('#branchID').value;
	 	let personelID = document.querySelector('#personelID').value;
	 	let visitDate = document.querySelector('#visitDate').value;

	 	 if(branchID.trim() == '')
	 	 {
	 	 	Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Lütfen şube seçiniz.'
               })
	 	 }

	 	 else if(personelID.trim() == '')
	 	 {
	 	 	Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Lütfen personel seçiniz.'
               })
	 	 }
	 	  else if(visitDate.trim() == '')
	 	 {
	 	 	Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Lütfen tarih seçiniz.'
               })
	 	 }
	 	 else
	 	 {
	 	 	$('#formVisit').submit();
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