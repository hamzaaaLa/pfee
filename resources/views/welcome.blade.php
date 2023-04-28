<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>FSA-Online</title>
        <!-- Website favicon-->
        <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
        <!-- Bootstrap 05 -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{asset('/css/Welcome.css')}}" />
        <!-- Google Fonts - Work Sans -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
    </head>
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
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-outline-success" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                    @endif
                @endguest
            </div>
        </div>
    </nav>
    <!-- End Header -->
    <!-- Start Landing Page -->
    <div class="landing-page" id="landing-page">
        <div class="container">
            <div class="custom-shape-divider-bottom-1682154630">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
            <div class="content">
                <div class="text">
                    <h1>Bienvenue sur FSA-Online</h1>
                    <p>La palteforme adéquate pour une efficace formation à distance</p>
                </div>
                <div class="img-container">
                    <img src="../img/University-Life-Illustration-1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Page -->
    <!-- Start Features -->
    <div class="features">
        <h2>Qu'est ce que nous assurons?</h2>
        <div class="container">
            <div class="box-container">
                <div class="box">
                    <i class="fa-regular fa-comments"></i>
                    <h5>Connéctivité</h5>
                    <p>Elaborer des discussions, un excellent moyen pour interagir et échanger les idées</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-users"></i></i>
                    <h5>Gestion des Ressources Humaines</h5>
                    <p>On vous aide à prendre la main de contrôle sur toutes les informations</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-wifi"></i>
                    <h5>Ressources Educatives</h5>
                    <p>Créer un espace pédagogique riche en informations reste toujours notre but ultime</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-check-double"></i>
                    <h5>Simplicité</h5>
                    <p>Notre objectif est de vous faciliter le processus.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->
    <!-- Start Stats -->
    <div class="stats">
        <div class="fancy">
            <span class="top-key">< /span>
            <span class="text">Nos Statistiques</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </div>
        <div class="info">
            <div class="box">
                <i class="fa-solid fa-user fa-2x"></i>
                <span class="number">{{$etud}}</span>
                <span class="text">Etudiants</span>
            </div>
            <div class="box">
                <i class="fa-solid fa-user fa-2x"></i>
                <span class="number">{{$prof}}</span>
                <span class="text">Professeurs</span>
            </div>
            <div class="box">
                <i class="fa-solid fa-book fa-2x"></i>
                <span class="number">{{$mod}}</span>
                <span class="text">Modules</span>
            </div>
        </div>
    </div>
    <!-- End Stats -->
    <!-- Start Footer -->
    <div class="footer">
        <div class="container">
            <div class="content">
                <div class="site-info">
                    <h3>FSA-Online</h3>
                    <p>La palteforme adéquate pour une efficace formation à distance</p>
                    <ul>
                        <li>
                            <a href="#" class="facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="site-address">
                    <h3>Adresse</h3>
                    <div class="box">
                        <i class="fa-solid fa-location-arrow"></i>
                        <div class="info">
                            BP 8106 - Cité Dakhla Agadir -  Agadir 80000
                        </div>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-phone"></i>
                        <div class="info">
                            0528220957
                        </div>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-envelopes-bulk"></i>
                        <div class="info">
                            fsa.online.support@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/all.min.js"></script>
    </body>
</html>
