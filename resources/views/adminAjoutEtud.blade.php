{{--@extends('layouts.app')--}}
{{--@section('content')--}}
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ajouter Etudiant</title>
        <!-- JQuery plugin for multi-select -->
        <link rel="stylesheet" href="../css/chosen.min.css" />
        <!-- Website favicon-->
        <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
        <!-- Bootstrap 05 -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Main CSS File -->
        <link rel="stylesheet" href="../css/HomePageAdmin.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../css/all.min.css" />
        <!-- Google Fonts - Open Sans -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @if(session('message'))
                    <div class="alert alert-{{ session('status') }} alert-dismissible fade show mt-3" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        <div id="frm">

        <form name="f1" action="{{route('ajouterEtudiant')}}" method = "POST">

            @csrf
            <p>
            <label>Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                         @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </p>

            <p>
            <label>Prenom:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" placeholder="Prenom" value="{{old('prenom')}}">
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
            </p>
            <p>
            <label>Email:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
            </p>
            <p>
                <label>CNE:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control @error('cne') is-invalid @enderror" id="cne" name="cne" placeholder="CNE" value="{{old('cne')}}">
                             @error('cne')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </p>
            <p>
            <input type="submit" id="btn" value="Envoyer">
            </p>
        </form>
    </div>

</body>
</html>
{{--@endsection--}}
