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
            
        <form name="f1" action="{{route('updateEtud',$etudiant->id_etud)}}" method = "POST">
           
            @csrf
            
            <p>
            <label>Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{$etudiant->nom}}">
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
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom"  value="{{$etudiant->prenom}}">
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
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{$etudiant->email}}">
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
                <input type="text" class="form-control @error('cne') is-invalid @enderror" id="cne" name="cne"  value="{{$etudiant->cne}}">
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