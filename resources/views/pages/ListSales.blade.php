@extends('layouts.manage')

@section('title')
Satış Bilgileri
@endsection

@section('css')
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Müşteri</th>
      <th scope="col" class="t-head-item">Ürün</th>
      <th scope="col" class="t-head-item">Adet</th>
      <th scope="col" class="t-head-item">Toplam Fiyat</th>
      <!-- <th scope="col" class="t-head-item">Detay</th> -->
      <th scope="col" class="t-head-item">Görüntüle</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($sales as $item)
    <tr>
      <th scope="row">{{ $item->name }}</td>
      

      <td>{{ $item->product_name }}</td>
      
      <td>{{ $item->piece }}</td>
      <td>{{ $item->total_price }} ₺</td>
   
      <td>
        <a  href="{{ route('show.sale',['id' => $item->id])}}"><img class="btnImg" src="{{ asset('img/icons/read.png') }}"></a>
      </td>
      
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

@section('js')
@endsection