@extends('layouts.app')
<head>
	<title>leveranciers - ShopKuijpers</title>
</head>
@section('content')
<div class="container">
	<div class="row">
		@foreach($leveranciers as $leverancier)
		<div class="col-md-4">
			<figure class="card card-product">
				<figcaption class="info-wrap">
					<h4 class="title">{{ $leverancier->Bedrijf_naam }}</h4>
                    <p class="desc">{{ $leverancier->Bedrijf_plaats }}</p>
                    <p class="artikelnummer">{{ $leverancier->Bedrijf_telefoonnr }}</p>
					<div class="rating-wrap">
						<div class="label-rating">{{-- @foreach ($product->productextrainfo as $item)
                            {{$item}},
                        @endforeach --}}</div>
						{{-- <div class="label-rating">Intel i7(9th gen)</div>
                        <div class="label-rating">17,3 inch</div> --}}
    					</div>
					<!-- info-wrap.// -->
				</figcaption>
				<div class="bottom-wrap">
                    <a href="/leveranciers/{{$leverancier->id}}" class="btn btn-sm btn-primary float-right">Bekijk het bedrijf</a>	
					<!-- price-wrap.// -->
				</div>
				<!-- bottom-wrap.// -->
			</figure>
		</div>
	@endforeach
@endsection