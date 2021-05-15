@extends('layouts.manage')

@section('title')
 {{ $note->subject }}
@endsection

@section('content')


		<div class="invoice-box mt-4 container">
			<div class="date">
				{{ $note->created_at }}
			</div>
			<div class="user-info">
				{{ $user->name }} <br>
				<span>{{ $user->email }} </span>
			</div>
			<div class="note">
				<div class="layoutHead"></div>
				<h4 class="subject">{{ $note->subject }}</h4>
				<p class="note_content">
					{{$note->note}}
				</p>
			</div>
			<div></div>
		</div>
@endsection