<?php

function loginAdmin($conn, $username, $password) {
  $stmt = $conn->prepare("SELECT * FROM admin WHERE username='$username' AND password='$password'");
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  setcookie('username', $row['nama_admin'], time()+24*60*60, '/', null, null, true);
  setcookie('isAdmin', true, time()+24*60*60, '/', null, null, true);

  if((int)$row === 0 ) {
    return false;
  }

  return true;
}

function loginUser($conn, $username, $password) {
  $stmt = $conn->prepare("SELECT * FROM pelanggan WHERE username='$username' AND password='$password'");
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  setcookie('username', $row['nama_pelanggan'], time()+24*60*60, '/', null, null, true);
  setcookie('isAdmin', 'false', time()+24*60*60, '/', null, null, true);

  if((int)$row === 0 ) {
    return false;
  }

  return true;
}

?>