/**
 * Attempts to log the user in
 */
function login(event) {
  event.preventDefault();

  let formData = new FormData(event.target);
  let path = "app/Dispatcher.php?controller=AuthController&action=login";

  fetch(path, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams(formData),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.error !== undefined) {
        document.getElementById("login-error-text").textContent = data.error;
        return;
      }

      sessionStorage.setItem("user", JSON.stringify(data[0]));
      window.location.href = "dashboard";
    })
    .catch((error) => {
      console.error("An error occurred:", error);
    });
}

/**
 * Clears the session and redirects the user to the default page
 */
function logout() {
  sessionStorage.clear();
  window.location.href = "autowall";
}
