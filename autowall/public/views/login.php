<!DOCTYPE html>
<html>
  <head>
    <title>Vehicle List</title>
    <script src="/autowall/public/js/auth.js"></script>
  </head>
  <body>
    <div class="row mx-5 mt-5">
      <div class="col-sm-8 col-md-5 col-lg-3 mx-auto">
        <h2 class="font-bold">Welcome to Long Chevrolet Buick GMC</h2>
        <div>
          <form id="login-form" class="m-t" method="post" onsubmit="login(event)">
            <div class="mt-2">
              <input 
                type="text" 
                name="username" 
                class="form-control" 
                placeholder="Username"
                  required="true">
            </div>
            <div class="mt-1">
              <input 
                type="password" 
                name="password"
                class="form-control" 
                placeholder="Password" 
                required="true">
            </div>
            <button 
              type="submit" 
              class="btn btn-primary mt-2 w-100"
              style="background-color: #004787;">
                Login
            </button>
          </form>
          <div id="login-error-text" style="color: red;"></div>
        </div>
    </div>
  </body>
</html>
