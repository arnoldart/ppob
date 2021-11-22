<?php

  require '../../../config/conn.php';
 
  $url = "";
  $url.= $_SERVER['HTTP_HOST'];
  $url.= $_SERVER['REQUEST_URI'];

  $getFirstUsernameAdmin = strtoupper(substr($_COOKIE['username'], 0, 1));
$getAll = substr($_COOKIE['username'], 1);


  $validateUrl = explode('=', $url);
  $getEndPath = end($validateUrl);

  $query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan=$getEndPath");

?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../styles/style.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>

  <main class="flex">
    <main id="edit" class="absolute hidden bg-black bg-opacity-50 h-screen w-screen z-10">
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
        <li class="mt-5 text-lg ml-5"><a href="../index.php">Home</a></li>
        <li class="mt-5 text-lg ml-5"><a href="../dataAdmin.php">Data Admin</a></li>
        <li class="mt-5 text-lg ml-5"><a href="../dataPelanggan.php">Data Pelanggan</a></li>
      </ul>
    </div>
    <div class="bg-white h-screen static" style="flex: 5;">
      <div class="flex items-center justify-between bg-white px-5 py-3 shadow">
        <p class="text-xl font-bold">Detail</p>
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
      <div class="px-5 mt-5 ">
        <div class="flex">
          <div class="bg-white shadow p-5 rounded">
            <input type="text" class="border border-gray-500 rounded-full px-3 w-full" placeholder="Cari...">
            <div class="flex">
              <div>
                <p class="mb-3 mt-3">Nama</p>
                <p class="mb-3">Alamat</p>
                <p class="mb-3">Nomor KWH</p>
                <p class="mb-3">Username</p>
              </div>
              <div class="ml-5">
                <p class="mb-3 mt-3">:</p>
                <p class="mb-3">:</p>
                <p class="mb-3">:</p>
                <p class="mb-3">:</p>
              </div>
              <div class="ml-5">
                <p class="mb-3 mt-3">Nama</p>
                <p class="mb-3">Alamat</p>
                <p class="mb-3">Nomor KWH</p>
                <p class="mb-3">Username</p>
              </div>
            </div>
            <div class="flex justify-end cursor-pointer mt-5" onclick="modal(true)">
              <div class="bg-blue-600 flex rounded-md px-4 py-1.5 items-center">
                <img src="../../../icon/edit.svg" alt="Edit">
                <p class="text-white">Edit</p>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="flex justify-between items-center">
            <div class="border border-black rounded-full px-2 py-2">
              <input type="text" class="rounded-full" placeholder="Cari admin">
            </div>
            <button onclick="modal(true);" class="bg-blue-400 rounded-full px-3 py-2 text-white text-lg">Tambah User</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="../../../dom/profile.dom.js"></script>
  <script src="../../../dom/modal/editModal.dom.js"></script>


</body>
</html>