<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/HomePageAdmin.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Work Sans -->
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap')}}" rel="stylesheet" />
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/img/fsa_agadir.png')}}" alt="" width="35" height="35" class="d-inline-block align-text-top">
                FSA-Online
            </a>
            <div class="accordion" id="accordionExample">
                <a href="{{route('admineHome')}}" class="active">
                    <i class="fa-regular fa-chart-bar fa-fw"></i>
                    <span>Dashboard</span>
                </a>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="fa-solid fa-user-check"></i>
                            Administrateurs
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                        <div class="accordion-body">
                            <ul>
                                <li><a href="{{route('afficheAdminView')}}">Consulter et Modifier</a></li>
                                <li><a href="{{route('ajouterModuleView')}}">Ajouter Administrateur</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Etudiant</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                        <div class="accordion-body test">
                            <ul>
                                <li><a href="{{route('afficheEtud')}}">Consulter et Modifier</a></li>
                                <li><a href='{{route('ajoutEtud')}}'>Ajouter Etudiant</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            Professeurs
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            <ul>
                                <li><a href="{{route('afficheProf')}}">Consulter et Modifier</a></li>
                                <li><a href="{{route('ajouterProfView')}}">Ajouter Professeur</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fa-solid fa-book"></i>
                            Modules
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                        <div class="accordion-body">
                            <ul>
                                <li><a href="{{route('afficheModule')}}">Consulter et Modifier</a></li>
                                <li><a href="{{route('ajouterModuleView')}}">Ajouter Module</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="{{route('adminProfile',Auth::user()->id_user)}}">
                    <i class="fa-solid fa-user"></i>
                    Profile
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-power-off fa-lg"></i>

                    {{ __('Déconnexion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="dashboard page-content">
            <div class="head">
                <a href="{{route('adminProfile', Auth::user()->id_user)}}" class="btn">
                    <img src="{{Auth::user()->profile_image_url}}" alt="">
                    {{Auth::user()->name}} {{Auth::user()->prenom}}
                </a>
            </div>
            <div class="content">
                <div class="header">
                    <h2>Tableau de bord</h2>
                </div>
                <div class="info">
                    <a class="box" href="{{route('afficheEtud')}}">
                        <i class="fa-solid fa-user-check fa-2x"></i>
                        <span class="number">{{$admin}}</span>
                        <span class="text">Administrateurs</span>
                    </a>
                    <a class="box" href="{{route('afficheEtud')}}">
                        <i class="fa-solid fa-graduation-cap fa-2x"></i>
                        <span class="number">{{$etud}}</span>
                        <span class="text">Etudiants</span>
                    </a>
                    <a class="box" href="{{route('afficheProf')}}">
                        <i class="fa-solid fa-chalkboard-user fa-2x"></i>
                        <span class="number">{{$prof}}</span>
                        <span class="text">Professeurs</span>
                    </a>
                    <a class="box" href="{{route('afficheModule')}}">
                        <i class="fa-solid fa-book fa-2x"></i>
                        <span class="number">{{$mod}}</span>
                        <span class="text">Modules</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/all.min.js"></script>
</body>
</html>
