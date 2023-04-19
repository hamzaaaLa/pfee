<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Espace Cours</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/css/EspaceCours.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/all.min.css" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}
</head>
<body>
    <!-- Start Header -->
    <nav class="navbar navbar-expand-lg header">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/fsa_agadir.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
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
                        <img src="{{ Auth::user()->imageProfile}}" alt="" width="40" height="30" >
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
    <!-- Start Cours -->
    <div class="cours">
        <div class="container">
            <div class="header">
                <h1>Bases De Données 2</h1>
                <a class="forum-btn" href="#">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Accéder au Forum</span>
                </a>
            </div>
            <div class="content">
                @if(Auth::user()->type=='prof')
                    <div class="add-container">
                        <!-- Ajouter Cours -->
                        <button class="add-btn" type="button" data-bs-toggle="modal" data-bs-target="#coursModal">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                                Ajouter Fichier
                            </span>
                        </button>
                        <!-- Modal Cours -->
                        <div class="modal fade" id="coursModal" tabindex="-1" aria-labelledby="coursModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="container">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="coursModalLabel">Ajouter Cours</h5>
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
                                                    <label for="formFile" class="form-label">Fichier</label>
                                                    <input class="form-control" type="file" id="formFile" required>
                                                    <div class="valid-feedback">
                                                        C'est bon!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Veuillez insérer un fichier.
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
                        <!-- Ajouter Section -->
                        <button class="add-btn" type="button" data-bs-toggle="modal" data-bs-target="#sectionModal">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                                Ajouter Section
                            </span>
                        </button>
                        <!-- Modal Section -->
                        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="container">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="sectionModalLabel">Ajouter Section</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nomSection" class="form-label">Nom</label>
                                                <input type="text" name="nomSection" class="form-control" id="nomSection" required>
                                                <div class="valid-feedback">
                                                    C'est bon!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez insérer un nom.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addSection()">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="accordion" id="accordionPanelsStayOpen">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                {{-- @foreach ($modules->affectation_section->section as $section)
                                    {{$section->titre_section}}
                                @endforeach --}}
                                smth
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                        <a href="#">Chapitre 1 (Cours)</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                        <a href="#">TD Mécanique_ Série 1_ 2020-2021</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                        <a href="#">TD Mécanique_ Série 1_ 2020-2021_ Correction</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                        <a href="#">TP Mécanique_ Série 1_ 2020-2021</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                        <a href="#">TP Mécanique_ Série 1_ 2020-2021_ Correction</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Accordion Item #3
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div> --}}
    </div>
    <!-- End Cours -->
    
    <script>
        function addSection() {
            nomSection = $("#nomSection").val();
            var i=0;

            if(nomSection != "") {
                $.ajax({
                   url: "{{route('section.store',$id_module)}}",
                   type: 'POST',
                   data: {
                       'nomSection': nomSection,
                       '_token': $('meta[name="csrf-token"]').attr('content')
                   },
                    success: function (response) {
                        if(response == 'success'){
                            var newSection = '<div class="accordion-item">' +
                                '<h2 class="accordion-header" id="panelsStayOpen-heading' + i + '">' +
                                    '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' +  i + '" aria-expanded="true" aria-controls="#panelsStayOpen-collapse' +  i + '">' +
                                        nomSection +
                                    '</button>' +
                                '</h2>' +
                                '<div id="panelsStayOpen-collapse' +  i + '" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading' + i + '">' +
                                    '<div class="accordion-body">' +
                                        'smth' +
                                    '</div>' +
                                '</div>' +
                            '</div>';
                        $("#accordionPanelsStayOpen").append(newSection);
                        }
                    }
                });
            }
            i++;
        }
    </script>
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
    <script src="/js/jquery-3.6.4.min.js"></script>g
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/all.min.js"></script>
</body>
</html>
