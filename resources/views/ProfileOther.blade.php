<!doctype html>
<html lang="en">
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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/img/fsa_agadir.png')}}" alt="" width="35" height="35" class="d-inline-block align-text-top">
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
                        <img src="{{asset('/img/professeur.jpg')}}" alt="">
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
                                <span>Email:</span>
                                <span>{{$prof->email}}</span>
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
                <!-- if user is etudiant
                <div class="profile-container">
                    <div class="img-box">
                        <img src="{{asset('/img/professeur.jpg')}}" alt="">
                        <h3>{{$prof->name}} {{$prof->prenom}}</h3>
                        <p>Etudiant</p>
                    </div>
                    <div class="profile-content">
                        <div class="my-box">
                            <h4>Informations Personnalisées</h4>
                            <div>
                                <span>Nom Complet:</span>
                                <span>{{$prof->name}} {{$prof->prenom}}</span>
                            </div>
                            <div>
                                <span>Email:</span>
                                <span>{{$prof->email}}</span>
                            </div>
                            <div>
                                <span>Dernier Acces:</span>
                                <span>{{$prof->dernierAcces}}</span>
                            </div>
                        </div>
                        <div class="my-box">
                            <h4>Informations Scolaires</h4>
                            <div style="padding-right: 10px">
                                <span>Filière:</span>
                                <span>{{$prof->specialite}}</span>
                            </div>
                            <div>
                                <ul>
                                    <span>Semestres:</span>
                                    {{-- @foreach($semestre as $key) --}}
                                    <li>{{$key->libelleSemestre}}</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <span>Modules:</span>
                                    {{-- @foreach($module as $key) --}}
                                    <li>{{$key->libelleModule}}</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/all.min.js')}}"></script>
</body>
</html>
