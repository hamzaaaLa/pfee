@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="{{asset('/css/style.css')}}"> 
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
@endsection
