<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfe";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve module data based on selected filiere and semestres
$selectedFiliere = $_POST['selectedFiliere'];
$selectedSemestres = $_POST['selectedSemestres'];

$sql = "SELECT libelleModule FROM module join filiere on module.id_filiere = filiere.id_filiere  WHERE filiere.libellefiliere = '$selectedFiliere' AND semestre IN (" . implode(",", $selectedSemestres) . ")";
$result = $conn->query($sql);

// Send the response data back to the JavaScript code
echo json_encode($result);

$conn->close();

?>