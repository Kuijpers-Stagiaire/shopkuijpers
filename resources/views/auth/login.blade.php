@extends('layouts.login')
@section('content')

<div class="login-container">
    <div class="login-section-left">
        <div class="login-section-left-1">
            <div class="login-section-left-1-header-1">
                <div style="margin-top: -30px;">
                    <img src="{{ asset('img/logo-small.png') }}" width="50">
                </div>
                <div>
                    <p>Kuijpers</p>
                    <p class="small">Energieneutrale en gezonde installaties</p>
                </div>
            </div>
            <div class="login-section-left-1-header-2">
                <div style="margin-top: -30px;">
                    <img src="{{asset('storage/Images/Logos/ShopKuijpers.png')}}" width="50">
                </div>
                <div>
                    <p>Shopkuijpers</p>
                    <p class="small">Levering Producten</p>
                </div>
            </div>

        </div>
        <div class="login-section-left-2">
            <?php
                    // I'm India so my timezone is Asia/Calcutta
                    date_default_timezone_set('Europe/Amsterdam');

                    // 24-hour format of an hour without leading zeros (0 through 23)
                    $Hour = date('G');

                    if ( $Hour >= 5 && $Hour <= 11 ) {
                        echo "<p class='big'>Goedemorgen!</p>";
                    } else if ( $Hour >= 12 && $Hour <= 18 ) {
                        echo "<p class='big'>Goedemiddag!</p>";
                    } else if ( $Hour >= 19 || $Hour <= 4 ) {
                        echo "<p class='big'>Goedenavond!</p>";
                    }
                    ?>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input aria-label="E-mail adres" id="email" type="email" placeholder="E-Mail"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" autofocus>
                    </div>
                    @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input aria-label="Wachtwoord" id="password" type="password" placeholder="Wachtwoord"
                            name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password">
                    </div>
                    @if ($errors->has('password'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div>
                <br>
                <button aria-label="Inloggen" type="submit" class="btn btn-lg login" name="submit" id="myBtn"
                    data-toggle="popup1">
                    {{ __('Inloggen') }}
                </button>
            </form>
        </div>
        <div class="login-section-left-3">
            <p class="small">®Kuijpers 2019</p>
        </div>
        <div class="login-section-left-4">
            @if (Route::has('password.request'))
            <a class="btn btn-link forgot" href="{{ route('password.request') }}">
                {{ __('Wachtwoord vergeten?') }}
            </a>
            @endif
        </div>
    </div>
</div>

@endsection
