@extends('layouts.app')

@section('content')
<!DOCTPE html>
<html>
<head>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
    </style>
<title>View Student Records</title>
</head>
<body>
<table>
<tr>
<td>Id</td>
<td>First Name</td>
<td>Last Name</td>
<td>Email</td>
<td>Cne</td>
<th scope="col">Filière</th>
<th scope="col">Semestres</th>
<th scope="col">Modules</th>
<th scope="col">Actions</th>
</tr>
@foreach ($etudiants as $etudiant)
<tr>
<td>{{ $etudiant->id_etud }}</td>
<td>{{ $etudiant->nom }}</td>
<td>{{ $etudiant->prenom }}</td>
<td>{{ $etudiant->email }}</td>
<td>{{ $etudiant->cne }}</td>
<td>{{$etudiant->filiere}}</td>
                        <td>{{$etudiant->semestre}}</td>
                        <td>{{$etudiant->module1}} {{$etudiant->module2}} {{$etudiant->module3}} {{$etudiant->module4}} {{$etudiant->module5}} {{$etudiant->module6}} {{$etudiant->module7s}}</td>
<td><a type="button" class="btn btn-xs btn-info pull-right" href="{{route('editEtud',$etudiant->id_etud)}}">modifier</a>
    <a class="btn btn-xs btn-info pull-right" style="background-color:red" type="button" >supprimer</a>
</td>
</tr>
@endforeach
</table>
</body>
</html>
@endsection