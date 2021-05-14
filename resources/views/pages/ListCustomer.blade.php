<?php use Illuminate\Support\Str;  ?>
@extends('layouts.manage')

@section('title')
	Müşteri Yönetimi
@endsection

@section('css')
<meta name="csrf_token" content="{{ csrf_token() }}">
@endsection

@section('headLine')
	Müşteri Yönetimi
@endsection

@section('btnValue')
<a href="{{ route('show.add.branch') }}">
<button type="button" class="btn btn-success btn-addNew"> Yeni Müşteri Ekle </button>
</a>
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Müşteri no.</th>
      <th scope="col" class="t-head-item">Firma adı</th>
      <th scope="col" class="t-head-item">Yetkili</th>
      <th scope="col" class="t-head-item">Telefon</th>
      <th scope="col" class="t-head-item">E posta</th>
      <th scope="col" class="t-head-item">Düzenle</th>
      <th scope="col" class="t-head-item">Sil</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($customer as $item)
    <tr>
      <th scope="row">{{ $item->customer_no }}</th>
      <td>{{ $item->name }}</td>
      <td>{{ $item->owner_name }}</td>
      <td><a href="tel:{{ $item->tel_no }}">{{ $item->tel_no }}</a></td>
      <td>{{ $item->email }}</td>
      <td>
        <a data-id="{{ $item->id }}" href="{{ route('show.edit.branch', ['id' =>$item->id]) }}"><img class="btnImg" src="{{ asset('img/icons/edit.png') }}"></a>
      </td>
      <td>
        <a data-id="{{ $item->customer_no }}" name="customerNo" href="javascript:void(0)" class="delete">
          <img class="btnImg" src="{{ asset('img/icons/delete.png') }}">
        </a>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

@section('js')
<script>
   $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr("content")
            }
        });
  $('.delete').click(function () {
            let customerNo = $(this).attr('data-id');
            Swal.fire({
                title: "Emin Misiniz?",
                text: customerNo  + " nolu müşteri bilgisini silmek istiyor musunuz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet',
                cancelButtonText: 'Hayır'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete.customer') }}",
                        type: "GET",
                        async: false,
                        data: {
                            customerNo : customerNo
                        },
                        success: function (response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                text: 'Silme İşlemi Başarılı',
                                confirmButtonText:'Tamam'
                            });
                            $("tr#" + customerNo).remove();
                             window.location.reload();
                        },
                        eroor: function ()
                        {
                            Swal.fire({
                                icon: 'eroor',
                                title: 'Başarısız',
                                text: 'Silme İşlemi Başarısız',
                                confirmButtonText:'Tamam'
                            });
                        }
                    })
                }
            })
        });
</script>
@endsection