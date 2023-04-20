<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter Etudiant</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/HomePageAdmin.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="page">
    @if(session('message'))
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Start Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="#">
            <img src="../img/fsa_agadir.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
            FSA-Online
        </a>
        <div class="accordion" id="accordionExample">
            <a href="{{route('admineHome')}}">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Etudiants</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body test">
                        <ul>
                            <li><a href="{{route('afficheEtud')}}">Consulter et Modifier</a></li>
                            <li><a href="{{route('ajoutEtud')}}">Ajouter Etudiant</a></li>
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
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <i class="fa-solid fa-book"></i>
                        Modules
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{route('afficheModule')}}">Consulter et Modifier</a></li>
                            <li class="active"><a href="{{route('ajouterModuleView')}}">Ajouter Module</a></li>
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
    <!-- End Sidebar -->
    <!-- Start Formulaire -->
    <div class="Ajouter page-content">
        <div class="head">
            <a href="" type="button" class="btn">
                <img src="../img/professeur.jpg" alt="">
                Admin
            </a>
        </div>
        <div class="content">
            <div class="header">
                <h2>Ajouter Module</h2>
            </div>
            <form class="row g-3 needs-validation" action="{{route('ajouterModule')}}" method="post" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="libelle" class="form-label">Libellé</label>
                    <input type="text" class="form-control" name="libelle" id="libelle" required value="{{old('libelle')}}">
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez insérer un libellé.
                    </div>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <label for="semestre" class="form-label">Semestres</label>
                    <select class="form-select" id="semestreSelect" name="semestreSelect" required>
                        <option selected disabled value="">Choisir...</option>
                        @foreach($semestres as $key){
                            <option >{{$key->libelleSemestre}}</option>
                        }@endforeach
                    </select>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez choisir un semestre.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="professeur" class="form-label">Professeur</label>
                    <select class="form-select" name="professeur" id="professeur" required>
                        <option selected disabled value="">Choisir...</option>
                        @foreach($professeur as $professeur)
                            <option>{{ $professeur->user->name }} {{ $professeur->user->prenom }}</option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez choisir un professeur.
                    </div>
                </div>
                <div class="col-12 submit">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                    <a href="{{route('afficheModule')}}" class="btn btn-danger">Anuuler</a>
                </div>
            </form>
        </div>
    </div>
    <!-- End Formulaire -->
</div>
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
</body>
</html>
