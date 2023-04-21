<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum - Bases de Données</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../css/Forum.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Start Header -->
    <nav class="navbar navbar-expand-lg">
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
                            <a class="dropdown-item" href="Profile.php">
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
    <div class="forum">
        <div class="container">
            <div class="header">
                <h1>Discussion - Bases de Données 2</h1>
            </div>
            <div class="content">
                <div class="add-container">
                    <!-- Question -->
                    <button class="add-btn" type="button" data-bs-toggle="modal" data-bs-target="#coursModal">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                            Ajouter une publication
                        </span>
                    </button>
                    <!-- Modal Cours -->
                    <div class="modal fade" id="coursModal" tabindex="-1" aria-labelledby="postModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="postModalLabel">Ajouter une publication</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 needs-validation" action="" method="post" novalidate>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="titre" class="form-label">Titre</label>
                                                <input type="text" name="titre" class="form-control" id="titre" required>
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-primary"><input type="submit" value="Ajouter"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="posts">
                    <a class="box" href="">
                        <div class="img-container">
                            <img src="../img/professeur.jpg" alt="">
                            <span>Ismail Berriss<span>.</span></span>
                            <span>Il ya 1 heure</span>
                        </div>
                        <div class="post-content">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus malesuada et ipsum non malesuada. Nullam nec vestibulum augue, eget placerat nisl. Aenean nec lectus ut nunc malesuada vulputate. Sed dignissim, tortor id mollis ullamcorper, dui ipsum aliquet purus, sed ornare velit dui nec libero. Mauris sit amet ex purus. In interdum urna at augue sollicitudin, nec mollis tellus efficitur. Sed laoreet nunc odio, sed sollicitudin lacus bibendum quis. Nulla euismod enim eget est interdum, non consectetur diam viverra. Nam quam est, varius eu ultricies eget, tempor id quam. Nulla justo orci, suscipit id tristique at, fermentum convallis quam.</p>
                            <div class="reply">
                                <i class="fa-regular fa-comment"></i>
                                <span>12 Responses</span>
                            </div>
                        </div>
                    </a>
                    <a class="box">
                        <div class="img-container">
                            <img src="../img/professeur.jpg" alt="">
                            <span>Ismail Berriss<span>.</span></span>
                            <span>Il ya 1 heure</span>
                        </div>
                        <div class="post-content">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus malesuada et ipsum non malesuada. Nullam nec vestibulum augue, eget placerat nisl. Aenean nec lectus ut nunc malesuada vulputate. Sed dignissim, tortor id mollis ullamcorper, dui ipsum aliquet purus, sed ornare velit dui nec libero. Mauris sit amet ex purus. In interdum urna at augue sollicitudin, nec mollis tellus efficitur. Sed laoreet nunc odio, sed sollicitudin lacus bibendum quis. Nulla euismod enim eget est interdum, non consectetur diam viverra. Nam quam est, varius eu ultricies eget, tempor id quam. Nulla justo orci, suscipit id tristique at, fermentum convallis quam.</p>
                            <div class="reply">
                                <i class="fa-regular fa-comment"></i>
                                <span>12 Responses</span>
                            </div>
                        </div>
                    </a>
                    <a class="box">
                        <div class="img-container">
                            <img src="../img/professeur.jpg" alt="">
                            <span>Ismail Berriss<span>.</span></span>
                            <span>Il ya 1 heure</span>
                        </div>
                        <div class="post-content">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus malesuada et ipsum non malesuada. Nullam nec vestibulum augue, eget placerat nisl. Aenean nec lectus ut nunc malesuada vulputate. Sed dignissim, tortor id mollis ullamcorper, dui ipsum aliquet purus, sed ornare velit dui nec libero. Mauris sit amet ex purus. In interdum urna at augue sollicitudin, nec mollis tellus efficitur. Sed laoreet nunc odio, sed sollicitudin lacus bibendum quis. Nulla euismod enim eget est interdum, non consectetur diam viverra. Nam quam est, varius eu ultricies eget, tempor id quam. Nulla justo orci, suscipit id tristique at, fermentum convallis quam.</p>
                            <div class="reply">
                                <i class="fa-regular fa-comment"></i>
                                <span>12 Responses</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>