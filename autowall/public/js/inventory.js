/**
 * Get the vehicle inventory from the database and display it on the page
 */
function getInventory() {
  // Get the type of inventory to display set to new by default
  let urlParams = new URLSearchParams(window.location.search);
  let condition = urlParams.get("condition");
  if (condition === null) {
    condition = "new";
    urlParams.set("condition", condition);
    let newURL = `${window.location.pathname}?${urlParams.toString()}`;
    history.pushState(null, null, newURL);
  }
  let path =
    "app/Dispatcher.php?controller=InventoryController&action=getVehicles&condition=" +
    condition;

  // Fetch the inventory
  fetch(path)
    .then((response) => response.json())
    .then((data) => {
      if (data.error !== undefined) {
        console.log(data.error);
        return;
      }

      // Display the inventory
      data.forEach((vehicle) => {
        card = document.createElement("div");
        card.innerHTML = `
            <div class="card">
                <img 
                    src="/autowall/public/images/${vehicle.image_name}.jpg" 
                    class="card-img-top img-fluid" 
                    alt="..."
                >
                <hr>
                <div class="card-body">
                    <h5 class="card-title">
                        ${vehicle.year} ${vehicle.make_name} ${vehicle.model_name}
                    </h5>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            Condition: ${vehicle.condition_name}
                            <br>
                            Retail Price: $${vehicle.price}
                            <br>
                            Stock #: ${vehicle.id}
                            <br>
                            Mileage: ${vehicle.mileage}
                        </small>
                    </p>
                </div>
            </div>
        `;
        card.addEventListener(
          "click",
          () => (window.location.href = "details?vehicle=" + vehicle.id)
        );
        document.getElementById("vehicle-card-container").appendChild(card);
      });
    })
    .catch((error) => {
      // Handle any errors here
      console.error("An error occurred:", error);
    });
}
