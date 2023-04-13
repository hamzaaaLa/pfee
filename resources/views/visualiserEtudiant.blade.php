@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualiser Etudiants</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="css/HomePageAdmin.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="page">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="#">
            <img src="img/fsa_agadir.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
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
                            <li class="active">Consulter et Modifier</li>
                            <li>Ajouter Etudiant</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        Professeurs
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                    <div class="accordion-body">
                        <ul>
                            <li>Consulter et Modifier</li>
                            <li>Ajouter Professeur</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i class="fa-solid fa-book"></i>
                        Modules
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                    <div class="accordion-body">
                        <ul>
                            <li>Consulter et Modifier</li>
                            <li>Ajouter Module</li>
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
    <div class="visualiser">
<!--        <div class="container-fluid">-->
            <div class="head">
                <a href="" type="button" class="btn">
                    <img src="../img/professeur.jpg" alt="">
                    Admin
                </a>
            </div>
            <div class="content">
                <div class="header">
                    <h2>Données Etudiants</h2>
                    <div class="search">
                        <input type="search" placeholder="Saisir un CIN">
                    </div>
                    <a href="" type="button" class="btn btn-primary">Ajouter Etudiant</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Actions</th>
                            <th scope="col">CIN</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">CNE</th>
                            <th scope="col">Filière</th>
                            <th scope="col">Semestres</th>
                            {{-- <th scope="col">Modules</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($etudiant as $etudiant)
                        <tr>
                            <td>
                                <a href="">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                            <td>{{ $etudiant->user->cin }}</td>
                            <td>{{ $etudiant->user->name }} </td>
                            <td>{{ $etudiant->user->prenom }}</td>
                            <td>{{ $etudiant->user->email }}</td>
                            <td>{{ $etudiant->user->telephone }}</td>
                            <td>{{$etudiant->cne}}</td>
                            <td>{{$etudiant->filiere}}</td> 
                            <td>         
                                
                                    @foreach ($etudiant->affectation_semestre as $affectation)
                                       {{ $affectation->semestre->libelleSemestre }}<br>
                                    @endforeach
                               
                            </td>
                            {{-- <td><img src="data:image/jpg;base64,{{ $etudiant->imageProfile }}" width="100"></td> --}}
                           
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>

@endsection