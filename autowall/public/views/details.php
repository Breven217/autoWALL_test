<!DOCTYPE html>
<html>
  <head>
    <title>Vehicle Details</title>
    <script src="/autowall/public/js/details.js"></script>
  </head>
  <body>
    <script>
      getDetails();
    </script>
    <div class="container">
      <div class="row my-3">
        <div class="col-12 text-center">
          <h3 id="makeModel"></h3>
        </div>
      </div>
      <div class="row mx-5">
        <a href="javascript:history.go(-1)">Back to Inventory</a>
      </div>
      <div class="row mx-5">
        <div class="col-md-6 d-flex flex-column align-items-start">
          <img id="vehicleImage" class="img-fluid" src="" alt="Vehicle Image">
        </div>
        <div class="col-md-6 d-flex">
          <div class="card w-100">
            <div class="card-body">
              <p class="card-text">Condition: <span id="condition"></span></p>
              <p class="card-text">Mileage: <span id="mileage"></span></p>
              <p class="card-text">Price: <span id="price"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
