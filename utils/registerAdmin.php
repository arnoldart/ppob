<?php

function registerAdmin($conn, $username, $password, $namaPengguna) {
  $isTrue = "true";
  $isAdminID = "";
  $row = mysqli_query($conn, "SELECT * FROM admin");

  foreach($row as $idx => $val) {
    $isAdminID = $idx;
  }

  if($isAdminID === "") {
    $level = 2;
    $stmt = $conn->prepare("INSERT INTO `admin` (`username`, `password`, `nama_admin`, `id_level`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $password, $namaPengguna, $level);
    $stmt->execute();
    
    return $isTrue;
  }
  
  return;
}

function registerUser($conn, $username, $password, $nomorKwh, $namaPengguna, $alamat, $idTarif) {
  $stmt = $conn->prepare("INSERT INTO `pelanggan` (`username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $username, $password, $nomorKwh, $namaPengguna, $alamat, $idTarif);
  $stmt->execute();

  return;
}

?>