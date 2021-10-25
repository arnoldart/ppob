<?php

require "../config/conn.php";

$username = @$_GET['username'];
$password = @$_GET['password'];
$konfimasiPassword = @$_GET['konfirmasiPassword'];
$nomorKwh = @$_GET['nomorKwh'];
$namaPengguna = @$_GET['namaPengguna'];
$alamat = @$_GET['alamat'];
$idTarif = @$_GET['tarif'];

$userRegister = "INSERT INTO `pelanggan`(`username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES ('".$username."', '".$password."', '".$nomorKwh."', '".$namaPengguna."', '".$alamat."', '".$idTarif."')";

$query = mysqli_query($conn, $userRegister);

if(!$query) {
  echo "
    <script>
      window.location='../pages/auth/register.php'
    </script>
  ";
}

  echo "
    <script>
      window.location='../pages/'
    </script>
  ";



?>