<?php

require_once '../../utils/register.php';

$validatePath = explode('/', $rootPath);
$getEndPath = end($validatePath);

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


?>

<main id="modalNewQuery" class="absolute hidden bg-black bg-opacity-50 h-screen w-screen z-10">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white py-8 px-8 rounded-md relative">
      <div>
        <?php if($getEndPath === "dataAdmin.php") { ?>
          <p class="text-center text-2xl font-bold">Input Data Admin</p>
        <?php } else { ?>
          <p class="text-center text-2xl font-bold">Input Data Pelanggan</p>
        <?php }?>
        <div onclick="modal(false)" class="absolute top-2 right-2">
          <div class="w-7">
            <img class="cursor-pointer" src="../../icon/lightClose.svg" alt="close">
          </div>
        </div>
      </div>
      <?php if($getEndPath === 'dataAdmin.php') {?>
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
      <?php } else {?>
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
      <?php }?>
    </div>
  </div>
</main>