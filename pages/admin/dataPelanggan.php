<?php

require '../../config/conn.php';

$queryAdmin = mysqli_query($conn, "SELECT * FROM pelanggan");

$getFirstUsernameAdmin = strtoupper(substr($_COOKIE['username'], 0, 1));
$getAll = substr($_COOKIE['username'], 1);

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
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/style.css">
  <title>PPOB | Data Pelanggan</title>
</head>
<body>

  <main class="flex">
    <div class="bg-gray-800 h-screen text-white" style="flex: 1;">
      <p class="text-center text-2xl font-bold my-10">PPOB</p>
      <ul>
        <li class="mt-5 text-lg ml-5"><a href="./index.php">Home</a></li>
        <li class="mt-5 text-lg ml-5"><a href="./dataAdmin.php">Data Admin</a></li>
        <li class="mt-5 text-lg ml-5"><a href="./dataPelanggan.php">Data Pelanggan</a></li>
      </ul>
    </div>
    <div class="bg-white h-screen" style="flex: 5;">
      <div class="flex items-center justify-between bg-white filter drop-shadow px-5 py-3">
        <p class="text-xl font-bold">Home</p>
        <div>
          <p class="text-md"><?= $getFirstUsernameAdmin, $getAll;?></p>
        </div>
      </div>
      <div class="px-3 mt-20">
        <div class="flex justify-between items-center">
          <div class="border border-black rounded-full px-2 py-2">
            <input type="text" class="rounded-full" placeholder="Cari admin">
          </div>
          <button class="bg-blue-400 rounded-full px-3 py-2 text-white text-lg">Tambah User</button>
        </div>
        <div class="mt-7">
          <table class="border border-black">
            <thead>
              <tr class="text-center bg-gray-800 text-white">
                <th class="border border-black w-screen p-2">Username</th>
                <th class="border border-black w-screen p-2">Nama Pelanggan</th>
                <th class="border border-black w-screen p-2">Alamat</th>
                <th class="border border-black w-screen p-2">Nomor KWH</th>
                <th class="border border-black w-screen p-2" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_assoc($queryAdmin)) {?>
                <tr>
                  <td class="border border-black w-screen p-2"><?= $row['username']; ?></td>
                  <td class="border border-black w-screen p-2"><?= $row['nama_pelanggan']; ?></td>
                  <td class="border border-black w-screen p-2"><?= $row['alamat']; ?></td>
                  <td class="border border-black w-screen p-2"><?= $row['nomor_kwh']; ?></td>
                  <td class="border border-black w-screen p-2">Edit</td>
                  <td class="border border-black w-screen p-2">Hapus</td>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>  

  <!-- <div class="flex">
    <p>Selamat Datang <?= $_COOKIE['username']?></p>
    <form action="" method="POST">
      <button type="submit" name="logout">Logout</button>
    </form>
  </div> -->

</body>
</html>