const adminModal = document.getElementById('adminModal')

function modal(bool) {
  if(!bool) {
    adminModal.style.display = "none"

    return;
  }

  adminModal.style.display = "block"

  return;
}