@extends('layouts.manage')

@section('title')
Personel Yönetmi
@endsection

@section('css')
@endsection

@section('headLine')
Personeller
@endsection

@section('btnValue')
<a href="{{ route('show.add.personnel') }}">
<button type="button" class="btn btn-success btn-addNew"> Yeni Personel Ekle </button>
</a>
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Personel No.</th>
      <th scope="col" class="t-head-item">Adı Soyadı</th>
      <th scope="col" class="t-head-item">Telefon</th>
      <th scope="col" class="t-head-item">Pozisyon</th>
      <th scope="col" class="t-head-item">E Posta</th>
      <!-- <th scope="col" class="t-head-item">Detay</th> -->
      <th scope="col" class="t-head-item">Düzenle</th>
      <th scope="col" class="t-head-item">Sil</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($user as $item)
    <tr>
      <th scope="row">{{ $item->prsnl_no }}</td>
      <td >{{ $item->name }}</th>

      <td><a href="tel:{{ $item->tel_no }}">{{ $item->tel_no }}</a></td>
      <?php
      $role = null;
      if($item->author_no == 1)
      {
      	$role = "Yönetici";
      }
      else if ($item->author_no == 2)
      {
      	$role = "Saha Personeli";
      }
      else{
      	$role = "Tanımsız";
      }
       ?>
      <td>{{ $role }}</td>
      <td>{{ $item->email }}</td>
     <!-- 
		 <td>
        <a data-id="{{ $item->id }}" href="#">
        	<img class="btnImg" src="{{ asset('img/icons/employee.png') }}">
        </a>
      </td>
     -->
      <td>
        <a data-id="{{ $item->id }}" href="{{ route('show.edit.personnel', ['id' =>$item->id]) }}"><img class="btnImg" src="{{ asset('img/icons/edit.png') }}"></a>
      </td>
      <td>
        <a data-id="{{ $item->prsnl_no }}" name="prsnlNo" href="javascript:void(0)" class="delete">
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
            let prsnlNo = $(this).attr('data-id');
            Swal.fire({
                title: "Emin Misiniz?",
                text: prsnlNo  + " nolu kullanıcı bilgisini silmek istiyor musunuz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet',
                cancelButtonText: 'Hayır'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete.personnel') }}",
                        type: "POST",
                        async: false,
                        data: {
                            prsnlNo : prsnlNo
                        },
                        success: function (response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                text: 'Silme İşlemi Başarılı',
                                confirmButtonText:'Tamam'
                            });
                            $("tr#" + prsnlNo).remove();
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