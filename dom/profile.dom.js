const profile = document.getElementById('profile');

function userProfile(bool) {
  if(!bool) {
    profile.style.display = "none"

    return;
  }

  profile.style.display = "block"

  return;
}