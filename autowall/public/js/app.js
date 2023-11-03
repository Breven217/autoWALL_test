/**
 * updates the active navlink and enables or disables the vehicle dashboard link
 */
function updateNavLink() {
  if (sessionStorage.getItem("user") != null) {
    let loginButton = document.getElementById("login-button");
    loginButton.innerHTML = "Logout";
    loginButton.href = "javascript:logout()";
    let dashboardLink = document.getElementById("dashboard-link");
    dashboardLink.hidden = false;
    dashboardLink.classList.add("active");
  }

  let path = window.location.pathname;
  let navLinks = document.getElementsByClassName("nav-link");
  for (let i = 0; i < navLinks.length; i++) {
    if (path.includes(navLinks[i].name) && navLinks[i].name != "") {
      navLinks[i].classList.add("active");
    } else {
      navLinks[i].classList.remove("active");
    }
  }
}
