<?php

require '../../config/conn.php';

$queryUser = mysqli_query($conn, "SELECT * FROM pelanggan");

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
  <title>PPOB | Home</title>
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
    <div class="bg-white h-screen static" style="flex: 5;">
      <div class="flex items-center justify-between bg-white px-5 py-3 shadow">
        <p class="text-xl font-bold">Home</p>
        <div>
          <p onmouseover="userProfile(true)" onmouseout="userProfile(false)" class="text-md cursor-pointer"><?= $getFirstUsernameAdmin, $getAll;?></p>
          <div onmouseover="userProfile(true)" onmouseout="userProfile(false)" class="hidden absolute p-7 right-0 bg-white shadow" id="profile">
            <ul>
              <li class="hover:text-gray-500 cursor-pointer">Profile</li>
              <li class="mt-3 hover:text-red-500 cursor-pointer">Logout</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bg-white w-full py-5 mt-5">
        <p class="ml-5 text-lg">Selamat datang di PPOB</p>
        <p class="ml-5 mt-3 text-lg">Selamat datang <?= $getFirstUsernameAdmin, $getAll; ?></p>
      </div>
    </div>
  </main>

  <script src="../../dom/profile.dom.js"></script>

</body>
</html>