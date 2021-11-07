<?php

require '../../config/conn.php';

$queryUser = mysqli_query($conn, "SELECT * FROM pelanggan");

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
  
  <p>Selamat Datang admin</p>

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