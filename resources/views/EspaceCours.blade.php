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
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/EspaceCours.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Work Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
</head>
<body>
    <!-- Start Header -->
    <nav class="navbar navbar-expand-lg header">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/img/fsa_agadir.png')}}" alt="" width="40" height="30" class="d-inline-block align-text-top">
                FSA-Online
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ url('/home') }}">
                                Tableau de bord
                            </a>
                        @endauth
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">
                                Tableau de bord
                            </a>
                        @endguest
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contactez-nous
                        </a>
                    </li>
                </ul>
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_image_url}}" alt="" width="40" height="30" >
                        {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            @php
                                $id_user=Auth::user()->id_user
                            @endphp
                            @if(Auth::user()->type=='prof')
                                <a class="dropdown-item" href="{{route('profProfile',Auth::user()->id_user)}}">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>
                            @else
                                <a class="dropdown-item" href="{{route('etudiantProfile',Auth::user()->id_user)}}">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>
                            @endif
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
                <h1>{{$id_module->libelleModule}}</h1>
                @if(Auth::user()->type=='prof')
                    @foreach (Auth::user()->professeur as $prof)
                        @foreach ($prof->affectation_prof as $af)
                        @endforeach
                    @endforeach
                        <a class="forum-btn" href="{{route('prof.Forum',$af->module->id_module)}}">
                            <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">Accéder au discussion</span>
                        </a>
                @else
                    @foreach (Auth::user()->etudiant as $etud)
                        @foreach ($etud->affectation_etud as $af_etud)
                        @endforeach
                    @endforeach
                        <a class="forum-btn" href="{{route('etud.Forum',$af_etud->module->id_module)}}">
                            <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">Accéder au discussion</span>
                        </a>
                @endif
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
                        <!-- Modal Ajouter Cours -->
                        <div class="modal fade" id="coursModal" tabindex="-1" aria-labelledby="coursModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="container">
                                        <form class="row g-3 needs-validation" action="{{route('section.add_cour', $id_module)}}" method="post" enctype="multipart/form-data" novalidate>
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="coursModalLabel">Ajouter Cours</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nomCours" class="form-label">Titre</label>
                                                    <input type="text" name="nomCours" class="form-control" id="nomCours" required>
                                                    <div class="valid-feedback">
                                                        C'est bon!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Veuillez insérer un titre.
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fichierCours" class="form-label">Fichier</label>
                                                    <input class="form-control" type="file" name="fichierCours" id="fichierCours" required>
                                                    <div class="valid-feedback">
                                                        C'est bon!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Veuillez insérer un fichier.
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sectionCours" class="form-label">Section</label>
                                                    <select class="form-select" name="sectionCours" id="sectionCours" aria-label="Default select example">
                                                        <option selected>Choisir...</option>
                                                        @foreach (Auth::user()->professeur as $prof)
                                                            @foreach ($prof->affectation_prof as $affectation)
                                                                @foreach ($affectation->module->affectation_section as $sec)
                                                                    <option>
                                                                        {{ $sec->section->titre_section }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">
                                                        C'est bon!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Veuillez insérer une section.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" {{-- data-bs-dismiss="modal" --}} {{-- onclick="addCours()" --}}><input type="submit" value="Ajouter"></button>
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
                        <!-- Modal Ajouter Section -->
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
                    <div class="accordion" id="accordionPanelsStayOpen">
                        @foreach (Auth::user()->professeur as $prof)
                            @foreach ($prof->affectation_prof as $affectation)
                                @foreach ($affectation->module->affectation_section as $sec)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-{{ $sec->section->titre_section }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $sec->section->id_section }}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{ $sec->section->id_section }}">
                                                            {{ $sec->section->titre_section }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse{{ $sec->section->id_section}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-{{ $sec->section->titre_section }}">
                                            <div class="accordion-body">
                                                <ul>
                                                    @foreach ($sec->section->cours as $cours )
                                                        <li>
                                                            <div class="content">
                                                                <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                                                <a href="{{ route('prof.cour.download', ['id_cour' => $cours->id_cour]) }}">{{$cours->libelleCour }}</a>
                                                            </div>
                                                            <div class="actions">
                                                                <!-- Modifier Cours -->
                                                                <button type="button" class="add-btn modif" data-bs-toggle="modal" data-bs-target="#modifierCours{{$cours->id_cour}}">
                                                                    <i class="fa-solid fa-pen"></i>
                                                                </button>

                                                                <!-- Modal Modifier Cours -->
                                                                <div class="modal fade" id="modifierCours{{$cours->id_cour}}" tabindex="-1" aria-labelledby="modifierCours{{$cours->id_cour}}Label" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="container">
                                                                                <form class="row g-3 needs-validation"
                                                                                      action="" method="post" novalidate>
                                                                                    @csrf
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="modifierCours{{$cours->id_cour}}Label">Modifer Titre Cours</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="mb-3">
                                                                                            <label for="nomCours" class="form-label">Titre</label>
                                                                                            <input type="text" name="nomCours" class="form-control" id="nomCours" required>
                                                                                            <div class="valid-feedback">
                                                                                                C'est bon!
                                                                                            </div>
                                                                                            <div class="invalid-feedback">
                                                                                                Veuillez insérer un titre.
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                                        <button type="button" class="btn btn-primary"><input type="submit" value="Modifier"></button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Supprimer Cours -->
                                                                <button type="button" class="add-btn del" data-bs-toggle="modal" data-bs-target="#supprimerCours{{$cours->id_cour}}">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>

                                                                <!-- Modal Supprimer Cours -->
                                                                <div class="modal fade" id="supprimerCours{{$cours->id_cour}}" tabindex="-1" aria-labelledby="supprimerCours{{$cours->id_cour}}Label" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="supprimerCours{{$cours->id_cour}}Label">Supprimer Cours</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Voulez-vous vraiment supprimer ce cours?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                                <a type="button" class="btn btn-danger" href="#" style="color: white;">Supprimer</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    <li class="actions">
                                                        <!-- Modifier Section -->
                                                        <button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#modifierSection{{ $sec->section->id_section}}">
                                                            <i class="fa-solid fa-pen"></i>
                                                            Modifier Section
                                                        </button>

                                                        <!-- Modal Modifier Section -->
                                                        <div class="modal fade" id="modifierSection{{ $sec->section->id_section}}" tabindex="-1" aria-labelledby="modifierSection{{ $sec->section->id_section}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="container">
                                                                        <form class="row g-3 needs-validation" action="" method="post" novalidate>
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modifierSection{{ $sec->section->id_section}}Label">Modifier Titre Section</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="nomSection" class="form-label">Titre</label>
                                                                                    <input type="text" name="nomSection" class="form-control" id="nomSection" required>
                                                                                    <div class="valid-feedback">
                                                                                        C'est bon!
                                                                                    </div>
                                                                                    <div class="invalid-feedback">
                                                                                        Veuillez insérer un titre.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                                <button type="button" class="btn btn-primary"><input type="submit" value="Modifier"></button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Supprimer Section -->
                                                        <button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#supprimerSection{{ $sec->section->id_section}}">
                                                            <i class="fa-solid fa-trash"></i>
                                                            Supprimer Section
                                                        </button>

                                                        <!-- Modal Supprimer Section -->
                                                        <div class="modal fade" id="supprimerSection{{ $sec->section->id_section}}" tabindex="-1" aria-labelledby="supprimerSection{{ $sec->section->id_section}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="supprimerSection{{ $sec->section->id_section}}Label">Supprimer Section</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Voulez-vous vraiment supprimer cette section?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <a type="button" class="btn btn-danger" href="#" style="color: white;">Supprimer</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach
                            @endforeach
                        @endforeach
                    </div>
                @else
                    <div class="accordion" id="accordionPanelsStayOpen">
                        @foreach (Auth::user()->etudiant as $etud)
                            @foreach ($etud->affectation_etud as $affectation)
                                @foreach ($affectation->module->affectation_section as $sec)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-{{ $sec->section->titre_section }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $sec->section->id_section }}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{ $sec->section->id_section }}">
                                                            {{ $sec->section->titre_section }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse{{ $sec->section->id_section}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-{{ $sec->section->titre_section }}">
                                            <div class="accordion-body">
                                                <ul>
                                                    @foreach ($sec->section->cours as $cours )
                                                        <li>
                                                            <div class="content">
                                                                <i class="fa-solid fa-file-pdf fa-xl" style="color: #e5252a;"></i>
                                                                <a href="{{ route('etud.cour.download', ['id_cour' => $cours->id_cour]) }}">{{$cours->libelleCour }}</a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Cours -->

    <script>
        function addSection() {
            var nomSection = $("#nomSection").val();
            var i=1000;

            if(nomSection != "") {
                $.ajax({
                   url: "{{route('section.store',$id_module)}}",
                   type: 'POST',
                   data: {
                       'nomSection': nomSection,
                       '_token': $('meta[name="csrf-token"]').attr('content')
                   },
                    success: function(response) {
                        if(response == 'success') {
                            var newSection = '<div class="accordion-item">' +
                                '<h2 class="accordion-header" id="panelsStayOpen-heading' + i + '">' +
                                    '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' +  i + '" aria-expanded="true" aria-controls="#panelsStayOpen-collapse' +  i + '">' +
                                        nomSection +
                                    '</button>' +
                                '</h2>' +
                                '<div id="panelsStayOpen-collapse' +  i + '" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading' + i + '">' +
                                    '<div class="accordion-body">' +
                                        '<ul>' +
                                            '<li class="actions">' +
                                                // Modifier Section
                                                '<button type="button" class="add-btn" data-bs-toggle="modal" ' +
                                                    'data-bs-target="#modifierSection{{ $sec->section->id_section}}">' +
                                                    '<i class="fa-solid fa-pen"></i>' +
                                                    'Modifier Section' +
                                                '</button>' +

                                                // Modal Modifier Section
                                                '<div class="modal fade" id="modifierSection{{$sec->section->id_section}}" tabindex="-1" "' +
                                                    '"aria-labelledby="modifierSection{{ $sec->section->id_section}}Label"' +
                                                    '"aria-hidden="true">' +
                                                    '<div class="modal-dialog">' +
                                                        '<div class="modal-content">' +
                                                            '<div class="container">' +
                                                                '<form class="row g-3 needs-validation" action="" ' +
                                                                    'method="post" novalidate>' +
                                                                    '@csrf' +
                                                                    '<div class="modal-header">' +
                                                                    '<h5 class="modal-title" id="modifierSection{{$sec->section->id_section}}Label">Modifier Titre Section</h5>' +
                                                                    '<button type="button" class="btn-close" ' +
                                                                        'data-bs-dismiss="modal" aria-label="Close"></button>' +
                                                                    '</div>' +
                                                                    '<div class="modal-body">' +
                                                                        '<div class="mb-3">' +
                                                                            '<label for="nomSection" ' +
                                                                                'class="form-label">Titre</label>' +
                                                                            '<input type="text" name="nomSection" ' +
                                                                                'class="form-control" id="nomSection" required>' +
                                                                                '<div class="valid-feedback">' +
                                                                                    "C'est bon!" +
                                                                                '</div>' +
                                                                                '<div class="invalid-feedback">' +
                                                                                    'Veuillez insérer un titre.' +
                                                                                '</div>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                    '<div class="modal-footer">' +
                                                                        '<button type="button" class="btn ' +
                                                                            'btn-secondary" data-bs-dismiss="modal">Annuler</button>' +
                                                                        '<button type="button" class="btn ' +
                                                                            'btn-primary"><input type="submit" value="Modifier"></button>' +
                                                                    '</div>' +
                                                                '</form>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                                // Supprimer Section
                                                '<button type="button" class="add-btn" data-bs-toggle="modal" ' +
                                                    'data-bs-target="#supprimerSection{{ $sec->section->id_section}}">' +
                                                    '<i class="fa-solid fa-trash"></i>' +
                                                    'Supprimer Section' +
                                                '</button>' +

                                                // Modal Supprimer Section
                                                '<div class="modal fade" id="supprimerSection{{$sec->section->id_section}}" tabindex="-1" aria-labelledby="supprimerSection{{ $sec->section->id_section}}Label" aria-hidden="true">' +
                                                    '<div class="modal-dialog">' +
                                                        '<div class="modal-content">' +
                                                            '<div class="modal-header">' +
                                                                '<h5 class="modal-title" id="supprimerSection{{$sec->section->id_section}}Label">Supprimer Section</h5>' +
                                                                '<button type="button" class="btn-close" ' +
                                                                    'data-bs-dismiss="modal" aria-label="Close"></button>' +
                                                            '</div>' +
                                                            '<div class="modal-body">' +
                                                                'Voulez-vous vraiment supprimer cette section?' +
                                                            '</div>' +
                                                            '<div class="modal-footer">' +
                                                                '<button type="button" class="btn btn-secondary" ' +
                                                                    'data-bs-dismiss="modal">Close</button>' +
                                                                '<a type="button" class="btn btn-danger" href="#" ' +
                                                                    'style="color: white;">Supprimer</a>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</li>' +
                                    '</div>' +
                                '</div>' +
                            '</div>';
                        // Ading the section in the accordion
                        $("#accordionPanelsStayOpen").append(newSection);
                        // Ading the section in the add course form
                        var option = $("<option>").text(nomSection).val(nomSection);
                        $("#sectionCours").append(option);
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
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/js/all.min.js"></script>
</body>
</html>
