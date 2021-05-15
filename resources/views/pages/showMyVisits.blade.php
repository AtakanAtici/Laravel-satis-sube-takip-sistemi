@extends('layouts.manage')

@section('title')
Ziyaretlerim
@endsection

@section('headLine')
Ziyaretlerim
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Şube Adı</th>
      <th scope="col" class="t-head-item">Adres</th>
      <th scope="col" class="t-head-item">Tarih</th>
      <th scope="col" class="t-head-item">Ziyareti tamamla</th>
      
      
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($visit as $item)
    <tr>
      <th scope="row">{{ $item->b_name }}</th>
      <td>{{ $item->adress }}</td>
      <td>{{ $item->visit_date }}</td>

     

       <td> <a href="{{ route('read.notes', ['id' => $item->id]) }}">
            <img class="btnImg" src="{{ asset('img/icons/read.png') }}">
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