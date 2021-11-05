<?php

require '../../config/conn.php';

// if(isset($_COOKIE['login'])) {
//   if($_COOKIE['login'] == 'true') {
//     header("Location: ../user.php?username={$_COOKIE['username']}");
//   }
// }

if(isset($_POST['submit'])) {
  $username = @$_POST['username'];
  $password = @$_POST['password'];

  $queryUser = "SELECT * FROM pelanggan WHERE username='$username' AND password=$password";

  $data = mysqli_query($conn, $queryUser);

  if(mysqli_num_rows($data) === 0) {
    echo "lah";

    return;
  }

  setcookie(
    'username', $username,
    'login', 'true'
  );

  header("Location: ../user.php")

}


?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/style.css">
  <title>PPOB | Login</title>
</head>
<body>
  
  <main class="flex justify-center items-center h-screen background-gradient">
    <div class="flex flex-col bg-white rounded-md p-10">
      <form method="POST">
        <p class="text-center text-3xl font-bold mb-5">Login</p>
        <div class="my-10">
          <p class="text-sm">Username</p>
          <div class="flex">
            <img class="w-5 mr-2" src="../../icon/user.svg" alt="username">
            <input class="mt-1.5 border-b border-gray-300" type="text" name="username" placeholder="username">
          </div>
          <p class="text-sm mt-3">Password</p>
          <div class="flex">
            <img class="w-5 mr-2" src="../../icon/lock.svg" alt="password">
            <input class="mt-1.5 border-b border-gray-300" type="text" name="password" placeholder="password">
          </div>
        </div>
        <button class="text-white py-1 rounded-2xl w-full background-gradient" type="submit" name="submit" id="submit" >submit</button>
        <a href="./register.php">
          <p class="text-center text-sm text-blue-400 mt-10">saya belum punya akun!</p>
        </a>
      </form>

    </div>
  </main>

</body>
</html>

<!-- <?php 

// require "../../config/conn.php";

// $username = @$_GET['username'];
// $password = @$_GET['password'];

// $adminQuery = mysqli_query($conn, 'SELECT
//                                 id_admin,
//                                   username,
//                                   password,
//                                   nama_admin,
//                                   nama_level

//                                 FROM `admin`

//                                 INNER JOIN userlevel
//                                 ON admin.id_level=userlevel.id_level'
//                         );

// $userQuery = mysqli_query($conn, 'SELECT * FROM pelanggan');

// ?>