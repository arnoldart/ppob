const edit = document.getElementById('edit')

function modal(bool) {

  if(!bool) {
    edit.style.display = "none"

    return;
  }

  edit.style.display = "block"

  return;
}