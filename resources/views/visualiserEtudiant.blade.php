@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualiser Etudiants</title>
    <!-- Website favicon-->
    <link rel="shortcut icon" href="../img/fsa_agadir.png" type="image/x-icon">
    <!-- Bootstrap 05 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('css/HomePageAdmin.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <!-- Google Fonts - Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="page">
    <!-- Start Sidebar -->
    
    
    

    <!-- End Sidebar -->
    <div class="visualiser">
        <div class="head">
            <a href="" type="button" class="btn">
                <img src="" alt="">
                Admin
            </a>
        </div>
        <div class="content">
            <div class="header">
                <h2>Données Etudiants</h2>
                
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">CNE</th>
                        <th scope="col">Filière</th>
                        <th scope="col">Semestres</th>
                        <th scope="col">Modules</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($etudiants as $etudiant)
                        <tr>
                        <td>{{ $etudiant->id_etud }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{$etudiant->telephone}}</td>
                        <td>{{ $etudiant->cne }}</td>
                        <td>{{$etudiant->filiere}}</td>
                        <td>{{$etudiant->semestre}}</td>
                        <td>{{$etudiant->module1}}<br> {{$etudiant->module2}}<br> {{$etudiant->module3}}<br> {{$etudiant->module4}}<br> {{$etudiant->module5}} <br>{{$etudiant->module6}} <br>{{$etudiant->module7}}</td>
                        <td><a type="button" class="btn btn-xs btn-info pull-right" href="{{route('editEtud',$etudiant->id_etud)}}">modifier</a>
                            <a class="btn btn-xs btn-info pull-right" style="background-color:red" type="button" >supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>
@endsection