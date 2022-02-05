<?php

$server = "localhost";
$username = "root";
$password = "root";
$db = "db_ppob";

$conn = mysqli_connect("db", "root", "root",  "db_ppob");

if(!$conn) {
  die("Connection failed : ".mysqli_connect_error());
}


?>