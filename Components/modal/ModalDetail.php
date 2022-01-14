<?php

if(isset($_POST['detail'])) {
  $val = [
    "conn" => $conn,
    "path" => $rootPath,
    "id" => $_POST['id']
  ];

  return;
}

?>

<main id="ModalDetail" class="absolute hidden bg-black bg-opacity-50 h-screen w-screen z-10">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white py-8 px-8 rounded-md relative">
        <div class="">
          <p class="text-center text-2xl font-bold">Input Admin Baru</p>
          <div onclick="modalDetail(false)" class="absolute top-2 right-2">
            <div class="w-7">
              <img class="cursor-pointer" src="../../icon/lightClose.svg" alt="close">
            </div>
          </div>
        </div>
      <form action="" class="flex flex-col items-center justify-center" method="POST">
        <div class="flex mt-10">
          <div>
            <p>Username</p>
            <input type="text" class="border border-gray-500 rounded pl-1" name="username" id="username" placeholder="Masukkan Username">
          </div>
          <div class="ml-8">
            <p>Nama Admin</p>
            <input type="text" class="border border-gray-500 rounded pl-1" name="namaAdmin" id="namaAdmin" placeholder="Masukkan Nama Admin">
          </div>
        </div>
        <div class="flex mt-8">
          <div>
            <p>Password</p>
            <input type="text" class="border border-gray-500 rounded pl-1" name="password" id="password" placeholder="Masukkan Password">
          </div>
          <div class="ml-8">
            <p>Konfirmasi Password</p>
            <input type="text" class="border border-gray-500 rounded pl-1" name="konfirmasiPassword" id="konfirmasiPassword" placeholder="Masukkan Ulang Password">
          </div>
        </div>
        <div class="mt-10">
          <button class="text-white py-2 px-10 rounded-full w-full bg-gray-700" type="submit" name="submitCreateAdmin">Submit</button>
        </div>
      </form>
    </div>
  </div>
</main>