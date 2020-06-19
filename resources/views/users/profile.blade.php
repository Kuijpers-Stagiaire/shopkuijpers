@extends('layouts.app')
<head>
	<title>Profiel - ShopKuijpers</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
<div class="container profielcontainer">
  <form action="/profiel/{{$UserInfo->id}}/opslaan" method="POST" enctype="multipart/form-data">
    @csrf
    
  <div class="row">
    <div class="col-xs-12 col-sm-9">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <img src="/storage/avatars/{{ $UserInfo->avatar }}" class="img-circle profile-avatar" alt="User avatar">
        </div>

        <div class="form-group uploadimagebutton">
          <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Upload een geldig afbeeldingsbestand. De grootte van de afbeelding mag niet meer zijn dan 2 MB.</small>
        </div>
      </div>


      {{-- Gebruikersinformatie gedeelte --}}
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title"><strong>Gebruikersinformatie</strong></h4>
        </div>
        <div class="form-group row">
          <label for="voornaam" class="col-sm-2 col-form-label">Voornaam</label>
          <div class="col-sm-10">
            <input type="text" name="voornaam" class="form-control" id="voornaam" placeholder="{{ $UserInfo->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="achternaam" class="col-sm-2 col-form-label">Achternaam</label>
          <div class="col-sm-10">
            <input type="text" name="achternaam" class="form-control" id="achternaam" placeholder="{{ $UserInfo->achternaam }}">
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group row">
            <label for="locatie" class="col-sm-2 control-label">Locatie</label>
            <div class="col-sm-10">
              <select class="form-control" name="locatie" id="locatie">
                <option disabled selected hidden>Vestiging: {{ $UserInfo->locatie }}</option>
                <option>Amsterdam</option>
                <option>Arnhem</option>
                <option>Den Bosch</option>
                <option>Den Haag</option>
                <option>Echt</option>
                <option>Groningen</option>
                <option>Helmond</option>
                <option>Katwijk</option>
                <option>Makkum</option>
                <option>Oosterhout</option>
                <option>Roosendaal</option>
                <option>Tilburg</option>
                <option>Utrecht</option>
                <option>Zelhem</option>
                <option>Zwolle</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="functie" class="col-sm-2 control-label">Functie</label>
            <div class="col-sm-10">
              <input id="functie" name="functie" type="text" class="form-control" placeholder="{{ $UserInfo->functie }}">
            </div>
          </div>
        </div>
      </div>
      {{-- Contact gedeelte --}}
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title"><strong>Contact informatie</strong></h4>
        </div>
        <div class="panel-body">
          <div class="form-group row">
            <label label for="tel1" class="col-sm-2 control-label">Tel. nr 1</label>
            <div class="col-sm-10">
              <input type="tel" name="tel1" id="tel1" class="form-control" placeholder="{{ $UserInfo->tel1 }}">
            </div>
          </div>
          <div class="form-group row">
            <label label for="tel2" class="col-sm-2 control-label">Tel. nr 2</label>
            <div class="col-sm-10">
              <input id="tel2" name="tel2" type="tel" class="form-control" placeholder="{{ $UserInfo->tel2 }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="{{ $UserInfo->email }}">
            </div>
          </div>
          <div class="form-group">
						<div class="col-xs-12">
							<br>
							<button class="btn btn-success opslaan" type="submit">Opslaan</button>
							<button class="btn btn-danger annuleren" type="reset">Annuleren</button>
						</div>
					</div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
@endsection