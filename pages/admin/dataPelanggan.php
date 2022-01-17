<?php

require '../../config/conn.php';
require '../../utils/register.php';
require '../../utils/hapus.php';

$rootPath = $_SERVER['SCRIPT_FILENAME'];

$queryAdmin = mysqli_query($conn, "SELECT * FROM pelanggan");
$queryDaya = mysqli_query($conn, "SELECT * FROM tarif");

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


if(isset($_POST['submitCreateUser'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $konfirmasiPassword = mysqli_real_escape_string($conn, $_POST['konfirmasiPassword']);
  $nomorKwh = mysqli_real_escape_string($conn, $_POST['nomorKwh']);
  $namaPengguna = mysqli_real_escape_string($conn, $_POST['namaAdmin']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $idTarif = mysqli_real_escape_string($conn,  $_POST['tarif']);

  if($password !== $konfirmasiPassword) {
    echo "menghadeh";

    return;
  }

  $userData = [
    'conn' => $conn,
    'username' => $username,
    'password' => $password,
    'nomorKwh' => $nomorKwh,
    'namaPengguna' => $namaPengguna,
    'alamat' => $alamat,
    'idTarif' => $idTarif,
    'path' => $rootPath,
  ];


  register($userData);

  return;
}

if(isset($_POST['hapus'])) {

  $val = [
    'conn' => $conn,
    'id' => $_POST['id'],
    'path' => $rootPath
  ];

  hapus($val);
  
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
    <!-- MODAL NEW DATA -->
    <?php include '../../Components/modal/ModalNewData.php';?>
    
    <!-- MODAL SIDEBAR -->
    <?php include '../../Components/SidebarNav.php'; ?>
    
    <div class="bg-white h-screen" style="flex: 5;">
      <!-- MODAL TOPBAR -->
      <?php include_once '../../Components/TopbarNav.php';?>
      <div class="px-3 mt-20">
        <div class="flex justify-between items-center">
          <div class="border border-gray-500 rounded-full px-1 py-2">
            <input type="text" class="rounded-full px-1" placeholder="Cari Pelanggan">
          </div>
          <button onclick="modal(true);" class="bg-blue-400 rounded-full px-3 py-2 text-white text-lg">Tambah User</button>
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
                  <td class="border border-black w-screen p-2" >
                    <a href="./detail/slug.php?id=1">Detail</a>
                  </td> 
                  <td class="border border-black w-screen p-2">
                    <form action="" method="POST">
                      <button type="submit" name="hapus"><input value=<?= $row['id_pelanggan'];?> type="hidden" name="id">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>  

  <script src="../../dom/modal/adminModal.dom.js"></script>
  <script src="../../dom/profile.dom.js"></script>

</body>
</html>