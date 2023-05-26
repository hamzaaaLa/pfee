<!doctype html>
<html lang="fr">
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
    <link rel="stylesheet" href="{{asset('/css/ForumPost.css')}}" />
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
    <div class="reply">
        <div class="container">
            <div class="post">
                <div class="box">
                    @foreach ($posts as $post)
                        <h4>{{$id_post->titre}}</h4>
                        <div class="content">
                            <img src="{{$post->user->profile_image_url}}" alt="">
                            <div class="content-text">
                                <span>Par {{$post->user->name}} {{$post->user->prenom}}</span>
                                <span>{{time_elapsed_string($post->date_created)}} dans {{$module_name}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="add-container">
                <a class="add-btn" type="button" href="#reply-form">
                    <span>
                        <i class="fa-solid fa-pen"></i>
                    </span>
                    Répondre
                </a>
            </div>
            <div class="replies">
                @foreach ($reply as $r )
                    <div class="box">
                        <div class="img-container">
                            <img src="{{$r->user->profile_image_url}}" alt="">
                            <span>{{$r->user->name}} {{$r->user->prenom}}</span>
                            <span>
                                @if ($r->user->type=='prof')
                                    Professeur
                                @else
                                    etudiant
                                @endif
                            </span>
                        </div>
                        <div class="content">
                            <div class="text">
                                <span>Publié {{time_elapsed_string($r->date_created)}}</span>
                                <p>{{$r->contenu}}</p>
                            </div>
                            @if($r->user->id_user === Auth::user()->id_user)
                                @if(Auth::user()->type=='prof')
                                    <div class="actions">
                                        <button class="btn" id="actions-list-toggle{{$r->id_reply}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                        </button>
                                        <div class="actions-list hidden" id="actions-list{{$r->id_reply}}">
                                            <ul>
                                                <li>
                                                    <!-- Modifier Reply -->
                                                    <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modifierReply{{$r->id_reply}}Modal">
                                                        <i class="fa-solid fa-pen fa-lg"></i>
                                                        Modifier
                                                    </button>

                                                    <!-- Modifier Reply Modal -->
                                                    <div class="modal fade" id="modifierReply{{$r->id_reply}}Modal"
                                                        data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="modifierReply{{$r->id_reply}}ModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="container">
                                                                    <form class="row g-3 needs-validation" action="{{route('prof.reply.update',['id_module' => $id_module, 'id_post' => $post->id_post,'id_reply'=>$r->id_reply])}}" method="POST" novalidate>
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="modifierReply{{$r->id_reply}}ModalLabel">Modifier Réponse</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
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
                                                    <!-- Supprimer Reply -->
                                                    <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#supprimerReply{{$r->id_reply}}Modal">
                                                        <i class="fa-solid fa-trash fa-lg"></i>
                                                        Supprimer
                                                    </button>

                                                    <!-- Supprimer Reply Modal -->
                                                    <div class="modal fade" id="supprimerReply{{$r->id_reply}}Modal"
                                                        data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="supprimerReply{{$r->id_reply}}ModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="container">
                                                                    <form action="{{route('prof.reply.delete',['id_module' => $id_module, 'id_post' => $post->id_post,'id_reply'=>$r->id_reply])}}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="supprimerReply{{$r->id_reply}}ModalLabel">Supprimer Réponse</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Voulez-vous vraiment supprimer cette réponse?
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
                                    <button class="btn" id="actions-list-toggle{{$r->id_reply}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        </svg>
                                    </button>
                                    <div class="actions-list hidden" id="actions-list{{$r->id_reply}}">
                                        <ul>
                                            <li>
                                                <!-- Modifier Reply -->
                                                <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modifierReply{{$r->id_reply}}Modal">
                                                    <i class="fa-solid fa-pen fa-lg"></i>
                                                    Modifier
                                                </button>

                                                <!-- Modifier Reply Modal -->
                                                <div class="modal fade" id="modifierReply{{$r->id_reply}}Modal"
                                                    data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="modifierReply{{$r->id_reply}}ModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="container">
                                                                <form class="row g-3 needs-validation" action="{{route('etud.reply.update',['id_module' => $id_module, 'id_post' => $post->id_post,'id_reply'=>$r->id_reply])}}" method="POST" novalidate>
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modifierReply{{$r->id_reply}}ModalLabel">Modifier Réponse</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
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
                                                <!-- Supprimer Reply -->
                                                <button class="btn action-btn" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#supprimerReply{{$r->id_reply}}Modal">
                                                    <i class="fa-solid fa-trash fa-lg"></i>
                                                    Supprimer
                                                </button>

                                                <!-- Supprimer Reply Modal -->
                                                <div class="modal fade" id="supprimerReply{{$r->id_reply}}Modal"
                                                    data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="supprimerReply{{$r->id_reply}}ModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="container">
                                                                <form action="{{route('etud.reply.delete',['id_module' => $id_module, 'id_post' => $post->id_post,'id_reply'=>$r->id_reply])}}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="supprimerReply{{$r->id_reply}}ModalLabel">Supprimer Réponse</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Voulez-vous vraiment supprimer cette réponse?
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
                            <script>
                                var toggleButton{{$r->id_reply}} = document.getElementById('actions-list-toggle' + {{$r->id_reply}});
                                console.log(toggleButton{{$r->id_reply}});
                                var element{{$r->id_reply}} = document.getElementById('actions-list' + {{$r->id_reply}});
                                console.log(element{{$r->id_reply}});

                                toggleButton{{$r->id_reply}}.addEventListener('click', function() {
                                    if(this.classList.contains('clicked')) {
                                        this.classList.toggle('clicked');
                                    } else {
                                        this.classList.add('clicked');
                                    }
                                    element{{$r->id_reply}}.classList.toggle('hidden');
                                });

                                document.addEventListener('click', function(event) {
                                    if (!element{{$r->id_reply}}.contains(event.target) && !toggleButton{{$r->id_reply}}.contains(event.target)) {
                                        element{{$r->id_reply}}.classList.add('hidden');
                                        if(toggleButton{{$r->id_reply}}.classList.contains('clicked')) {
                                            toggleButton{{$r->id_reply}}.classList.toggle('clicked');
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                @endforeach
               @if(Auth::user()->type=='prof')
                    <div class="reply-form" id="reply-form">
                        <div class="image">
                            <img src="{{Auth::user()->profile_image_url}}" alt="">
                        </div>
                        <form class="needs-validation" action="{{route('prof.add_reply',['id_module' => $id_module, 'id_post' => $post->id_post])}}" method="post">
                            @csrf
                            <div>
                                <textarea class="form-control" name="reply" rows="7"
                                        required style="resize: none"></textarea>
                                <div class="valid-feedback">
                                    C'est bon!
                                </div>
                                <div class="invalid-feedback">
                                    Veuillez insérer du texte.
                                </div>
                            </div>
                            <div class="submit">
                                <button class="add-btn" type="button">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                                        <input type="submit" value="Ajouter répondre">
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="reply-form" id="reply-form">
                        <div class="image">
                            <img src="{{Auth::user()->profile_image_url}}" alt="">
                        </div>
                        <form class="needs-validation" action="{{route('etud.add_reply',['id_module' => $id_module, 'id_post' => $post->id_post])}}" method="post">
                            @csrf
                            <div>
                                <textarea class="form-control" name="reply" rows="7"
                                        required style="resize: none"></textarea>
                                <div class="valid-feedback">
                                    C'est bon!
                                </div>
                                <div class="invalid-feedback">
                                    Veuillez insérer du texte.
                                </div>
                            </div>
                            <div class="submit">
                                <button class="add-btn" type="button">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                                    </span>
                                    <input type="submit" value="Ajouter répondre">
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
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
