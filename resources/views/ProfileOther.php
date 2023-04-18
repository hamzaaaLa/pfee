<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- JQuery plugin for multi-select -->
    <link rel="stylesheet" href="../css/chosen.min.css" />
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../css/Profile.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                        Ismail Berriss
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
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-power-off fa-lg"></i>
                                Déconnexion
                            </a>
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
                <!--<div class="profile-container">
                    <div class="img-box">
                        <img src="../img/professeur.jpg" alt="">
                        <h3>Ismail Berriss</h3>
                        <p>Professeur</p>
                    </div>
                    <div class="profile-content">
                        <div class="my-box">
                            <h4>Informations Personnalisées</h4>
                            <div>
                                <span>Nom Complet:</span>
                                <span>Ismail Berriss</span>
                            </div>
                            <div>
                                <span>Email:</span>
                                <span>ismailberriss@gmail.com</span>
                            </div>
                            <div>
                                <span>Dernier Acces:</span>
                                <span>22:25 17/04/2024</span>
                            </div>
                        </div>
                        <div class="my-box">
                            <h4>Informations Scolaires</h4>
                            <div>
                                <span>Spécialité:</span>
                                <span>Data Analyst</span>
                            </div>
                            <div>
                                <span>Modules:</span>
                                <span>Analyse 1: Suites Numériques et Fonctions, Algebre 1: Généralités et Arithmétique dans Z, Programmation 1, Algorithmique 2</span>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- if user is etudiant -->
                <div class="profile-container">
                    <div class="img-box">
                        <img src="../img/professeur.jpg" alt="">
                        <h3>Ismail Berriss</h3>
                        <p>Etudiant</p>
                    </div>
                    <div class="profile-content">
                        <div class="my-box">
                            <h4>Informations Personnalisées</h4>
                            <div>
                                <span>Nom Complet:</span>
                                <span>Ismail Berriss</span>
                            </div>
                            <div>
                                <span>Email:</span>
                                <span>ismailberriss@gmail.com</span>
                            </div>
                            <div>
                                <span>Dernier Acces:</span>
                                <span>22:25 17/04/2024</span>
                            </div>
                        </div>
                        <div class="my-box">
                            <h4>Informations Scolaires</h4>
                            <div style="padding-right: 10px">
                                <span>Filière:</span>
                                <span>Science Mathématique et Informatique</span>
                            </div>
                            <div>
                                <span>Semestres:</span>
                                <span>S1, S3</span>
                            </div>
                            <div>
                                <span>Modules:</span>
                                <span>Analyse 1: Suites Numériques et Fonctions, Algebre 1: Généralités et Arithmétique dans Z, Programmation 1, Algorithmique 2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>