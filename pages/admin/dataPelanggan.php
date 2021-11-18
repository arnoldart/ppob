<?php

require '../../config/conn.php';
require '../../utils/register.php';
require '../../utils/hapus.php';

$rootPath = $_SERVER['SCRIPT_FILENAME'];

$queryAdmin = mysqli_query($conn, "SELECT * FROM pelanggan");
$queryDaya = mysqli_query($conn, "SELECT * FROM tarif");

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
    <main id="userModal" class="absolute hidden bg-black bg-opacity-50 h-screen w-screen z-10">
      <div class="flex justify-center items-center h-screen">
        <div class="bg-white py-8 px-8 rounded-md">
            <div class="relative">
              <p class="text-center text-2xl font-bold">Input Admin Baru</p>
              <div onclick="modal(false)" class="absolute top-0 right-0">
                <p class="cursor-pointer">close</p>
              </div>
            </div>
          <form action="" class="flex flex-col items-center justify-center" method="POST">
            <div class="flex mt-10">
              <div>
                <p>Username</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="username" id="username" placeholder="username">
              </div>
              <div class="ml-8">
                <p>Nama Admin</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="namaAdmin" id="namaAdmin" placeholder="nama admin">
              </div>
            </div>
            <div class="flex mt-8">
              <div>
                <p>Alamat</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="alamat" id="alamat" placeholder="alamat">
              </div>
              <div class="ml-8">
                <p>Nomor KWH</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="nomorKwh" id="nomorKwh" placeholder="nomor kwh">
              </div>
            </div>
            <div class="flex mt-8 items-center">
              <div>
                <p>Daya</p>
                <div style="width: 201;">
                  <!-- <img class="w-5 mr-2" src="../../icon/user.svg" alt="nomor kwh"> -->
                  <select name="tarif" id="tarif">
                    <option value="">--Pilih Daya--</option>
                    <?php while ( $rowDaya = mysqli_fetch_assoc($queryDaya) ) {?>
                      <option value="<?= $rowDaya['id_tarif']?>"><?= $rowDaya['daya'];?> </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="ml-8">
                <p>Tarif PerKWH</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="tarifPerKwh" id="tarifPerKwh" placeholder="tarif perkwh">
              </div>
            </div>
            <div class="flex mt-8">
              <div>
                <p>Password</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="password" id="password" placeholder="password">
              </div>
              <div class="ml-8">
                <p>Konfirmasi Password</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="konfirmasiPassword" id="konfirmasiPassword" placeholder="konfirmasi password">
              </div>
            </div>
            <div class="mt-10">
              <button class="text-white py-2 px-10 rounded-full w-full bg-gray-700" type="submit" name="submitCreateUser">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </main>
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
          <p onmouseover="userProfile(true)" onmouseout="userProfile(false)" class="text-md cursor-pointer"><?= $getFirstUsernameAdmin, $getAll;?></p>
          <div onmouseover="userProfile(true)" onmouseout="userProfile(false)" class="hidden absolute p-7 right-0 bg-white shadow" id="profile">
            <ul>
              <li class="hover:text-gray-500 cursor-pointer">Profile</li>
              <li class="mt-3 hover:text-red-500 cursor-pointer"><form action="" method="POST"><button type="submit" name="logout">Logout</button></form></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="px-3 mt-20">
        <div class="flex justify-between items-center">
          <div class="border border-black rounded-full px-2 py-2">
            <input type="text" class="rounded-full" placeholder="Cari admin">
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

  <script src="../../dom/modal/userModal.dom.js"></script>
  <script src="../../dom/profile.dom.js"></script>

</body>
</html>