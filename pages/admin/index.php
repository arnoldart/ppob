<?php

require '../../config/conn.php';

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
    <!-- Sidebar Nav -->
    <?php include_once "../../Components/SidebarNav.php"?>
    <div class="bg-white h-screen static" style="flex: 5;">
      <!-- Topbar Nav -->
      <?php include_once "../../Components/TopbarNav.php"?>
    </div>
  </main>

  <script src="../../dom/profile.dom.js"></script>
  <script src="../../utils/logout.js"></script>

</body>
</html>