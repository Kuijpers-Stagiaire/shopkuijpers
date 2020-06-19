@extends('layouts.app')
<head>
	<title>{{$products->product_naam}} - ShopKuijpers</title>
</head>
@section('content')
<div class="container productinfo">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
	<div class="card">
		<div class="row">
			<aside class="col-sm-5 ">
				<article class="gallery-wrap">
					<div class="img-big-wrap">
						<img id="headImage" src="/storage/photos/{{$products->productHeadimage}}">
					</div>
					<!-- slider-product.// -->
					<div class="img-small-wrap">
						@if($products->productimages != "DefaultProductImage.jpg")
							@foreach($products->productimages as $productimage)
								<div class="item-gallery"> <img onclick="SwitchImage(this);" src="/storage/photos/{{$productimage}}"> </div>
							@endforeach
						@endif
					</div>
					<!-- slider-nav.// -->
				</article>
				<!-- gallery-wrap .end// -->
			</aside>
			<aside class="col-sm-7">
				<article class="card-body p-5">
					<h3 class="title mb-3">{{$products->product_naam}}</h3>
					<p class="price-detail-wrap"> 
						<span class="price h3 text-warning"> 
						<span class="currency">€</span><span class="num">{{$products->product_prijs}}</span>
						</span> 
						{{-- <span>/per kg</span>  --}}
					</p>
					<!-- price-detail-wrap .// -->
					<dl class="item-property">
						<dt>Description</dt>
						<dd>
							<p>{{$products->product_omschrijving}}
							</p>
						</dd>
					</dl>
					<dl class="param param-feature">
						<dt>Artikelnummer</dt>
						<dd>{{$products->id}}</dd>
					</dl>
					@foreach ($products->productextrainfo as $item)
						<dl class="param param-feature">
							<dt>Extra informatie</dt>
							<dd>{{$item}}</dd>
						</dl>
                    @endforeach

					<!-- item-property-hor .// -->
					<dl class="param param-feature">
						<dt>Delivery</dt>
						<dd>Worldwide</dd>
					</dl>
					<!-- item-property-hor .// -->
					<hr>
					<form method="POST " action="/add-to-cart/{{$products->id}}/">
					<div class="row">
						<div class="col-sm-5">
							<dl class="param param-inline">
								<dt>Quantity: <input type="text" name="Aantal" required="required" class="form-control form-amount-{{$products->id}}" id="InputAantal-{{$products->id}}-Bekijkmeer" aria-describedby="emailHelp" max="{{$products->id}}">
								</dt>
								<dd>
									{{-- <select class="form-control form-control-sm" style="width:70px;">
										@for ($i = 0; $i <= $products->product_aantal; $i++)
											<option> {{$i}} </option>
										@endfor
									</select>
								</dd> --}}
							</dl>
							<!-- item-property .// -->
						</div>
					</div>
					<!-- row.// -->
					<hr>
					{{-- <a href="" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a> --}}
					<button class="btn btn-lg btn-outline-primary text-uppercase-{{$products->id}}" type="submit" id="{{$products->id}}"><i class="fas fa-shopping-cart"></i>Add to cart</button>
				</form>

				</article>
				<!-- card-body.// -->
			</aside>
			<!-- col.// -->
		</div>
		<!-- row.// -->
	</div>
	<!-- card.// -->
</div>
<!--container.//-->
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script>
// 	$(document).ready(function(){
//     var $big= $(".img-big-wrap img");
//     var $small = $('.item-gallery img');
//     $big.not(':first').hide();
//     $small.first().addClass('selected');
    
//     $small.click(function(e){
//         $small.removeClass('selected');
//         var i = $(this).addClass('selected').index();
//         $big.hide().eq(i).show();
//     });
    
//     $('.next, .prev').click(function() {
//         var m = $(this).hasClass('next') ? 'next' : 'prev';
//         var $t = $small.filter('.selected')[m]();
//         if ($t.length) {
//             $small.eq($t.index()).click();
//         }
//     });
    
// });
SwitchImage = (imgs) => {
	let headImage = document.getElementById('headImage');
	headImage.src = imgs.src;
}



</script>