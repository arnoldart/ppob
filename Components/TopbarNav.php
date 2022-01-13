<div class="flex items-center justify-between bg-white filter drop-shadow px-5 py-3">
  <p class="text-xl font-bold">Data Pelanggan</p>
  <div>
    <p onmouseover="userProfile(true)" onmouseout="userProfile(false)" class="text-md cursor-pointer"><?= $getFirstUsernameAdmin, $getAll;?></p>
    <div onmouseover="userProfile(true)" onmouseout="userProfile(false)" class="hidden absolute p-7 right-0 bg-white shadow" id="profile">
      <ul>
        <li class="hover:text-gray-500 cursor-pointer">Profile</li>
        <li class="mt-3 hover:text-red-500 cursor-pointer"><form action="" method="POST"><button type="submit" name="logout">Logout</button></form></li>
      </ul>
    </div>
  </div>
</div>