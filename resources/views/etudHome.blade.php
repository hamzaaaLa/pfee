

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('../img/fsa_agadir.png')}}" type="image/x-icon">
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
<nav class="navbar navbar-expand-lg header">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/fsa_agadir.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
            FSA-Online
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        Tableau de bord
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Formations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        A propos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contactez-nous
                    </a>
                </li>
            </ul>
            <div class="dropdown" >
                <button class="btn dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../img/fsa_agadir.png" alt="" width="40" height="30" >
                        {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-user"></i>
                            Profile
                        </a>
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
<!-- Start Dashboard -->
<div class="dashboard">
    <!--<div class="custom-shape-divider-bottom-1680448949">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>-->
    <div class="container">
        <div class="holder">
            <!-- Start Courses -->
            <div class="courses">
                <div class="section-header">
                    <h3>Modules</h3>
                    <a class="btn btn-light" href="#" role="button">Voir tous</a>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('/img/bd.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="#" class="card-title">Bases de Données</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Mustapha Machkour</a>
                                </p>
                                {{--<div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('../img/compilation.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Compilation</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Mustapha Machkour</a>
                                </p>
                                {{--<div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('/img/coo.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Conception Orienté Objet</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Ayoub Sebraoui</a>
                                </p>
                                {{--<div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('/img/poo.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Programmation Orienté Objet</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Said Charfi</a>
                                </p>
                                {{--<div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('../img/ro.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Recharche Opérationnelle</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Fouad El Ouafdi</a>
                                </p>
                                {{--<div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="../img/rsx.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Réseau Informatique</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Abdellah BOULOUZ</a>
                                </p>
                                {{--<div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Courses -->
            <!-- Start Announcements -->
            <div class="announcements">
                <div class="section-header">
                    <h3>Annonces</h3>
                    @if(Auth::user()->type=='prof')
                        {{-- <a class="btn btn-light" href="#" role="button">Créer annonce</a> --}}
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Créer Annonce
                        </button>
                    @endif
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="false" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Créer Annonce</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3 needs-validation" action="{{route('annonce.store')}}" method="post" novalidate>
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="titreInput" class="form-label">Titre</label>
                                            <input type="text" name="titre" class="form-control" id="titreInput" required>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un titre.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTextarea" class="form-label">Contenue</label>
                                            <textarea class="form-control" name="contenue"
                                                      id="validationTextarea"
                                                      rows="5" required></textarea>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer du context.
                                            </div>
                                        </div>
                                        {{-- Filiere --}}
                                        <div class="mb-3">
                                            <label for="filiere" class="form-label">Filière</label>
                                            <select class="form-select" name="filiereSelect" id="filiereSelect" required>
                                                <option selected disabled value="">Choisir...</option>
                                                     @foreach($filieres as $key){
                                                         <option >{{$key->libellefiliere}}</option>
                                                     }@endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez choisir une filière.
                                            </div>
                                        </div>
                                        {{-- Module --}}
                                        <div class="mb-3">
                                            <label for="module" class="form-label">Modules</label>
                                            <select class="form-select" name="moduleSelect" id="moduleSelect" required>
                                                <option selected disabled value="">Choisir...</option>
                                            </select>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez choisir un module.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                        <button type="button" class="btn btn-primary"><input
                                                    type="submit" value="Créer"></button>
                                                {{-- <button type="submit" class="btn btn-primary">Créer</button> --}}
                                    </div>
                                </form>
         
                            </div>
                        </div>
                    </div>
                </div>
                <ul>
                    @foreach($annonces as $annonce)
                        <li>
                                <img src="{{asset('/img/professeur.jpg')}}" alt="">
                                <div class="annonce-text">
                                    <a href="">{{ $annonce->professeur->user->name }}</a>
                                    <p class="subject"><span>Sujet: </span>{{ $annonce->titre }}</p>
                                    <p class="content">{{ $annonce->contenue }}</p>
                                    <span>{{ date('H:i d/m/Y', strtotime($annonce->datecreation)) }}</span>
                                </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End Announcements -->
        </div>
    </div>
</div>
<!-- End Dashboard -->
<script src="/js/jquery-3.6.4.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/all.min.js"></script>
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
    var filiereSelect = document.getElementById("filiereSelect");
    var moduleSelect = $("#moduleSelect");
    
    filiereSelect.addEventListener("change", updateModule);

    function updateModule() {
        var filiere = filiereSelect.value;
        console.log(filiere);

        $.ajax({
            url: "/prof/dashboard/get-modules",
            type: 'POST',
            data: {
                'selectedFiliere': filiere,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                moduleSelect.html("");

                for(var i = 0; i < response.length; i++) {
                    var option = $("<option>").text(response[i].libelleModule).val(response[i].libelleModule);
                        moduleSelect.append(option);
                }

            }
        });
    }
</script>
</body>
</html>


