<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>Plateforme - LogIn</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../css/LogInUser.css" />
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
                    <li class="nav-item" alt="Accueil">
                        <a class="nav-link active" aria-current="page" href="#">
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item" alt="Formation">
                        <a class="nav-link" href="#">
                            Formations
                        </a>
                    </li>
                    <li class="nav-item" alt="A propos">
                        <a class="nav-link" href="#">
                            A propos
                        </a>
                    </li>
                    <li class="nav-item" alt="Contactez-nous">
                        <a class="nav-link" href="#">
                            Contactez-nous
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header -->
    <!-- Start Login -->
    <div class="login">
        <div class="container">
            <form class="form">
                <div class="header">FSA-Online</div>
                <div class="inputs">
                    <input placeholder="Nom d'utilisateur" class="input" type="text">
                    <input placeholder="Mot de passe" class="input" type="password">
                    <div class="checkbox-container">
                        <label class="checkbox">
                            <input type="checkbox" id="checkbox">
                        </label>
                        <label for="checkbox" class="checkbox-text">Se souvenir de moi</label>
                    </div>
                    <button class="sigin-btn">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Login -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>