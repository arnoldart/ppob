<?php

require '../../config/conn.php';
require '../../utils/register.php';
require '../../utils/hapus.php';

$rootPath = $_SERVER['SCRIPT_FILENAME'];

$queryAdmin = mysqli_query($conn, "SELECT * FROM admin");

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

if(isset($_POST['submitCreateAdmin'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $namaPengguna = mysqli_real_escape_string($conn, $_POST['namaAdmin']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $konfirmasiPassword = mysqli_real_escape_string($conn, $_POST['konfirmasiPassword']);

  $nomorKwh = "123";
  $alamat = "123";
  $idTarif = "2";

  if($password !== $konfirmasiPassword) {
    echo "menghadeh";

    return;
  }

  $adminData = array(
    'conn' => $conn,
    'path' => $rootPath, 
    'username' => $username,
    'namaPengguna' => $namaPengguna,
    'password' => $password
  );

  register($adminData);

  return;
}

if(isset($_POST['hapus'])) {
  $val = [
    "conn" => $conn,
    "path" => $rootPath,
    "id" => $_POST['id']
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
  <title>PPOB | Data Admin</title>
</head>
<body>

  <main class="flex">
    <main id="adminModal" class="absolute hidden bg-black bg-opacity-50 h-screen w-screen z-10">
      <div class="flex justify-center items-center h-screen">
        <div class="bg-white py-8 px-8 rounded-md relative">
            <div class="">
              <p class="text-center text-2xl font-bold">Input Admin Baru</p>
              <div onclick="modal(false)" class="absolute top-2 right-2">
                <div class="w-7">
                  <img class="cursor-pointer" src="../../icon/lightClose.svg" alt="close">
                </div>
              </div>
            </div>
          <form action="" class="flex flex-col items-center justify-center" method="POST">
            <div class="flex mt-10">
              <div>
                <p>Username</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="username" id="username" placeholder="Masukkan Username">
              </div>
              <div class="ml-8">
                <p>Nama Admin</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="namaAdmin" id="namaAdmin" placeholder="Masukkan Nama Admin">
              </div>
            </div>
            <div class="flex mt-8">
              <div>
                <p>Password</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="password" id="password" placeholder="Masukkan Password">
              </div>
              <div class="ml-8">
                <p>Konfirmasi Password</p>
                <input type="text" class="border border-gray-500 rounded pl-1" name="konfirmasiPassword" id="konfirmasiPassword" placeholder="Masukkan Ulang Password">
              </div>
            </div>
            <div class="mt-10">
              <button class="text-white py-2 px-10 rounded-full w-full bg-gray-700" type="submit" name="submitCreateAdmin">Submit</button>
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
        <p class="text-xl font-bold">Data Admin</p>
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
          <div class="border border-gray-500 rounded-full px-1 py-2">
            <input type="text" class="rounded-full px-1" placeholder="Cari admin">
          </div>
          <button onclick="modal(true);" class="bg-blue-400 rounded-full px-3 py-2 text-white text-lg">Tambah Admin</button>
        </div>
        <div class="mt-7">
          <table class="border border-black">
            <thead>
              <tr class="text-center bg-gray-800 text-white">
                <th class="border border-black w-screen p-2">Username</th>
                <th class="border border-black w-screen p-2">Nama Admin</th>
                <th class="border border-black w-screen p-2" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_assoc($queryAdmin)) {?>
                <tr>
                  <td class="border border-black w-screen p-2"><?= $row['username']; ?></td>
                  <td class="border border-black w-screen p-2"><?= $row['nama_admin']; ?></td>
                  <td class="border border-black w-screen p-2">Detail</td>
                  <td class="border border-black w-screen p-2">
                    <form action="" method="post">
                      <button type="submit" name="hapus"><input type="hidden" value=<?= $row['id_admin'];?> name="id">Hapus</button>
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
  <script>
    document.addEventListener("keydown", (event) => {
      if(event.key === "Escape") {
        modal(false);
        return;
      }
    })
  </script>
  
</body>
</html>