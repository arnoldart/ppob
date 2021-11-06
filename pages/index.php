<?php

require '../config/conn.php';

if(!isset($_COOKIE['login'])) {
  header("Location: ./auth/login.php");

  return;
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <p>Selamat Datang <?= $_COOKIE['username']?></p>

</body>
</html>