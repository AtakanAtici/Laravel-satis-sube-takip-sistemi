<?php use Illuminate\Support\Str;  ?>
@extends('layouts.manage')

@section('title')
	Şube Yönetimi
@endsection

@section('css')
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
      <td><a href="#"><img class="btnImg" src="{{ asset('img/icons/delete.png') }}"></a></td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

@section('js')
@endsection