const ModalDetail = document.getElementById("ModalDetail")

function modalDetail(bool) {
  
  if(!bool) {
    ModalDetail.style.display = "none"
  }else {
    ModalDetail.style.display = "block"
  }
  
  return
}