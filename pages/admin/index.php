<?php

require '../../config/conn.php';

$queryUser = mysqli_query($conn, "SELECT * FROM pelanggan");

if(!isset($_COOKIE['isAdmin'])) {
  header("Location: ../auth/sampleLogin.php");

  return;
}


if(isset($_POST['logout'])) {
  setcookie('isAdmin', null, -1, '/');
  setcookie('username', null, -1, '/');
  echo "
    <script>
      window.location.reload()
    </script>
  ";
  return;
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/style.css">
  <title>Document</title>
</head>
<body>
  
  <div class="flex">
    <p>Selamat Datang <?= $_COOKIE['username']?></p>
    <form action="" method="POST">
      <button type="submit" name="logout">Logout</button>
    </form>
  </div>

  <table>
    <thead>
      <tr>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($queryUser)) {?>
        <tr>
          <td><?= $row['username']; ?></td>
          <td><?= $row['alamat']; ?></td>
        </tr>
      <?php }?>
      </tbody>
  </table>

</body>
</html>