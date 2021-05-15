@extends('layouts.manage')

@section('title')
	Satış
@endsection

@section('content')


		<div class="invoice-box mt-4">
			<table>
				<tr class="top">
					<td colspan="5">
						<table>
							<tr>
								<td class="title">
									<img src="{{asset('img/logo2.png')}}" alt="Company logo" style="width: 100%; max-width: 300px" />
								</td>
								
								<td>
									
									{{$sales->created_at}}<br />
								
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
									{{ $sales->adress }}
								</td>

								<td>
									{{ $sales->name }}<br />
									{{$sales->owner_name}}<br />
									{{$sales->email}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

				<tr class="heading text-center">
					<td>Ürün</td>
					<td>Adet</td>
					<td>Adet Fiyatı</td>
					<td>Toplam</td>
				</tr>

				<tr class="item text-center">
					<td>{{$sales->product_name}}</td>

					<td>{{$sales->piece}}</td>
					<td>₺{{$sales->piece_price}}</td>
					<td>₺{{$sales->total_price}}</td>
				</tr>

				
				
				<tr class="total text-center">
					<td></td>
					<td></td>
					<td></td>

					<th>Toplam: ${{$sales->total_price}}</th>
				</tr>

				<tr class="heading text-center">
					<td>Açıklama</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr class="item text-center">
					<td>
						
							{{$sales->sales_note}}
						
					</td>
				</tr>

			</table>
		</div>
@endsection