@extends('layouts.app')

@section('content')
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <title>LogIn</title>
        <!-- Website favicon-->
        <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
        <!-- Bootstrap 05 -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../css/all.min.css" />
        <!-- Main CSS File -->
        <link rel="stylesheet" href="../css/LogInUser.css" />
        <!-- Google Fonts - Work Sans -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="login">
            <div class="container">
                <form method="POST" action="{{ route('login') }}" class="form-login">
                    @csrf
                    <div class="header">FSA-Online</div>
                    <div class="inputs">
                        <input placeholder="Nom d'utilisateur" class="inputs form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input placeholder="Mot de passe" class="input form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="checkbox-container">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" id="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            </label>
                            <label for="checkbox" class="checkbox-text">Se souvenir de moi</label>
                        </div>
                        <button class="sigin-btn">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection

