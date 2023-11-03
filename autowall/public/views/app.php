<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script src="/autowall/public/js/auth.js"></script>
    <script src="/autowall/public/js/app.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e5ecf3;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="/autowall/public/images/athens-logo.jpg"
            alt="Logo"
            width="64"
            height="48"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                id="inventory-link"
                class="nav-link active dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                name="inventory"
              >
                Inventory
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="inventory?condition=new">New Vehicles</a></li>
                <li>
                  <a class="dropdown-item" href="inventory?condition=certified">Certified Pre-owned</a>
                </li>
                <li>
                  <a class="dropdown-item" href="inventory?condition=pre-owned">Pre-owned Vehicles</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a 
                hidden 
                id="dashboard-link" 
                class="nav-link" 
                href="dashboard"
                name="dashboard">
                  Vehicle Dashboard
                </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a 
                id="login-button" 
                class="nav-link" 
                aria-current="page"
                href="login">
                  Login Here
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script>
      updateNavLink();
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
