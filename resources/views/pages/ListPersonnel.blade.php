@extends('layouts.manage')

@section('title')
Personeller
@endsection

@section('css')
@endsection

@section('headLine')
Personel Yönetimi
@endsection

@section('btnValue')
<button type="button" class="btn btn-success btn-addNew"> Yeni Personel Ekle </button>
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
      <td scope="row">{{ $item->prsnl_no }}</td>
      <th >{{ $item->name }}</th>

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
        <a data-id="{{ $item->id }}" href="{{ route('show.edit.branch', ['id' =>$item->id]) }}"><img class="btnImg" src="{{ asset('img/icons/edit.png') }}"></a>
      </td>
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
@endsection