<?php

$mysqli = new mysqli("db", "root", "root",  "db_ppob");

if(!$mysqli) {
  die("Connection failed : ".mysqli_connect_error());
}

?>