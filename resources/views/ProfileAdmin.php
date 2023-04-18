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
    <link rel="stylesheet" href="../css/ProfileAdmin.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css" />
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
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Etudiants</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                        <div class="accordion-body test">
                            <ul>
                                <li><a href="VisualiserEtudiant.php">Consulter et Modifier</a></li>
                                <li><a href="AjouterEtudiant.php">Ajouter Etudiant</a></li>
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
                <a href="DashboardAdmin.php" class="active">
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
        <!-- Start Profile -->
            <div class="page-content">
                <div class="head">
                    <a href="" type="button" class="btn">
                        <img src="../img/professeur.jpg" alt="">
                        Admin
                    </a>
                </div>
                <div class="profile content">
                    <div class="visualiser">
                        <div class="header">
                            <h2>Profile</h2>
                        </div>
                        <div class="profile-container">
                            <div class="img-box">
                                <img src="../img/professeur.jpg" alt="">
                                <h3>Ismail Berriss</h3>
                                <p>Administrateur</p>
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
                                    <h4>Informations Professionnelles</h4>
                                    <div>
                                        <span>Date d'embauche:</span>
                                        <span>18/04/2023</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modifier">
                        <div class="header">
                            <h2>Modifier Profile</h2>
                        </div>
                        <div class="profile-container">
                            <div class="img-box">
                                <img src="../img/professeur.jpg" alt="">
                                <h3>Ismail Berriss</h3>
                                <p>Administrateur</p>
                            </div>
                            <div class="profile-content">
                                <form class="needs-validation" novalidate>
                                    <div class="my-box">
                                        <h4>Informations Personnalisées</h4>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="nom" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="nom" value="Berriss" required>
                                                <div class="valid-feedback">
                                                    C'est bon!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez insérer un nom.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="prenom" class="form-label">Prénom</label>
                                                <input type="text" class="form-control" id="prenom" value="Ismail" required>
                                                <div class="valid-feedback">
                                                    C'est bon!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez insérer un prénom.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cin" class="form-label">CIN</label>
                                                <input type="text" class="form-control" id="cin" value="JB123456" required>
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
                                                    <input type="tel" class="form-control" id="tel" aria-describedby="inputGroupPrepend" value="0657090441" required>
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
                                        <h4>Informations Professionnelles</h4>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="dateEmbauche" class="form-label">Date d'embauche</label>
                                                <input type="text" class="form-control" name="dateEmbauche"
                                                       id="dateEmbauche"
                                                       required
                                                       value="18/04/2023">
                                                <div class="valid-feedback">
                                                    C'est bon!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez insérer une date valide.
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
        <!--<div class="modifier">
            <div class="header">
                <h2>Modifier Profile</h2>
            </div>
        </div>-->
        <!-- End Profile -->
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