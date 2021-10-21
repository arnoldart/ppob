<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Document</title>
</head>
<body>
  
  <main class="flex justify-center items-center h-screen background-gradient">
    <div class="flex flex-col bg-white rounded-md p-10">
      <p class="text-center font-bold">Register</p>
      <div class="my-10">
        <p class="text-sm">Username</p>
        <div class="flex">
          <img class="w-5 mr-2" src="../icon/user.svg" alt="username">
          <input class="border-b border-gray-300" type="text" placeholder="username">
        </div>
        <p class="text-sm mt-3">Password</p>
        <div class="flex">
          <img class="w-5 mr-2" src="../icon/lock.svg" alt="password">
          <input class="border-b border-gray-300" type="text" placeholder="password">
        </div>
      </div>
      <p class="text-center text-sm text-blue-400">saya sudah punya akun!</p>
    </div>
  </main>

</body>
</html>

<?php

require "../config/conn.php";


?>