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
                        @if(Auth::user()->type=='prof')
                            <a class="box" href="{{ route('prof.ForumPost', ['id_module' => $id_module, 'id_post' => $post->id_post]) }}">
                                <div class="img-container">
                                    <img src="{{ $post->user->profile_image_url}}" alt="">
                                    <span>{{$post->user->name}} {{$post->user->prenom}}<span>.</span></span>
                                    <span>{{time_elapsed_string($post->date_created)}}</span>
                                </div>
                                <div class="post-content">
                                    <h5>{{$post->titre}}</h5>
                                    <p>{{$post->contenu}}.</p>
                                    <div class="reply">
                                        <i class="fa-regular fa-comment"></i>
                                        <span>{{ $post->reply_count }} Reponses</span>
                                    </div>
                                </div>
                            </a>
                        @else
                        <a class="box" href="{{ route('etud.ForumPost', ['id_module' => $id_module, 'id_post' => $post->id_post]) }}">
                            <div class="img-container">
                                <img src="{{ $post->user->profile_image_url}}" alt="">
                                <span>{{$post->user->name}} {{$post->user->prenom}}<span>.</span></span>
                                <span>{{time_elapsed_string($post->date_created)}}</span>
                            </div>
                            <div class="post-content">
                                <h5>{{$post->titre}}</h5>
                                <p>{{$post->contenu}}.</p>
                                <div class="reply">
                                    <i class="fa-regular fa-comment"></i>
                                    <span>{{ $post->reply_count }} Reponses</span>
                                </div>
                            </div>
                        </a>
                        @endif
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
