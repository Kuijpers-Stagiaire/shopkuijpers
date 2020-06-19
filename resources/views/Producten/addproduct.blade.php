@extends('layouts.app')
<head>
	<title>Add Product - ShopKuijpers</title>
</head>
@section('content')
<div class="container productinfo">
@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif
<div class="container addproduct-container">
<form class="form" action="/producten/nieuw/store" method="POST" id="registrationForm" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-sm-3 fotocontainer">
		<!--left col-->
		<div class="text-center">
			<img src="https://d167y3o4ydtmfg.cloudfront.net/240/studio/assets/v1554362197556_613007740/Default-coming-soon.jpg" class="avatar productimage" alt="avatar">
			<h6>Upload een andere foto...</h6>
			<input type="file" name="photos[]" multiple class="text-center file-upload">
		</div>
	</div>
<div class="row">
	<!--/col-3-->
	<div class="col-sm-9 formcontainer">
		<div class="tab-content">
			<div class="tab-pane active" id="home">
				<hr>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="merk">
								<h4>Merk</h4>
							</label>
							<input type="text" class="form-control" name="merk" id="merk" placeholder="Merk van het product....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="leverancier">
								<h4>Leverancier</h4>
							</label>
							<select id="cars" name="leverancier" class="form-control">
								<option selected>Kies een leverancier</option>
								<option value="1">Asus</option>
								<option value="2">HP</option>
							  </select>						
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="prd_naam">
								<h4>Productnaam</h4>
							</label>
							<input type="text" class="form-control" name="prd_naam" id="prd_naam" placeholder="Naam van het product....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="prd_serie">
								<h4>Productserie</h4>
							</label>
							<input type="text" class="form-control" name="prd_serie" id="prd_serie" placeholder="Serie van het product....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="model">
								<h4>Model</h4>
							</label>
							<input type="text" class="form-control" name="model" id="model" placeholder="Model van het product...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="productomschrijving">
								<h4>Productomschrijving</h4>
							</label>
							<textarea class="form-control" name="productomschrijving" id="productomschrijving" placeholder="Vertel over het product...."></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="prijs">
								<h4>Prijs</h4>
							</label>
							<input type="text" class="form-control" name="prijs" id="prijs" placeholder="Prijs van het product...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="artikelnummer">
								<h4>Artikelnummer</h4>
							</label>
							<input type="text" class="form-control" name="artikelnummer" id="artikelnummer" placeholder="Artikelnummer van het product...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="extra_info_1">
								<h4>Extra informatie 1</h4>
							</label>
							<input type="text" class="form-control" name="extra_info_1" id="extra_info_1" placeholder="Extra informatie over het product">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="extra_info_2">
								<h4>Extra informatie 2</h4>
							</label>
							<input type="text" class="form-control" name="extra_info_2" id="extra_info_2" placeholder="Extra informatie over het product....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="extra_info_3">
								<h4>Extra informatie 3</h4>
							</label>
							<input type="text" class="form-control" name="extra_info_3" id="extra_info_3" placeholder="Extra informatie over het product....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="extra_info_4">
								<h4>Extra informatie 4</h4>
							</label>
							<input type="text" class="form-control" name="extra_info_4" id="extra_info_4" placeholder="Extra informatie over het product....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="voorraad">
								<h4>Aantal op voorraad</h4>
							</label>
							<input type="text" class="form-control" name="voorraad" id="voorraad" placeholder="Aantal producten op voorraad....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<br>
							<button class="btn btn-success opslaan" type="submit">Opslaan</button>
							<button class="btn btn-danger annuleren" type="reset">Annuleren</button>
						</div>
					</div>
				</form>
				<hr>
			</div>
		</div>
		<!--/tab-content-->
	</div>
	<!--/col-9-->
</div>
<!--/row-->
@endsection
<script>
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>