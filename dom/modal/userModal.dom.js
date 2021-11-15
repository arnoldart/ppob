const userModal = document.getElementById('userModal')

function modal(bool) {
  if(!bool) {
    userModal.style.display = "none"

    return;
  }

  userModal.style.display = "block"

  return;
}