<?php

function register($value) {
  $stmtAdmin = $value['conn']->prepare("SELECT * FROM admin WHERE username='$value[username]'");
  $stmtAdmin->execute();
  $resultAdmin = $stmtAdmin->get_result();
  $rowAdmin = $resultAdmin->fetch_assoc();

  $stmtUser = $value['conn']->prepare("SELECT * FROM pelanggan WHERE username='$value[username]'");
  $stmtUser->execute();
  $resultUser = $stmtUser->get_result();
  $rowUser = $resultUser->fetch_assoc();

  if($rowUser['username'] || $rowAdmin['username']) {
    echo "username sudah ada";
    return;
  }

  if(registerAdmin($value)) {
    
    return;
  }

  registerUser($value);
  
  return;
}

function registerAdmin($value) {
  $validatePath = explode('/', $value['path']);
  $getEndPath = end($validatePath);

  if($getEndPath === 'dataAdmin.php') {
    $level = 2;
    $stmt = $value['conn']->prepare("INSERT INTO `admin` (`username`, `password`, `nama_admin`, `id_level`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $value['username'], $value['password'], $value['namaPengguna'], $level);
    $stmt->execute();

    header('Location: ../admin/dataAdmin.php');

    return true;
  }

  $isAdminID = "";
  $row = mysqli_query($value['conn'], "SELECT * FROM admin");

  foreach($row as $idx => $val) {
    $isAdminID = $idx;
  }

  if($isAdminID === "") {
    $level = 2;
    $stmt = $value['conn']->prepare("INSERT INTO `admin` (`username`, `password`, `nama_admin`, `id_level`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $value['username'], $value['password'], $value['namaPengguna'], $level);
    $stmt->execute();

    header('Location: ./sampleLogin.php');
    
    return true;
  }
  
  return;
}

function registerUser($value) {
  $validatePath = explode('/', $value['path']);
  $getEndPath = end($validatePath);

  if($getEndPath === "dataPelanggan.php") {
    $stmt = $value['conn']->prepare("INSERT INTO `pelanggan` (`username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $value['username'], $value['password'], $value['nomorKwh'], $value['namaPengguna'], $value['alamat'], $value['idTarif']);
    $stmt->execute();

    header("Location: ../admin/dataPelanggan.php");

    return;
  }

  $stmt = $value['conn']->prepare("INSERT INTO `pelanggan` (`username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $value['username'], $value['password'], $value['nomorKwh'], $value['namaPengguna'], $value['alamat'], $value['idTarif']);
  $stmt->execute();

  header("Location: ./sampleLogin.php");

  return;
}

?>