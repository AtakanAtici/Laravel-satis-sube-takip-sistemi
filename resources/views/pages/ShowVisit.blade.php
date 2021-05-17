@extends('layouts.manage')

@section('title')
Aktif Ziyaretler
@endsection

@section('headLine')
Yapılmayı bekleyen ziyaretler
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Şube Adı</th>
      <th scope="col" class="t-head-item">Personel</th>
      <th scope="col" class="t-head-item">Personel e posta</th>
      <th scope="col" class="t-head-item">Tarih</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($visit as $item)
    <tr>
      <th scope="row">{{ $item->b_name }}</th>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->visit_date }}</td>
      
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

@section('js')
@endsection