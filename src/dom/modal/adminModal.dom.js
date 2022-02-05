const modalNewQuery = document.getElementById('modalNewQuery')

function modal(bool) {
  if(!bool) {
    modalNewQuery.style.display = "none"

    return;
  }

  modalNewQuery.style.display = "block"

  return;
}