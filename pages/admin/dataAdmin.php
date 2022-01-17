<?php

require '../../config/conn.php';
// require '../../utils/register.php';
require '../../utils/hapus.php';
require '../../utils/detail.php';

$rootPath = $_SERVER['SCRIPT_FILENAME'];

$queryAdmin = mysqli_query($conn, "SELECT * FROM admin");

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

if(isset($_POST['hapus'])) {
  $val = [
    "conn" => $conn,
    "path" => $rootPath,
    "id" => $_POST['id']
  ];

  hapus($val);
  
  return;
}

$test = "megnhadeh";

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
    <!-- NEW DATA -->
    <?php include_once '../../Components/modal/ModalNewData.php'?>

    <!-- DETAIL -->
    <?php include_once '../../Components/modal/ModalDetail.php'?>

    <!-- MODAL SIDEBAR -->
    <?php include_once '../../Components/SidebarNav.php'; ?>

    <div class="bg-white h-screen" style="flex: 5;">
      <!-- MODAL TOPBAR -->
      <?php include_once '../../Components/TopbarNav.php'; ?>
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
                  <td class="border border-black w-screen p-2 curso-pointer">
                    <form action="" method="post">
                      <button onclick="modalDetail(true)" type="submit" id="detail" name="detail"><input type="hidden" value=<?= $row['id_admin'];?> name="id">Detail</button>
                    </form>
                  </td>
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
  <script src="../../hooks/useState.js"></script>
  <script src="../../dom/modal/detailModal.dom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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