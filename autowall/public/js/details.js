/**
 * Get a specific vehicle's details and display it on the page
 */
function getDetails() {
  let urlParams = new URLSearchParams(window.location.search);
  let vehicle_id = urlParams.get("vehicle");
  let path =
    "app/Dispatcher.php?controller=InventoryController&action=getVehicleDetails&vehicle_id=" +
    vehicle_id;

  // Fetch the inventory
  fetch(path)
    .then((response) => response.json())
    .then((data) => {
      if (data.error !== undefined) {
        console.log(data.error);
        return;
      }

      let vehicleData = data[0];

      let makeModel = document.getElementById("makeModel");
      let vehicleImage = document.getElementById("vehicleImage");
      let condition = document.getElementById("condition");
      let mileage = document.getElementById("mileage");
      let price = document.getElementById("price");

      makeModel.textContent = `${vehicleData.year} ${vehicleData.make_name} ${vehicleData.model_name}`;
      vehicleImage.src = `/autowall/public/images/${vehicleData.image_name}.jpg`;
      condition.textContent = vehicleData.condition_name;
      mileage.textContent = vehicleData.mileage;
      price.textContent = `$${vehicleData.price}`;
    })
    .catch((error) => {
      // Handle any errors here
      console.error("An error occurred:", error);
    });
}
