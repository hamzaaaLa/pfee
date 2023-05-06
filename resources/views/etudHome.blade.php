

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
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
    <?php
        function time_elapsed_string($datetime) {
            $now = new DateTime();
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            if ($diff->y > 0) {
                return $ago->format('d/m/Y');
            } elseif ($diff->m > 0) {
                return $ago->format('d/m/Y');
            } elseif ($diff->d > 0) {
                return $ago->format('d/m/Y');
            } elseif ($diff->h > 0) {
                return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
            } elseif ($diff->i > 0) {
                return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
            } else {
                return 'just now';
            }
        }
    ?>
<!-- Start Header -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('/img/fsa_agadir.png')}}" alt="" width="35" height="35" class="d-inline-block align-text-top">
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
<!-- Start Dashboard -->
<div class="dashboard">
    <div class="container">
        <div class="holder">
            <!-- Start Courses -->
            <div class="courses">
                <div class="section-header">
                    <h3>Modules</h3>
                    @if(Auth::user()->type=='user')
                        <a class="btn btn-light" href="{{route('voirTous',Auth::user()->id_user)}}" role="button">Voir tous</a>
                    @endif
                </div>
                <div class="row justify-content-center">
                    @if (Auth::user()->type=='prof')
                        @foreach (Auth::user()->professeur->affectation_prof as $af)
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#example{{$af->module->id_module}}Modal">
                                        <img src="{{ $af->module->module_image_url}}" class="card-img-top" alt="...">
                                        <div class="img-modif">
                                            <i class="fa-solid fa-pen"></i>
                                            Modifier
                                        </div>
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="example{{$af->module->id_module}}Modal" data-bs-backdrop="false" data-bs-keyboard="false"
                                         tabindex="-1"
                                         aria-labelledby="example{{$af->module->id_module}}ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="needs-validation" enctype="multipart/form-data" action="{{route('modifierImageModule',$af->module->id_module)}}" method="post"  novalidate>
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="example{{$af->module->id_module}}ModalLabel">Modifier l'image</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col" style="text-align: center">
                                                            <label for="image" class="form-label">Image:</label>
                                                            <input type="file" class="form-control" id="image" name="image" required>
                                                            <div class="valid-feedback">
                                                                C'est bon!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Veuillez insérer une image.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="content">
                                            <p class="card-title">{{$af->module->libelleModule}}</p>
                                            <p class="card-text">
                                                <a href="{{route('profProfile',$af->professeur->user->id_user)}}">{{ $af->professeur->user->name}} {{ $af->professeur->user->prenom }}</a>
                                            </p>
                                        </div>
                                        <div class="acceder">
                                            <a href="{{route('prof.EspaceCours', $af->module->id_module)}}">Visiter</a>
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach (Auth::user()->etudiant as $etud)
                            @foreach ($etud->affectation_etud as $af_etud)
                                <div class="col">
                                    <div class="card" style="width: 15rem;">
                                        <img src="{{ $af_etud->module->module_image_url}}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="content">
                                                <p class="card-title">{{$af_etud->module->libelleModule}}</p>
                                                @foreach ( $af_etud->module->affectation_prof as $af_prof)
                                                    <p class="card-text">
                                                        <a href="{{route('etudProfProfile',$af_prof->professeur->user->id_user)}}">{{$af_prof->professeur->user->name}} {{$af_prof->professeur->user->prenom}}</a>
                                                    </p>
                                                @endforeach
                                            </div>
                                            <div class="acceder">
                                                <a href="{{route('etud.EspaceCours', $af_etud->module->id_module)}}">Visiter</a>
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          @endforeach
                      @endforeach
                    @endif
                </div>
            </div>
            <!-- End Courses -->
            <!-- Start Announcements -->
            <div class="announcements">
                <div class="section-header">
                    <h3>Annonces</h3>
                    @if(Auth::user()->type=='prof')
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Créer Annonce
                        </button>
                    @endif
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Créer Annonce</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3 needs-validation" action="{{route('annonce.store')}}" method="post" novalidate>
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="titreInput" class="form-label">Titre</label>
                                            <input type="text" name="titre" class="form-control" id="titreInput" required>
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
                                        {{-- Filiere --}}
                                        <div class="mb-3">
                                            <label for="filiere" class="form-label">Filière</label>
                                            <select class="form-select" name="filiereSelect" id="filiereSelect" required>
                                                <option selected disabled value="">Choisir...</option>
                                                @foreach($filieres as $key){
                                                    <option >{{$key->libellefiliere}}</option>
                                                    }@endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez choisir une filière.
                                            </div>
                                        </div>
                                        {{-- Module --}}
                                        <div class="mb-3">
                                            <label for="module" class="form-label">Modules</label>
                                            <select class="form-select" name="moduleSelect" id="moduleSelect" required>
                                                <option selected disabled value="">Choisir...</option>
                                            </select>
                                            <div class="valid-feedback">
                                                C'est bon!
                                            </div>
                                            <div class="invalid-feedback">
                                                Veuillez choisir un module.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                        <button type="button" class="btn btn-primary"><input
                                            type="submit" value="Créer"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->type=='prof')
                    <ul>
                        @foreach (Auth::user()->professeur->affectation_prof as $aff)
                            @foreach ($aff->module->annonce as $Annonce)
                                <li>
                                    <div class="img-content">
                                        <img src="{{ $Annonce->professeur->user->profile_image_url}}" alt="">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('annonce.delete', $Annonce->id_annonce) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel1">Supprimer Annonce</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Voulez-vous vraiment supprimer cette annonce?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="annonce-text">
                                        <a href="{{route('profProfile',$Annonce->professeur->user->id_user)}}">{{ $Annonce->professeur->user->name }}</a>
                                        <p class="subject"><span>Sujet: </span>{{ $Annonce->titre }}</p>
                                        <p class="content">{{ $Annonce->contenue }}</p>
                                        <span>{{ time_elapsed_string($Annonce->datecreation) }}</span>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    @else
                        <li>
                            <div class="annonce-container">
                                @foreach(Auth::user()->etudiant as $etud)
                                    @foreach ($etud->affectation_etud as $aff)
                                        @foreach ($aff->module->annonce as $Annonce)
                                            <div class="img-content">
                                                <img src="{{ $Annonce->professeur->user->profile_image_url}}" alt="">
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                            <div class="annonce-text">
                                                <a href="{{route('etudProfProfile',$Annonce->professeur->user->id_user)}}">{{ $Annonce->professeur->user->name }}</a>
                                                <p class="subject"><span>Sujet: </span>{{ $Annonce->titre }}</p>
                                                <p class="content">{{ $Annonce->contenue }}</p>
                                                <span>{{ time_elapsed_string($Annonce->datecreation) }}</span>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- End Announcements -->
        </div>
    </div>
</div>
<!-- End Dashboard -->
<script src="{{asset('/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/js/all.min.js')}}"></script>
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
    var filiereSelect = document.getElementById("filiereSelect");
    var moduleSelect = $("#moduleSelect");

    filiereSelect.addEventListener("change", updateModule);
    function updateModule() {
        var filiere = filiereSelect.value;
        console.log(filiere);
        $.ajax({
            url: "/prof/dashboard/get-modules",
            type: 'POST',
            data: {
                'selectedFiliere': filiere,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                moduleSelect.html("");
                for(var i = 0; i < response.length; i++) {
                    var option = $("<option>").text(response[i].libelleModule).val(response[i].libelleModule);
                    moduleSelect.append(option);
                }
            }
        });
    }
</script>
</body>
</html>


