@extends('layouts.app')
<head>
	<title>Producten - ShopKuijpers</title>
</head>
@section('content')
<div class="container">
	<div class="row">
		@foreach($products as $product)
		<div class="col-md-4">
			<figure class="card card-product">
				<div class="img-wrap"><img src="https://assets2.razerzone.com/images/razer-blade-pro-17/razer-blade-pro-17-2019-OGimage-1200x630.jpg"></div>
				<figcaption class="info-wrap">
					<h4 class="title">{{ $product->product_merk }} {{ $product->product_naam }}</h4>
                    <p class="desc">{{ $product->product_omschrijving }}</p>
                    <p class="artikelnummer">11122233367</p>
					<div class="rating-wrap">
						<div class="label-rating">@foreach ($product->productextrainfo as $item)
                            {{$item}},
                        @endforeach</div>
						{{-- <div class="label-rating">Intel i7(9th gen)</div>
                        <div class="label-rating">17,3 inch</div> --}}
    					</div>
					<!-- info-wrap.// -->
				</figcaption>
				<div class="bottom-wrap">
                    <a href="/producten/{{$product->id}}/productinfo" class="btn btn-sm btn-primary float-right">Bekijk het product</a>	
					<div class="price-wrap h5">
						<span class="price-new">€{{ $product->product_prijs }}</span>
					</div>
					<!-- price-wrap.// -->
				</div>
				<!-- bottom-wrap.// -->
			</figure>
		</div>
	@endforeach
@endsection