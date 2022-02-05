const submit = document.getElementById('submit')

const username = document.getElementById('username')
const namaPengguna = document.getElementById('namaPengguna')
const alamat = document.getElementById('alamat')
const nomorKwh = document.getElementById('nomorKwh')
const password = document.getElementById('password')
const konfirmasiPassword = document.getElementById('konfirmasiPassword')
const tarif = document.getElementById('tarif')

const usernameMsg = document.getElementById('username-msg')
const namaPenggunaMsg = document.getElementById('namaPengguna-msg')
const alamatMsg = document.getElementById('alamat-msg')
const nomorKwhMsg = document.getElementById('nomorKwh-msg')
const passwordMsg = document.getElementById('password-msg')
const konfirmasiPasswordMsg = document.getElementById('konfirmasiPassword-msg')
const tarifMsg = document.getElementById('tarif-msg')

submit.addEventListener("click", () => {
  const getUserInput = {
    username : username.value, 
    namaPengguna : namaPengguna.value,
    alamat: alamat.value,
    nomorKwh: nomorKwh.value,
    password: password.value,
    konfirmasiPassword: konfirmasiPassword.value,
    tarif: tarif.value,
  }

  console.log(tarif.value)
  
  errorHandling(getUserInput)
})