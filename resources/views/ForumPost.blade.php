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
    <link rel="shortcut icon" href="/img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/css/ForumPost.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/all.min.css" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                        <img src="{{Auth::user()->imageProfile}}" alt="" width="40" height="30" >
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
    <div class="reply">
        <div class="container">
            <div class="post">
                <div class="box">
                    @foreach ($posts as $post)
                        <h5>{{$id_post->titre}}</h5>
                        <div class="content">
                            <img src="{{$post->user->imageProfile}}" alt="">
                            <div class="content-text">
                                <span>Par {{$post->user->name}} {{$post->user->prenom}}</span>
                                <span>{{time_elapsed_string($post->date_created)}} dans Bases de Données</span>
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
                            <img src="{{$r->user->imageProfile}}" alt="">
                            <span>{{$r->user->name}} {{$r->user->prenom}}</span>
                            <span>
                                @if (Auth::user()->type=='prof')
                                    Professeur
                                @else
                                    etudiant
                                @endif
                            </span>
                        </div>
                        <div class="content">
                            <span>Publié {{time_elapsed_string($r->date_created)}}</span>
                            <p>{{$r->contenu}}</p>
                        </div>
                    </div>
                @endforeach
               @if(Auth::user()->type=='prof')
                    <div class="reply-form" id="reply-form">
                        <div class="image">
                            <img src="{{Auth::user()->imageProfile}}" alt="">
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
                            <img src="{{Auth::user()->imageProfile}}" alt="">
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
                                        <input type="submit" value="Ajouter répondre">
                                    </span>
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