<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tous Modules</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/HomePage.css')}}" />
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
                        <img src="{{ Auth::user()->profile_image_url}}" alt="" width="40" height="30" >
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
    <div class="more">
        <div class="container">
            <div class="header">
                <h1>Tous les Modules</h1>
            </div>
            <div class="row justify-content-center">
                @php
                /*for($i=0;$i<$moduleAct->count();$i++)
                if($moduleAct[$i]->semestre<$moduleAct[$i+1]->semestre);
                $moduleMin=$moduleAct[$i]->semestre;*/
                for($i=0;$i<$moduleAct->count();$i++){
                    $semestre[$i]=$moduleAct[$i]->semestre;
                }
                $minSemestre=min($semestre);
                @endphp
                @foreach($moduleAct as $key)
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{$key->module_image_url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="content">

                                <p class="card-title">{{$key->libelleModule}}</p>
                                <p class="card-text">
                                    @foreach($profs as $prof)
                                    @if($prof->id_module==$key->id_module)
                                    <a href="{{route('etudProfProfile',$prof->id_user)}}">{{$prof->name}} {{$prof->prenom}}</a>
                                    @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="acceder">
                                <a href="{{route('etud.EspaceCours', $key->id_module)}}">Visiter</a>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($allModule as $key)

                @if($key->semestre<$minSemestre)

                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{$key->module_image_url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="content">

                                <p class="card-title">{{$key->libelleModule}}</p>
                                <p class="card-text">
                                    @foreach($profs as $prof)
                                    @if($prof->id_module==$key->id_module)
                                    <a href="{{route('etudProfProfile',$prof->id_user)}}">{{$prof->name}} {{$prof->prenom}}</a>
                                    @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="acceder">
                                <a href="EspaceCours.php">Visiter</a>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start More -->
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/all.min.js')}}"></script>
    <!-- End More -->
</body>
</html>
