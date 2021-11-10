<?php

function findDuplicate($conn, $username, $password, $nomorKwh, $namaPengguna, $alamat, $idTarif) {
  $stmtAdmin = $conn->prepare("SELECT * FROM admin WHERE username='$username'");
  $stmtAdmin->execute();
  $resultAdmin = $stmtAdmin->get_result();
  $rowAdmin = $resultAdmin->fetch_assoc();

  $stmtUser = $conn->prepare("SELECT * FROM pelanggan WHERE username='$username'");
  $stmtUser->execute();
  $resultUser = $stmtUser->get_result();
  $rowUser = $resultUser->fetch_assoc();

  if($rowUser['username'] || $rowAdmin['username']) {
    echo "username sudah ada";
    return;
  }

  if(registerAdmin($conn, $username, $password, $namaPengguna) === true) {
    header("Location: ./sampleLogin.php");
    return;
  }

  registerUser($conn, $username, $password, $nomorKwh, $namaPengguna, $alamat, $idTarif);
  header("Location: ./sampleLogin.php");

  return;
}

function registerAdmin($conn, $username, $password, $namaPengguna) {
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
    
    return true;
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