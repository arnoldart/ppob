<?php

require '../config/conn.php';

if(!isset($_COOKIE['login'])) {
  header("Location: ./auth/login.php");

  return;
}

if(isset($_POST['logout'])) {
  setcookie('login', null, -1, '/');
  echo "
    <script>
      window.location.reload()
    </script>
  ";
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
  
  <div>
    <p>Selamat Datang <?= $_COOKIE['username']?></p>
    <form action="" method="POST">
      <button type="submit" name="logout">Logout</button>
    </form>
  </div>

</body>
</html>