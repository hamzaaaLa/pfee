<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualiser Administrateurs</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="{{asset('/img/fsa_agadir.png')}}" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/HomePageAdmin.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Work Sans -->
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap')}}" rel="stylesheet" />
</head>
<body>
<div class="page">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('/img/fsa_agadir.png')}}" alt="" width="35" height="35" class="d-inline-block
            align-text-top">
            FSA-Online
        </a>
        <div class="accordion" id="accordionExample">
            <a href="{{route('admineHome')}}">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-user-check"></i>
                        Administrateurs
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                    <div class="accordion-body">
                        <ul>
                            <li class="active"><a href="{{route('afficheAdminView')}}">Consulter et Modifier</a></li>
                            <li><a href="{{route('ajouterAdminView')}}">Ajouter Module</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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
                            <li><a href="{{route('afficheEtud')}}">Consulter et Modifier</a></li>
                            <li><a href='{{route('ajoutEtud')}}'>Ajouter Etudiant</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        Professeurs
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{route('afficheProf')}}">Consulter et Modifier</a></li>
                            <li><a href="{{route('ajouterProfView')}}">Ajouter Professeur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i class="fa-solid fa-book"></i>
                        Modules
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{route('afficheModule')}}">Consulter et Modifier</a></li>
                            <li><a href="{{route('ajouterModuleView')}}">Ajouter Module</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="{{route('adminProfile',Auth::user()->id_user)}}">
                <i class="fa-solid fa-user"></i>
                Profile
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-power-off fa-lg"></i>
                {{ __('Déconnexion') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <!-- End Sidebar -->
    <div class="visualiser page-content">
        <div class="head">
            <a href="{{route('adminProfile', Auth::user()->id_user)}}" class="btn">
                <img src="{{Auth::user()->profile_image_url}}" alt="">
                {{Auth::user()->name}} {{Auth::user()->prenom}}
            </a>
        </div>
        <div class="content">
            <div class="header">
                <h2>Données Administrateurs</h2>
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="search" placeholder="Saisir un nom">
                </div>
                <a href="{{route('ajouterAdminView')}}" type="button" class="btn btn-primary">Ajouter Administrateur</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Actions</th>
                        <th scope="col">CIN</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Date Embauche</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admin as $a)
                        <tr>
                            <td class="actions">
                                <a href="{{route('modifierAdminView',$a->user->id_user)}}">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <!-- Modal Supprimer -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer Etudiant</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer cet étudiant?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <a type="button" class="btn btn-danger" href="{{route('supprimerAdmin',
                                                $a->user->id_user)}}">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $a->user->cin }}</td>
                            <td class="row-name">{{ $a->user->name }} </td>
                            <td>{{ $a->user->prenom }}</td>
                            <td>{{ $a->user->email }}</td>
                            <td>{{ $a->user->telephone }}</td>
                            <td>{{ $a->dateEmbauche }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/js/all.min.js')}}"></script>
<script>
    var searchInput = document.getElementById('search');
    var rows = document.querySelectorAll('table tbody tr');

    searchInput.addEventListener('input', function (event) {
        var searchText = event.target.value.toLowerCase();

        rows.forEach(function(row) {
            var name = row.querySelector('td.row-name').textContent.toLowerCase();

            if(name.includes(searchText)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>

