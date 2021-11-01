const submit = document.getElementById('submit')

const username = document.getElementById('username')
const namaPengguna = document.getElementById('namaPengguna')
const alamat = document.getElementById('alamat')
const nomorKwh = document.getElementById('nomorKwh')
const password = document.getElementById('password')
const konfirmasiPassword = document.getElementById('konfirmasiPassword')


submit.addEventListener("click", () => {
  const getUserInput = {
    username : username.value, 
    namaPengguna : namaPengguna.value,
    alamat: alamat.value,
    nomorKwh: nomorKwh.value,
    password: password.value,
    konfirmasiPassword: konfirmasiPassword.value
  }
  
  errorHandling(getUserInput)
})