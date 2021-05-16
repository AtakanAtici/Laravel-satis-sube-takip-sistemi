@extends('layouts.manage')

@section('title')
	İncele
@endsection

@section('content')


		<div class="invoice-box mt-4">
			<table>
				<tr class="top">
					<td colspan="5">
						<table>
							<tr>
								<td class="title">
									
									<img src="{{asset('img/visit/'.$visit->image)}}" alt="Ziyaret Resmi" style="width: 100%; max-width: 300px" />
								</td>
								
								<td>
									 {{ $visit->personel_location }}<br />
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="5">
						<table>
							<tr>
								<td>
									
								</td>
								{{ $personel->name }}  -  {{$branch->name}}
								<td>
								
								Planlanan Tarih:	{{$visit->visit_date}} <br>
								Ziyaret Tarihi: 	{{ $visit->updated_at }} <br>
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

			

				<tr class="heading ">
					<td>Açıklama</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr class="item">
					<td>
							<p>{{$visit->description}}</p>
						
					</td>
				</tr>

			</table>
		</div>
@endsection