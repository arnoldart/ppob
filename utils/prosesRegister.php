<?php

require "../config/conn.php";

$username = @$_GET['username'];
$password = @$_GET['password'];
$konfimasiPassword = @$_GET['konfirmasiPassword'];
$nomorKwh = @$_GET['nomorKwh'];
$namaPengguna = @$_GET['namaPengguna'];
$alamat = @$_GET['alamat'];
$idTarif = @$_GET['tarif']; 

if ($username === "") {
  echo "username tidak diisi";
  return;
}else if($password === "") {
  echo "password tidak diisi";
  return;
}

// $userRegister = "INSERT INTO `pelanggan`(`username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES ('".$username."', '".$password."', '".$nomorKwh."', '".$namaPengguna."', '".$alamat."', '".$idTarif."')";

// $query = mysqli_query($conn, $userRegister);

// if(!$query) {
//   echo "
//     <script>
//       window.location='../pages/auth/login.php'
//     </script>
//   ";
// }

//   echo "
//     <script>
//       window.location='../pages/'
//     </script>
//   ";



?>