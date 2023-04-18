<!doctype html>
<html lang="fr">
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
                                <span>CIN:</span>
                                <span>JB123456</span>
                            </div>
                            <div>
                                <span>Email:</span>
                                <span>ismailberriss@gmail.com</span>
                            </div>
                            <div>
                                <span>GSM:</span>
                                <span>0657090441</span>
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
                                <span>CIN:</span>
                                <span>JB123456</span>
                            </div>
                            <div>
                                <span>Email:</span>
                                <span>ismailberriss@gmail.com</span>
                            </div>
                            <div>
                                <span>GSM:</span>
                                <span>0657090441</span>
                            </div>
                            <div>
                                <span>Dernier Acces:</span>
                                <span>22:25 17/04/2024</span>
                            </div>
                        </div>
                        <div class="my-box">
                            <h4>Informations Scolaires</h4>
                            <div>
                                <span>CNE:</span>
                                <span>D123456789</span>
                            </div>
                            <div>
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
            <div class="modifier">
                <div class="header">
                    <h2>Modifier Profile</h2>
                </div>
                <!-- if user is prof -->
                <!--<div class="profile-container">
                    <div class="img-box">
                        <img src="../img/professeur.jpg" alt="">
                        <h3>Ismail Berriss</h3>
                        <p>Professeur</p>
                    </div>
                    <div class="profile-content">
                        <form class="needs-validation" novalidate>
                            <div class="my-box">
                                <h4>Informations Personnalisées</h4>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" value="Berriss" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un nom.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" value="Ismail" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un prénom.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cin" class="form-label">CIN</label>
                                        <input type="text" class="form-control" id="cin" value="JB123456" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un cin.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="Email" class="form-control" id="email" aria-describedby="inputGroupPrepend" value="ismailberriss@gmail.com" required>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tel" class="form-label">GSM</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                                            <input type="tel" class="form-control" id="tel" aria-describedby="inputGroupPrepend" value="0657090441" required disabled
                                            >
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un GSM.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-box">
                                <h4>Informations Scolaires</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="specialite" class="form-label">Spécialité</label>
                                        <input type="text" class="form-control" id="specialite" required value="Data Analyst" disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer une spécialité.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="module" class="form-label">Modules</label>
                                        <select class="form-select" id="moduleSelect" multiple="" required disabled>
                                            <option selected>Analyse 1: Suites Numériques et Fonctions</option>
                                            <option selected>Algebre 1: Généralités et Arithmétique dans Z</option>
                                            <option selected>Programmation 1</option>
                                            <option selected>Algorithmique 2</option>
                                        </select>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez choisir un module.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-box">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                        <form class="needs-validation" novalidate>
                            <div class="my-box">
                                <h4>Informations Personnalisées</h4>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" value="Berriss" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un nom.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" value="Ismail" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un prénom.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cin" class="form-label">CIN</label>
                                        <input type="text" class="form-control" id="cin" value="JB123456" required disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un cin.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="Email" class="form-control" id="email" aria-describedby="inputGroupPrepend" value="ismailberriss@gmail.com" required>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tel" class="form-label">GSM</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                                            <input type="tel" class="form-control" id="tel" aria-describedby="inputGroupPrepend" value="0657090441" required disabled>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez insérer un GSM.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-box">
                                <h4>Informations Scolaires</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="cne" class="form-label">CNE</label>
                                        <input type="text" class="form-control" name="cne" id="cne" required
                                               value="D123456789" disabled>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez insérer un cne.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="filiereSelect" class="form-label">Filière</label>
                                        <select class="form-select" id="filiereSelect" name="filiereSelect" required
                                                disabled>
                                            <option selected>Science Mathématique et Informatique</option>
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
                                        <select class="form-select" id="semestreSelect" multiple="" required disabled>
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option selected>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
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
                                        <select class="form-select" id="moduleSelect" multiple="" required disabled>
                                            <option selected>Analyse 1: Suites Numériques et Fonctions</option>
                                            <option selected>Algebre 1: Généralités et Arithmétique dans Z</option>
                                            <option selected>Programmation 1</option>
                                            <option selected>Algorithmique 2</option>
                                        </select>
                                        <div class="valid-feedback">
                                            C'est bon!
                                        </div>
                                        <div class="invalid-feedback">
                                            Veuillez choisir un module.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-box">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.6.4.min.js"></script>
    <script src="../js/chosen.jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
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
