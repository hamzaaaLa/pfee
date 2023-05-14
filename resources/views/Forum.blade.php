<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forum - Bases de Données</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/Forum.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Work Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
</head>
<body>
    <?php
        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'année',
                'm' => 'mois',
                'w' => 'semaine',
                'd' => 'jour',
                'h' => 'heure',
                'i' => 'minute',
                's' => 'seconde',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? 'Il y a ' . implode(', ', $string) : 'à l\'instant';
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
                </ul>
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{Auth::user()->profile_image_url}}" alt="" width="40" height="30" >
                        {{Auth::user()->prenom}} {{Auth::user()->name}}
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
    <div class="forum">
        <div class="container">
            <div class="header">
                <h1>Discussion - {{$module_name}}</h1>
            </div>
            <div class="content">
                <div class="add-container">
                    <!-- Question -->
                    <button class="add-btn" type="button" data-bs-toggle="modal" data-bs-target="#postModal">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                            Ajouter une publication
                        </span>
                    </button>
                    <!-- Modal Cours -->
                    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="postModalLabel">Ajouter une publication</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    @if(Auth::user()->type=='prof')
                                        <form class="row g-3 needs-validation" action="{{route('prof.add_post',$id_module)}}" method="post" novalidate>
                                            @csrf
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
                                                <button type="submit" class="btn btn-primary"><input type="submit" value="Ajouter"></button>
                                            </div>
                                        </form>
                                    @else
                                        <form class="row g-3 needs-validation" action="{{route('etud.add_post',$id_module)}}" method="post" novalidate>
                                            @csrf
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="posts">
                    @foreach ($posts as $post)
                       <div class="box">
                            <div class="img-container">
                                <div class="img-content">
                                    <img src="{{ $post->user->profile_image_url}}" alt="">
                                    <span>{{$post->user->name}} {{$post->user->prenom}}<span>.</span></span>
                                    <span>{{time_elapsed_string($post->date_created)}}</span>
                                </div>
                                @if($post->user->id_user === Auth::user()->id_user)
                                    @if(Auth::user()->type=='prof')
                                        <div class="actions">
                                            <button class="btn" id="actions-list-toggle{{$post->id_post}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                </svg>
                                            </button>
                                            <div class="actions-list hidden" id="actions-list{{$post->id_post}}">
                                                <ul>
                                                    <li>
                                                        <!-- Modifier Post -->
                                                        <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modifierPost{{$post->id_post}}Modal">
                                                            <i class="fa-solid fa-pen fa-lg"></i>
                                                            Modifier
                                                        </button>

                                                        <!-- Modifier Post Modal -->
                                                        <div class="modal fade" id="modifierPost{{$post->id_post}}Modal"
                                                            data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modifierPost{{$post->id_post}}ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="container">
                                                                        <form class="row g-3 needs-validation" action="{{route('prof.post.update',['id_module' => $id_module, 'id_post' => $post->id_post])}}" method="POST" novalidate>
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="modifierPost{{$post->id_post}}ModalLabel">Modifier Publication</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="titre" class="form-label">Titre</label>
                                                                                    <input type="text" name="titre" class="form-control" value="{{$post->titre}}" id="titre" required>
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
                                                                                            rows="5" required>{{$post->contenu}}</textarea>
                                                                                    <div class="valid-feedback">
                                                                                        C'est bon!
                                                                                    </div>
                                                                                    <div class="invalid-feedback">
                                                                                        Veuillez insérer du context.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuuler</button>
                                                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <!-- Supprimer Post -->
                                                        <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#supprimerPost{{$post->id_post}}Modal">
                                                            <i class="fa-solid fa-trash fa-lg"></i>
                                                            Supprimer
                                                        </button>

                                                        <!-- Supprimer Post Modal -->
                                                        <div class="modal fade" id="supprimerPost{{$post->id_post}}Modal"
                                                            data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                                            aria-labelledby="supprimerPost{{$post->id_post}}ModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="container">
                                                                        <form action="{{route('prof.post.delete',['id_module' => $id_module, 'id_post' => $post->id_post])}}" method="POST">
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="supprimerPost{{$post->id_post}}ModalLabel">Supprimer Publication</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Voulez-vous vraiment supprimer cette
                                                                                publication?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                                <button type="submit" class="btn btn-danger" style="color: white;">Supprimer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="actions">
                                            <button class="btn" id="actions-list-toggle{{$post->id_post}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                </svg>
                                            </button>
                                            <div class="actions-list hidden" id="actions-list{{$post->id_post}}">
                                                <ul>
                                                    <li>
                                                        <!-- Modifier Post -->
                                                        <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modifierPost{{$post->id_post}}Modal">
                                                            <i class="fa-solid fa-pen fa-lg"></i>
                                                            Modifier
                                                        </button>

                                                        <!-- Modifier Post Modal -->
                                                        <div class="modal fade" id="modifierPost{{$post->id_post}}Modal"
                                                            data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modifierPost{{$post->id_post}}ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="container">
                                                                        <form class="row g-3 needs-validation" action="{{route('etud.post.update',['id_module' => $id_module, 'id_post' => $post->id_post])}}" method="POST" novalidate>
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="modifierPost{{$post->id_post}}ModalLabel">Modifier Publication</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="titre" class="form-label">Titre</label>
                                                                                    <input type="text" name="titre" class="form-control" value="{{$post->titre}}" id="titre" required>
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
                                                                                            rows="5" required>{{$post->contenu}}</textarea>
                                                                                    <div class="valid-feedback">
                                                                                        C'est bon!
                                                                                    </div>
                                                                                    <div class="invalid-feedback">
                                                                                        Veuillez insérer du context.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuuler</button>
                                                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <!-- Supprimer Post -->
                                                        <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#supprimerPost{{$post->id_post}}Modal">
                                                            <i class="fa-solid fa-trash fa-lg"></i>
                                                            Supprimer
                                                        </button>

                                                        <!-- Supprimer Post Modal -->
                                                        <div class="modal fade" id="supprimerPost{{$post->id_post}}Modal"
                                                            data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                                            aria-labelledby="supprimerPost{{$post->id_post}}ModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="container">
                                                                        <form action="{{route('etud.post.delete',['id_module' => $id_module, 'id_post' => $post->id_post])}}" method="POST">
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="supprimerPost{{$post->id_post}}ModalLabel">Supprimer Publication</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Voulez-vous vraiment supprimer cette
                                                                                publication?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                                <button type="submit" class="btn btn-danger" style="color: white;">Supprimer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="post-content">
                                <h5>{{$post->titre}}</h5>
                                <p>{{$post->contenu}}.</p>
                                @if(Auth::user()->type=='prof')
                                    <a class="reply" href="{{ route('prof.ForumPost', ['id_module' => $id_module, 'id_post' => $post->id_post]) }}">
                                @else
                                    <a class="reply" href="{{ route('etud.ForumPost', ['id_module' => $id_module, 'id_post' => $post->id_post]) }}">
                                @endif
                                        <i class="fa-regular fa-comment"></i>
                                        <span>{{ $post->reply_count }} Reponses</span>
                                    </a>
                                    </a>
                            </div>
                           <script>
                               var toggleButton{{$post->id_post}} = document.getElementById('actions-list-toggle' + {{$post->id_post}});
                               var element{{$post->id_post}} = document.getElementById('actions-list' + {{$post->id_post}});

                               toggleButton{{$post->id_post}}.addEventListener('click', function() {
                                   if(this.classList.contains('clicked')) {
                                       this.classList.toggle('clicked');
                                   } else {
                                       this.classList.add('clicked');
                                   }
                                   element{{$post->id_post}}.classList.toggle('hidden');
                               });

                               document.addEventListener('click', function(event) {
                                   if (!element{{$post->id_post}}.contains(event.target) && !toggleButton{{$post->id_post}}.contains(event.target)) {
                                       element{{$post->id_post}}.classList.add('hidden');
                                       if(toggleButton{{$post->id_post}}.classList.contains('clicked')) {
                                            toggleButton{{$post->id_post}}.classList.toggle('clicked');
                                       }
                                   }
                               });
                           </script>
                       </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/all.min.js"></script>
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

</body>
</html>
