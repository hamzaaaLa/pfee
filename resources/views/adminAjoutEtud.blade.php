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
        <link rel="stylesheet" href="/css/chosen.min.css" />
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
                    <a href="DashboardAdmin.php">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span>Etudiants</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                            <div class="accordion-body test">
                                <ul>
                                    <li><a href="VisualiserEtudiant.php">Consulter et Modifier</a></li>
                                    <li class="active"><a href="AjouterEtudiant.php">Ajouter Etudiant</a></li>
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
                                    <li><a href="VisualiserProf.php">Consulter et Modifier</a></li>
                                    <li><a href="AjouterProfesseur.php">Ajouter Professeur</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="fa-solid fa-book"></i>
                                Modules
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="VisualiserModule.php">Consulter et Modifier</a></li>
                                    <li><a href="AjouterModule.php">Ajouter Module</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="DashboardAdmin.php">
                        <i class="fa-solid fa-user"></i>
                        Profile
                    </a>
                    <a href="DashboardAdmin.php">
                        <i class="fa-solid fa-power-off fa-lg"></i>
                        Déconnexion
                    </a>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="Ajouter page-content">
                <div class="head">
                    <a href="" type="button" class="btn">
                        <img src="../img/professeur.jpg" alt="">
                        Admin
                    </a>
                </div>
                <div class="content">
                    <div class="header">
                        <h2>Ajouter Etudiant</h2>
                    </div>
                    <form name="f1" class="row g-3 needs-validation" action="{{route('ajouterEtudiant')}}" method = "POST" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="name" id="name" required value="{{old('name')}}">
                            <div class="valid-feedback">
                                C'est bon!
                            </div>
                            <div class="invalid-feedback">
                                Veuillez insérer un nom.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" required value="{{old('prenom')}}">
                            <div class="valid-feedback">
                                C'est bon!
                            </div>
                            <div class="invalid-feedback">
                                Veuillez insérer un prénom.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="Email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" required value="{{old('email')}}">
                                <div class="valid-feedback">
                                    C'est bon!
                                </div>
                                <div class="invalid-feedback">
                                    Veuillez insérer un email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" name="cin" id="cin" required value="{{old('cin')}}">
                            <div class="valid-feedback">
                                C'est bon!
                            </div>
                            <div class="invalid-feedback">
                                Veuillez insérer un cin.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cne" class="form-label">CNE</label>
                            <input type="text" class="form-control" name="cne" id="cne" required value="{{old('cne')}}">
                            <div class="valid-feedback">
                                C'est bon!
                            </div>
                            <div class="invalid-feedback">
                                Veuillez insérer un cne.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tel" class="form-label">GSM</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                                <input type="tel" class="form-control" name="tel" id="tel" aria-describedby="inputGroupPrepend" required>
                                <div class="valid-feedback">
                                    C'est bon!
                                </div>
                                <div class="invalid-feedback">
                                    Veuillez insérer un GSM.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="filiere" class="form-label">Filière</label>
                            <select class="form-select" id="filiereSelect" name="filiereSelect" required>
                                <option selected disabled value="">Choisir...</option>
                                <option>Sience Mathématique et Informatique</option>
                                <option>Sience Mathématisue Appliqués</option>
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
                            <select class="form-select" id="semestreSelect" name="semestreSelect" multiple="" required>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>S4</option>
                                <option>S5</option>
                                <option>S6</option>
                            </select>
                            <div class="valid-feedback">
                                C'est bon!
                            </div>
                            <div class="invalid-feedback">
                                Veuillez choisir un semestre.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="module" class="form-label">Modules</label>
                            <select class="form-select" id="moduleSelect" name="moduleSelect" multiple="" required>
                                <option>Module 1</option>
                                <option>Module 2</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                                <option>Module 3</option>
                            </select>
                            <div class="valid-feedback">
                                C'est bon!
                            </div>
                            <div class="invalid-feedback">
                                Veuillez choisir un module.
                            </div>
                        </div>
                        <div class="col-12 submit">
                            <input class="btn btn-primary" type="submit" value="Ajouter" onclick="sendDate()" />
                            <a href="VisualiserEtudiant.php" class="btn btn-danger">Anuuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="/js/jquery-3.6.4.min.js"></script>
        <script src="/js/chosen.jquery.min.js"></script>
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
            $(document).ready(function () {
                $("#semestreSelect").chosen();
                $("#moduleSelect").chosen();
            });
        </script>
    </body>
</html>
{{--@endsection--}}
