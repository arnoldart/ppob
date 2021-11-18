<?php

  require '../../../config/conn.php';
 
  $url = "";
  $url.= $_SERVER['HTTP_HOST'];
  $url.= $_SERVER['REQUEST_URI'];

  $validateUrl = explode('=', $url);
  $getEndPath = end($validateUrl);

  $query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan=$getEndPath");

?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../styles/style.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>

  <main>
    <div>
      
    </div>
  </main>

</body>
</html>