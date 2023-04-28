<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
    <!-- JQuery plugin for multi-select -->
    <link rel="stylesheet" href="{{asset('/css/chosen.min.css')}}" />
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/Profile.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Work Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
</head>
<body>
    <!-- Start Header -->
    <nav class="navbar navbar-expand-lg header">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/img/fsa_agadir.png')}}" alt="" width="40" height="30" class="d-inline-block align-text-top">
                FSA-Online
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ url('/home') }}">
                                Tableau de bord
                            </a>
                        @endauth
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">
                                Tableau de bord
                            </a>
                        @endguest
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contactez-nous
                        </a>
                    </li>
                </ul>
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_image_url}}" alt="">
                            {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            @php
                            $id_user=Auth::user()->id_user
                            @endphp
                            @if(Auth::user()->type=='prof')
                                <a class="dropdown-item" href="{{route('profProfile',Auth::user()->id_user)}}">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>
                            @else
                                <a class="dropdown-item" href="{{route('etudiantProfile',Auth::user()->id_user)}}">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>
                            @endif
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-power-off fa-lg"></i>
                                {{ __('Déconnexion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Header -->
    <div class="profile">
        <div class="container">
            <div class="visualiser">
                <div class="header">
                    <h2>Profile</h2>
                </div>
                <!-- if user is prof -->
                <div class="profile-container">
                    <div class="img-box">
                        <img src="{{$prof->profile_image_url}}" alt="">
                        <h3>{{$prof->name}} {{$prof->prenom}}</h3>
                        <p>Professeur</p>
                    </div>
                    <div class="profile-content">
                        <div class="my-box">
                            <h4>Informations Personnalisées</h4>
                            <div>
                                <span>Nom Complet:</span>
                                <span>{{$prof->name}} {{$prof->prenom}}</span>
                            </div>
                            <div>
                                <span>CIN:</span>
                                <span>{{$prof->cin}}</span>
                            </div>
                            <div>
                                <span>Email:</span>
                                <span>{{$prof->email}}</span>
                            </div>
                            <div>
                                <span>GSM:</span>
                                <span>{{$prof->telephone}}</span>
                            </div>
                            <div>
                                <span>Dernier Acces:</span>
                                <span>{{$prof->dernierAcces}}</span>
                            </div>
                        </div>
                        <div class="my-box">
                            <h4>Informations Scolaires</h4>
                            <div>
                                <span>Spécialité:</span>
                                <span>{{$prof->specialite}}</span>
                            </div>
                            <div>
                                <ul>
                                    <span>Modules:</span>
                                    @foreach($module as $key)
                                    <li>{{$key->libelleModule}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modifier">
                <div class="header">
                    <h2>Modifier Profile</h2>
                </div>
                <div class="profile-container">
                    <div class="img-box">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{$prof->profile_image_url}}" alt="">
                            <div class="img-modif">
                                <i class="fa-solid fa-pen"></i>
                                Modifier
                            </div>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="needs-validation" enctype="multipart/form-data" method="post" action="{{route('profModifierPhoto',$prof->id_user)}}" novalidate>
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier l'image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col">
                                                <label for="image" class="form-label">Image:</label>
                                                <input type="file" class="form-control" id="image" name="image" required>
                                                <div class="valid-feedback">
                                                    C'est bon!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez insérer une image.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h3>{{$prof->name}} {{$prof->prenom}}</h3>
                        <p>Professeur</p>
                    </div>
                    <div class="profile-content">
                        <form class="needs-validation" action="{{route('profModifierProfile',$prof->id_user)}}" method="post" novalidate>
                            @csrf
                            <div class="my-box">
                                <h4>Informations Personnalisées</h4>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" value="{{$prof->name}}" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un nom.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" value="{{$prof->prenom}}" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un prénom.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cin" class="form-label">CIN</label>
                                        <input type="text" class="form-control" id="cin" value="{{$prof->cin}}"required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un cin.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="Email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" value="{{$prof->email}}" required>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tel" class="form-label">GSM</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                                            <input type="tel" class="form-control" id="tel" aria-describedby="inputGroupPrepend" value="{{$prof->telephone}}" required disabled
                                            >
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un GSM.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-box">
                                <h4>Informations Scolaires</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="specialite" class="form-label">Spécialité</label>
                                        <input type="text" class="form-control" id="specialite" required value="{{$prof->specialite}}" disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer une spécialité.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="module" class="form-label">Modules</label>
                                        <select class="form-select" id="moduleSelect" multiple="" required disabled>
                                            @foreach($module as $key)
                                            <option selected>{{$key->libelleModule}} </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez choisir un module.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-box">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script src="{{asset('/js/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/all.min.js')}}"></script>
    <script>
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        $(document).ready(function () {
            $("#semestreSelect").chosen();
            $("#moduleSelect").chosen();
        });
    </script>
</body>
</html>
