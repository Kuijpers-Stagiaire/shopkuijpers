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
					<th scope="col">Product</th>
					<th scope="col" width="120">Aantal</th>
					<th scope="col" width="120">Prijs</th>
					<th scope="col" width="120">Totaal</th>
					<th scope="col" width="200" class="text-right">Actie</th>
				</tr>
			</thead>
			<tbody>
				<?php $total = 0 ?>
				@if (isset($getBasket))
				@foreach($getBasket as $getBasketItem)
				<tr>
					<td>
						<figure class="media">
							<div class="img-wrap"><img src="https://screenshotlayer.com/images/assets/placeholder.png" class="img-thumbnail img-sm"></div>
							<figcaption class="media-body">
								<h5 class="title text-truncate">{{$getBasketItem->product_naam}}</h5>
								<h6>{{$getBasketItem->product_omschrijving}}</h6>
								<div class="artikelnummer">artikelnummer</div>
							</figcaption>
						</figure>
					</td>
					<td>
						{{-- 
						<div class="input-group mb-3">
							<input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$getBasketItem->aantal}}">
							<div class="input-group-append">
							</div>
						</div>
						--}}
						<select class="form-control aantalselect" onchange="window.location = '/winkelwagen/update/{{$getBasketItem->product_id}}/'+ this.value ">
							@for ($i = 0; $i <= $getBasketItem->product_aantal; $i++)
							@if($i == $getBasketItem->aantal)
							<option selected value="{{$i}}">{{$i}}</option>
							@else
							<option value="{{$i}}">{{$i}}</option>
							@endif
							@endfor
						</select>
					</td>
					<td>
						<div class="price-wrap"> 
							<var class="price">€{{$getBasketItem->product_prijs}}</var> 
							<small class="text-muted">(Prijs per stuk)</small> 
						</div>
						<!-- price-wrap .// -->
					</td>
					<td>
						<div class="price-wrap"> 
							<var class="price">€{{number_format((float)$getBasketItem->aantal * $getBasketItem->product_prijs, 2, '.', '')}}</var> 
							{{-- <small class="text-muted">(incl. btw)</small>  --}}
						</div>
						<!-- (total)price-wrap .// -->
					</td>
					<td class="text-right"> 
						<a href="/winkelwagen/destroy/{{$getBasketItem->product_id}}/{{$getBasketItem->aantal}}" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
					</td>
				</tr>
				@endforeach
				@endif
				<tfoot>
					<tr>
						<td>Subtotaal</td>
						<td></td>
						<td></td>
						<td>€{{$totaalprijs}}</td>
						<td class="text-right"><a href="/winkelwagen/bestel" class="btn btn-outline-primary">Bestel</a></td>
					</tr>
				</tfoot>
			</tbody>
		</table>
	</div>
	<!-- card.// -->
</div>
@endsection