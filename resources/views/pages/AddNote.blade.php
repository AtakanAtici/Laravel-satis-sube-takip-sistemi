@extends('layouts.add')

@section('title')
Yeni not oluştur
@endsection

@section('headLine')
Yeni not oluştur
@endsection

@section('content')
<div class="container">
    <div class="layoutHead"></div>
    <div class="layoutBody">
      <div class="form formAdd">
        <form class="form" method="POST" action="{{ route('add.note') }}" id="formNotes">
          @csrf
          <input type="hidden" name="senderID" value="{{ $me->prsnl_no }}">
            <div class="row hucregrup">
              <div class="col-md-6 form-group">
                <span>Konu:</span>
                <input name="subject" id="subject" class="form-control" type="text">
              </div>
              <div class="col-md-6 form-group">
                <span>Kimler görebilir:</span>
                <select name="to_roleID" id="selectID" class="form-control">
                	<option value="0">Tümü</option>
                	<option value="1">Yöneticiler</option>
                	<option value="2">Saha Personelleri</option>
                </select>
              </div>
            </div>
            <div class="row hucregrup">
              <div class="col-md-12 form-group">
                <span>Mesaj:</span>
               <textarea class="form-control" name="note" id="note" rows="10"></textarea>
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
<script>
	$.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr("content")
            }
        });

	$('#btnSend').click(function (){
		let subject = document.querySelector('#subject').value;
		let selectID = document.querySelector('#selectID').value;
		let note	= document.querySelector('#note').value;

		if(subject.trim() == '')
		{
			Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Konu boş geçilemez.'
               })
		}
		else if (selectID.trim() == '')
		{
			Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Gönderilecek yetki adını seçin.'
               })
		}
		else if (note.trim() == '')
		{
			Swal.fire({
                   icon: 'error',
                   title: 'Hata!',
                   text: 'Mesaj kısmı boş geçilemez.'
               })
		}
		else{
           	$('#formNotes').submit();
		}
	});
</script>
@endsection