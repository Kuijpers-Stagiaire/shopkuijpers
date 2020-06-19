@extends('layouts.app')
<head>
	<title>Leverancier toevoegen - ShopKuijpers</title>
</head>
@section('content')
<div class="container productinfo">
@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif
<div class="container addproduct-container">
<form class="form" action="/leverancier/nieuw/store" method="POST" id="registrationForm" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-sm-3 fotocontainer">
		<!--left col-->
		<div class="text-center">
			<img src="https://d167y3o4ydtmfg.cloudfront.net/240/studio/assets/v1554362197556_613007740/Default-coming-soon.jpg" class="avatar productimage" alt="avatar">
			<h6>Upload een andere foto...</h6>
			<input type="file" name="Bedrijf_foto" multiple class="text-center file-upload">
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
							<label for="bedrijfsnaam">
								<h4>Bedrijfsnaam</h4>
							</label>
							<input type="text" class="form-control" name="bedrijfsnaam" id="bedrijfsnaam" placeholder="Bedrijfsnaam invullen a.u.b.....">
						</div>
					</div>
					{{-- <div class="form-group">
						<div class="col-xs-6">
							<label for="first_name">
								<h4>Leverancier</h4>
							</label>
							<select id="cars" name="leverancier" class="form-control">
								<option selected>Kies een leverancier</option>
								<option value="1">Asus</option>
								<option value="2">HP</option>
							  </select>						
						</div>
                    </div> --}}
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="bedrijfsadres">
								<h4>Bedrijfsadres</h4>
							</label>
							<input type="text" class="form-control" name="bedrijfsadres" id="bedrijfsadres" placeholder="Bedrijfsadres invullen a.u.b.....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="last_name">
								<h4>Postcode</h4>
							</label>
							<input type="text" class="form-control" name="postcode" id="postcode" placeholder="Vul de postcode van het bedrijf in....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="last_name">
								<h4>Plaats</h4>
							</label>
							<input type="text" class="form-control" name="bedrijfplaats" id="prd_serie" placeholder="Plaats van het bedrijf....">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="telefoonnr">
								<h4>Telefoon nr</h4>
							</label>
							<input type="text" class="form-control" name="telefoonnr" id="telefoonnr" placeholder="Telefoonnummer van het bedrijf...">
						</div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title"><strong>Info Accountmanager</strong></h4>
                        </div>
                        
					<div class="form-group">
						<div class="col-xs-6">
							<label for="acm_naam">
								<h4>Accountmanager naam</h4>
							</label>
							<input type="text" class="form-control" name="acm_naam" id="acm_naam" placeholder="Naam accountmanager...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="acm_telnr">
								<h4>Accountmanager tel. nr.</h4>
							</label>
							<input type="text" class="form-control" name="acm_telnr" id="acm_telnr" placeholder="Telefoonnummer van de accountmanager...">
						</div>
                    </div>
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="acm_email">
								<h4>Accountmanager e-mail</h4>
							</label>
							<input type="text" class="form-control" name="acm_email" id="acm_email" placeholder="Emailadres accountmanager...">
						</div>
                    </div>
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="inkoopvoorwaarden">
								<h4>Inkoopvoorwaarden</h4>
							</label>
							<input type="file" class="form-control" name="inkoopvoorwaarden" id="inkoopvoorwaarden" placeholder="Upload hier een PDF van inkoopvoorwaarden...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="algmn_info">
								<h4>Algemene informatie</h4>
							</label>
							<textarea class="form-control" name="algmn_info" id="algmn_info" placeholder="Algemeen informatie...."></textarea>
						</div>
                    </div>
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="acm_naam">
								<h4>Conmtactpersoon-sales naam</h4>
							</label>
							<input type="text" class="form-control" name="cps_naam" id="cps_naam" placeholder="Naam contactpersoon-sales...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="cpsupp_naam">
								<h4>Conmtactpersoon-support naam</h4>
							</label>
							<input type="text" class="form-control" name="cpsupp_naam" id="cpsupp_naam" placeholder="Telefoonnummer van de accountmanager...">
						</div>
                    </div>
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="email_sales">
								<h4>E-mailadres Sales</h4>
							</label>
							<input type="text" class="form-control" name="email_sales" id="email_sales" placeholder="E-mailadres afdeling sales...">
						</div>
                    </div>
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="email_support">
								<h4>E-mailadres Sales</h4>
							</label>
							<input type="text" class="form-control" name="email_support" id="email_support" placeholder="E-mailadres afdeling support...">
						</div>
                    </div>
					<div class="form-group">
						<div class="col-xs-6">
							<label for="algmn_info">
								<h4>Extra informatie</h4>
							</label>
							<textarea class="form-control" name="extr_info" id="extr_info" placeholder="Extra informatie...."></textarea>
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