<?php

require '../../config/conn.php';
require '../../utils/testing.php';

$queryDaya = mysqli_query($conn, "SELECT * FROM tarif");

if(isset($_COOKIE['login'])) {
  if($_COOKIE['login'] == 'true') {
    header("Location: ../index.php");
  }
}

if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $konfimasiPassword = $_POST['konfirmasiPassword'];
  $nomorKwh = $_POST['nomorKwh'];
  $namaPengguna = $_POST['namaPengguna'];
  $alamat = $_POST['alamat'];
  $idTarif = $_POST['tarif'];

  if($username === "" && $password === "" || $konfimasiPassword === "" || $nomorKwh === "" || $namaPengguna === "" || $alamat === "") {
    echo "asdsd";
    return;
  }

  if($password !== $konfimasiPassword) {
    echo "asdsd";
    return;
  }
  
  $queryUser = "INSERT INTO `pelanggan` (`username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES ('$username','$password','$nomorKwh','$namaPengguna','$alamat','$idTarif')";
  
  $data = mysqli_query($conn, $queryUser);

  header("Location: ./login.php");

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
  <title>PPOB | Register</title>
</head>
<body>
  
  <main class="flex justify-center items-center h-screen background-gradient">
    <div class="flex flex-col bg-white rounded-md p-10">
      <form action="" method="post">
        <p class="text-center text-3xl font-bold mb-5">Register</p>
        <div class="my-10">
          <div class="flex items-center">
            <div class="mr-16">
              <p class="text-sm">Username</p>
              <p class="hidden text-sm text-red-500" id="username-msg">Username belum diisi</p>
              <div class="flex items-center">
                <img class="w-5 mr-2" src="../../icon/user.svg" alt="username">
                <input class="mt-1.5 border-b border-gray-300" type="text" name="username" id="username" placeholder="username">
              </div>
            </div>
            <div>
              <p class="text-sm">Nama Pengguna</p>
              <p class="hidden text-sm text-red-500" id="namaPengguna-msg">Nama Pengguna belum diisi</p>
              <div class="flex items-center">
                <img class="w-5 mr-2" src="../../icon/user.svg" alt="nama pengguna">
                <input class="mt-1.5 border-b border-gray-300" type="text" name="namaPengguna" id="namaPengguna" placeholder="nama pengguna">
              </div>
            </div>
          </div>
          <div class="flex items-center my-8">
            <div class="mr-16">
              <p class="text-sm">Alamat</p>
              <p class="hidden text-sm text-red-500" id="alamat-msg">Nama Pengguna belum diisi</p>
              <div class="flex items-center">
                <img class="w-5 mr-2" src="../../icon/user.svg" alt="alamat">
                <input class="mt-1.5 border-b border-gray-300" type="text" name="alamat" id="alamat" placeholder="alamat">
              </div>
            </div>
            <div>
              <p class="text-sm">Nomor KWH</p>
              <p class="hidden text-sm text-red-500" id="nomorKwh-msg">Nama Pengguna belum diisi</p>
              <div class="flex items-center">
                <img class="w-5 mr-2" src="../../icon/user.svg" alt="nomor kwh">
                <input class="mt-1.5 border-b border-gray-300" type="text" name="nomorKwh" id="nomorKwh" placeholder="nomor kwh">
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="-mt-3">
              <div class="mr-16">
                <p class="text-sm mt-3">Password</p>
                <p class="hidden text-sm text-red-500" id="password-msg">Nama Pengguna belum diisi</p>
                <div class="flex items-center">
                  <img class="w-5 mr-2" src="../../icon/lock.svg" alt="password">
                  <input class="mt-1.5 border-b border-gray-300" type="text" name="password" id="password" placeholder="password">
                </div>
              </div>
              <div>
                <p class="text-sm mt-8">konfirmasi password</p>
                <p class="hidden text-sm text-red-500" id="konfirmasiPassword-msg">Nama Pengguna belum diisi</p>
                <div class="flex items-center">
                  <img class="w-5 mr-2" src="../../icon/lock.svg" alt="password">
                  <input class="mt-1.5 border-b border-gray-300" type="text" name="konfirmasiPassword" id="konfirmasiPassword" placeholder="konfirmasi password">
                </div>
              </div>
            </div>
            <div>
              <p class="text-sm">Daya</p>
              <p class="hidden text-sm text-red-500" id="tarif-msg">Nama Pengguna belum diisi</p>
              <div class="flex items-center mt-3">
                <img class="w-5 mr-2" src="../../icon/user.svg" alt="nomor kwh">
                <select name="tarif" id="tarif">
                  <option value="">--Pilih Daya--</option>
                  <?php while ( $rowDaya = mysqli_fetch_assoc($queryDaya) ) {?>
                    <option value="<?= $rowDaya['id_tarif']?>"><?= $rowDaya['daya'];?> </option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <button class="text-white py-1 rounded-2xl w-full background-gradient" type="submit" name="submit" id="submit">submit</button>
        <a href="./login.php">
          <p class="text-center text-sm text-blue-400 mt-3">saya sudah punya akun!</p>
        </a>
      </form>
    </div>
  </main>

  <script src="../../dom/form.dom.js"></script>
  <script src="../../utils/formHandler.js"></script>
  
</body>
</html>

