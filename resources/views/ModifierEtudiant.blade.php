<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Visualiser Etudiants</title>
    <!-- JQuery plugin for multi-select -->
    <link rel="stylesheet" href="{{asset('/css/chosen.min.css')}}" />
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/css/HomePageAdmin.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}">
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin>
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap')}}" rel="stylesheet">
</head>
<body>
<div class="page">
    @if(session('message'))
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Start Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="#">
            <img src="../img/fsa_agadir.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
            FSA-Online
        </a>
        <div class="accordion" id="accordionExample">
            <a href="{{route('admineHome')}}" class="active">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Etudiant</span>
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
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        Professeurs
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{route('afficheProf')}}">Consulter et Modifier</a></li>
                            <li><a href="{{route('ajouterProfView')}}">Ajouter Professeur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-book"></i>
                        Modules
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{route('afficheModule')}}">Consulter et Modifier</a></li>
                            <li><a href="{{route('ajouterModuleView')}}">Ajouter Module</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="DashboardAdmin.php">
                <i class="fa-solid fa-user"></i>
                Profile
            </a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-power-off fa-lg"></i>

                {{ __('Déconnexion') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <!-- End Sidebar -->
    <!-- Start Formulaire -->
    <div class="Ajouter page-content">
        <div class="head">
            <a href="" type="button" class="btn">
                <img src="../img/professeur.jpg" alt="">
                Admin
            </a>
        </div>
        <div class="content">
            <div class="header">
                <h2>Modifier Etudiant</h2>
            </div>
            <form class="row g-3 needs-validation" action="{{route('updateEtud',$users->id_user)}}" method="post" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$etudiant->name}}" required>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez insérer un nom.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="{{$etudiant->prenom}}" required>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez insérer un prénom.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="Email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" value="{{$etudiant->email}}" required>
                        <div class="valid-feedback">
                            C'est bon!
                        </div>
                        <div class="invalid-feedback">
                            Veuillez insérer un email.
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="cin" class="form-label">CIN</label>
                    <input type="text" class="form-control" name="cin" id="cin" value="{{$etudiant->cin}}" required>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez insérer un cin.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="tel" class="form-label">GSM</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                        <input type="tel" class="form-control" name="tel" id="tel" aria-describedby="inputGroupPrepend" value="{{$etudiant->telephone}}" required>
                        <div class="valid-feedback">
                            C'est bon!
                        </div>
                        <div class="invalid-feedback">
                            Veuillez insérer un GSM.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="filiereSelect" class="form-label">Filière</label>
                    <select class="form-select" id="filiereSelect" name="filiereSelect"  required>
                        <option selected >{{$etudiant->filiere}}</option>
                        @foreach($filieres as $key){
                            @if($key->libellefiliere != $etudiant->filiere)
                                <option>{{$key->libellefiliere}}</option>
                            @endif
                        }@endforeach
                    </select>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez choisir une filière.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="semestre" class="form-label">Semestre</label>
                    <select class="form-select" id="semestreSelect" name="semestreSelect[]" multiple="" required>
                        @foreach($semestres as $key){
                        <option >{{$key->libelleSemestre}}</option>
                        }@endforeach
                    </select>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez choisir un semestre.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="moduleSelect" class="form-label">Modules</label>
                    <select class="form-select" id="moduleSelect" name="moduleSelect[]" multiple="" required>
                        <option>Module 1</option>
                        <option>Module 2</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                        <option>Module 3</option>
                    </select>
                    <div class="valid-feedback">
                        C'est bon!
                    </div>
                    <div class="invalid-feedback">
                        Veuillez choisir un module.
                    </div>
                </div>
                <div class="col-12 submit">
                    <button class="btn btn-primary" type="submit">Modifier</button>
                    <a href="{{route('afficheEtud')}}" class="btn btn-danger">Anuuler</a>
                </div>
            </form>
        </div>
    </div>
    <!-- End Formulaire -->
</div>
<script src="{{asset('/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('/js/chosen.jquery.min.js')}}"></script>
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
        $(document).ready(function () {
            $("#semestreSelect").chosen();
            $("#moduleSelect").chosen();
        });
    </script>
    <script>
        // Get references to the select menu
        var filiereSelect = document.getElementById("filiereSelect");
        var semestreSelect = $("#semestreSelect").chosen();
        var moduleSelect = $("#moduleSelect").chosen();

        // Listen for changes to the 'filière' and 'semestre' select menu
        filiereSelect.addEventListener("change", updateSelect);
        semestreSelect.change(updateSelect);

        // Function to update the select menus bases on the selected 'filière' or 'semestre'
        function updateSelect() {
            // Get the selected 'filiere' and 'module'
            var filiere = filiereSelect.value;
            var semestres = $(semestreSelect).val();

            console.log(filiere);
            console.log(semestres);

            if (filiere.length !== 0 && semestres.length !== 0) {
                $.ajax({
                    url: "/admin/ajoutetud/get-modules",
                    type: 'POST',
                    data: {
                        'selectedFiliere': filiere,
                        'selectedSemestres': semestres,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                        moduleSelect.html("");

                        for (var i = 0; i < response.length; i++) {
                            var option = $("<option>").text(response[i].libelleModule).val(response[i].libelleModule);
                            moduleSelect.append(option);
                        }

                        moduleSelect.trigger("chosen:updated");
                    }
                });

                //     /*var xhr = new XMLHttpRequest();
                //     // Send an AJAX request to get the data for the select menues
                //     xhr.open("GET", "get_select_menu_data.php?filiere=" + filiere + "&semestre=" + semestre);
                //     xhr.onload = function() {
                //         // Parse the JSON response and update the selected menues
                //         modules = JSON.parse(xhr.responseText);
                //         moduleSelect.innerHTML = "";
                //         for (var i = 0; modules.length; i++) {
                //             var option = document.createElement("option");
                //             option.text = semestre[i];
                //             moduleSelect.add(option);
                //         }
                //     };
                //     xhr.send();*/
            }
        }
    </script>
</body>
</html>
