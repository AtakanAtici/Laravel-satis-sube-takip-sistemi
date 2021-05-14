<?php use Illuminate\Support\Str;  ?>
@extends('layouts.manage')

@section('title')
	Şube Yönetimi
@endsection

@section('css')
<meta name="csrf_token" content="{{ csrf_token() }}">
@endsection

@section('headLine')
Şube Yönetimi
@endsection

@section('btnValue')
<a href="{{ route('show.add.branch') }}">
<button type="button" class="btn btn-success btn-addNew"> Yeni Şube Ekle </button>
</a>
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Şube Adı</th>
      <th scope="col" class="t-head-item">Telefon</th>
      <th scope="col" class="t-head-item">Adres</th>
      <th scope="col" class="t-head-item">Yetkili Adı</th>
      <th scope="col" class="t-head-item">Yetkili Telefon</th>
      <th scope="col" class="t-head-item">Düzenle</th>
      <th scope="col" class="t-head-item">Sil</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($list as $item)
    <tr>
      <th scope="row">{{ $item->name }}</th>
      <td><a href="tel:{{ $item->tel_no }}">{{ $item->tel_no }}</a></td>
      <td>{{ Str::limit($item->adress, 20) }}</td>
      <td>{{ $item->author_name }}</td>
      <td><a href="tel:{{ $item->author_tel }}">{{ $item->author_tel }}</a></td>
      <td><a href="#"><img class="btnImg" src="{{ asset('img/icons/edit.png') }}"></a></td>
      <td>
        <a data-id="{{ $item->branch_no }}" name="branchNo" href="javascript:void(0)" class="delete">
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
            let branchNo = $(this).attr('data-id');
            Swal.fire({
                title: "Emin Misiniz?",
                text: branchNo  + " Şube bilgisini silmek istiyor musunuz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet',
                cancelButtonText: 'Hayır'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete.branch') }}",
                        type: "POST",
                        async: false,
                        data: {
                            branchNo : branchNo
                        },
                        success: function (response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                text: 'Silme İşlemi Başarılı',
                                confirmButtonText:'Tamam'
                            });
                            $("tr#" + branchNo).remove();
                             window.location.reload();
                        },
                        eroor: function ()
                        {
                            Swal.fire({
                                icon: 'eroor',
                                title: 'Başarılı',
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