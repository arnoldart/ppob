const errorHandling = (value) => {
  return (
    value.username || (usernameMsg.style.display = "block"),
    value.namaPengguna || (namaPenggunaMsg.style.display = "block"),
    value.alamat || (alamatMsg.style.display = "block"),
    value.nomorKwh || (nomorKwhMsg.style.display = "block"),
    value.password || (passwordMsg.style.display = "block"),
    value.konfirmasiPassword || (konfirmasiPasswordMsg.style.display = "block"),
    value.tarif || (tarifMsg.style.display = "block")
  )

}