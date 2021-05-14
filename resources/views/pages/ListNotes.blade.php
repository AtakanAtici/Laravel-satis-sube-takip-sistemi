@extends('layouts.manage')

@section('title')
 Notlar
@endsection

@section('css')
@endsection

@section('headLine')
Notlar
@endsection


@section('btnValue')
<a href="{{ route('show.add.customer') }}">
<button type="button" class="btn btn-success btn-addNew"> Yeni Not Ekle </button>
</a>
@endsection

@section('content')
<div class="container tablo table-responsive">
	<table class="table">
  <thead class="thead t-head text-center">
    <tr>
      <th scope="col" class="t-head-item">Gönderen</th>
      <th scope="col" class="t-head-item">Konu</th>
       <th scope="col" class="t-head-item">Mesaj</th>
      <th scope="col" class="t-head-item">Tarih</th>
      <th scope="col" class="t-head-item">Görüntüle</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
  	@foreach($notes as $item)
    
    	@php
    	if($item->to_roleID == $myRole->author_no)
    	{	@endphp
    		<tr>
    		<th scope="row">{{ $item->name }}</th>
		      <td>{{ $item->subject }}</td>
          <td>{{ $item->note }}</td>
		      <td>{{ $item->created_at }}</td>
		      <td> <a href="{{ route('read.notes', ['note_id' => $item->note_id]) }}">
		      	<img class="btnImg" src="{{ asset('img/icons/read.png') }}">
		      </a>
		  </td>
		    </tr>
@php    }
    	@endphp
      
   @endforeach
  </tbody>
</table>
</div>


@endsection

@section('js')
@endsection