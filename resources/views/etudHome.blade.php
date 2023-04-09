@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" src="{{asset('images/fsa_agadir.png')}}" type="image/x-icon">
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

<!-- End Header -->
<!-- Start Dashboard -->

<!-- Start Header -->

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
                            <img src="{{asset('/images/bd.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Bases de Données</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Mustapha Machkour</a>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>
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
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('/images/coo.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Conception Orienté Objet</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Ayoub Sebraoui</a>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="{{asset('images/poo.png"')}} class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="card-title">Programmation Orienté Objet</a>
                                <p class="card-text">
                                    Enseignant: <a href="">Said Charfi</a>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>
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
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
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
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
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
                    <a class="btn btn-light" href="#" role="button">Créer annonce</a>
                </div>
                <ul>
                    <li>
                        <img src="{{asset('/images/professeur.jpg')}}" alt="">
                        <div class="annonce-text">
                            <a href="">Abdellah BOULOUZ</a>
                            <p class="subject"><span>Sujet: </span>Séance d'avancement</p>
                            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, perspiciatis, veniam. Accusantium aliquam commodi libero nulla!</p>
                            <span>18:01 02/04/2023</span>
                        </div>
                    </li>
                    <li>
                        <img src="../img/professeur.jpg" alt="">
                        <div class="annonce-text">
                            <a href="">Abdellah BOULOUZ</a>
                            <p class="subject"><span>Sujet: </span>Séance d'avancement</p>
                            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, perspiciatis, veniam. Accusantium aliquam commodi libero nulla!</p>
                            <span>18:01 02/04/2023</span>
                        </div>
                    </li>
                    <li>
                        <img src="../img/professeur.jpg" alt="">
                        <div class="annonce-text">
                            <a href="">Abdellah BOULOUZ</a>
                            <p class="subject"><span>Sujet: </span>Séance d'avancement</p>
                            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, perspiciatis, veniam. Accusantium aliquam commodi libero nulla!</p>
                            <span>18:01 02/04/2023</span>
                        </div>
                    </li>
                    <li>
                        <img src="../img/professeur.jpg" alt="">
                        <div class="annonce-text">
                            <a href="">Abdellah BOULOUZ</a>
                            <p class="subject"><span>Sujet: </span>Séance d'avancement</p>
                            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, perspiciatis, veniam. Accusantium aliquam commodi libero nulla!</p>
                            <span>18:01 02/04/2023</span>
                        </div>
                    </li>
                    <li>
                        <img src="../img/professeur.jpg" alt="">
                        <div class="annonce-text">
                            <a href="">Abdellah BOULOUZ</a>
                            <p class="subject"><span>Sujet: </span>Séance d'avancement</p>
                            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, perspiciatis, veniam. Accusantium aliquam commodi libero nulla!</p>
                            <span>18:01 02/04/2023</span>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Announcements -->
        </div>
    </div>
</div>
<!-- End Dashboard -->
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>
@endsection