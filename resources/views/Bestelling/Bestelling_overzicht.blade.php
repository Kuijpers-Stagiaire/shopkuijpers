@extends('layouts.app')
<head>
	<title>Winkelwagen - ShopKuijpers</title>
</head>
@section('winkelwagen')
@section('content')
<div class="container">
	@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session()->get('message') }}
	</div>
	@endif
	<div class="card overflow-auto">
		<table class="table table-hover shopping-cart-wrap ">
			<thead class="text-muted">
				<tr>
					<th scope="col">Bestellingen</th>
					<th scope="col" width="120"></th>
					<th scope="col" width="120"></th>
					<th scope="col" width="120"></th>
					<th scope="col" width="200" class="text-right">Actie</th>
				</tr>
			</thead>
			<tbody>
				@if (isset($Bestellingen))
				@foreach($Bestellingen as $Bestelling)
				<form action="/bestelling/geschiedenis/info" method="GET">
					<tr>
						<td>
							<input class="LabelLookAlike" name="time" readonly value="{{$Bestelling->created_at}}">
							{{-- <label name="time" readonly>{{$Bestelling->created_at}}</label> --}}
						</td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td class="text-right"> 
							<button type="submit" class="btn btn-primary">bekijk</i></button>
						</td>
					</tr>
				</form>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
	<!-- card.// -->
</div>
@endsection