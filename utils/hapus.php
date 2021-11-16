<?php

function hapus($val) {
  $validatePath = explode('/', $val['path']);
  $getEndPath = end($validatePath);

  if($getEndPath === "dataAdmin.php") {
      mysqli_query($val['conn'], "DELETE FROM admin WHERE id_admin='$val[id]'");

      header("Location: ./dataAdmin.php");
    
    return;
  }
  
  mysqli_query($val['conn'], "DELETE FROM pelanggan WHERE id_pelanggan='$val[id]'");

  header("Location: ./dataPelanggan.php");
  
  return;
}

?>