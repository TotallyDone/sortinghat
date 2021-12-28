<?php

//Connecteren met de server

$servername = "ID362509_sortinghat.db.webhosting.be";
$loginName = "ID362509_sortinghat";
$password = "Thomas123";
$databasename = "ID362509_sortinghat";
$port = 3306;

$conn = new mysqli($servername, $loginName, $password, $databasename, $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>