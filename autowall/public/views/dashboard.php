<!DOCTYPE html>
<html>
  <head>
    <title>Vehicle Dashboard</title>
    <script src="/autowall/public/js/dashboard.js"></script>
  </head>
  <body>
    <script>
      getVehicles();
      setConditionOptions();
    </script>
    <div class="container-fluid px-5">
      <div 
        id="vehicle-card-container" 
        class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mt-2 .align-items-stretch"
      >
      </div>
    </div>

    <div 
      class="modal fade" 
      id="vehicle-edit-modal" 
      tabindex="-1" 
      aria-labelledby="modalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 id="modal-title" class="modal-title fs-5" id="modalLabel">Edit Vehicle</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="update-form" onsubmit="updateVehicle(event)">
              <div class="mb-3">
                  <label for="vehicle-id" class="form-label">Stock Number</label>
                  <input id="vehicle-id" name="vehicle_id" class="form-control" readonly>
              </div>

              <div class="mb-3">
                  <label for="condition" class="form-label">Vehicle Condition</label>
                  <select id="condition" name="condition" class="form-select" required>
                  </select>
              </div>

              <div class="mb-3">
                  <label for="mileage" class="form-label">Mileage</label>
                  <input type="number" name="mileage" id="mileage" class="form-control" placeholder="Enter mileage" required>
              </div>

              <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" name="price" id="price" class="form-control" placeholder="Enter price" required>
              </div>
            </form>
          </div>
          <div id="modal-error" class="text-center w-100" style="color: red;"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button 
              type="submit" 
              form="update-form" 
              class="btn btn-primary">
                Save changes
              </button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
