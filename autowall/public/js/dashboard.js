/**
 * Get all vehicles and display them on the page
 */
function getVehicles() {
  let path =
    "app/Dispatcher.php?controller=InventoryController&action=getVehicles";

  // Fetch the vehicles
  fetch(path)
    .then((response) => response.json())
    .then((data) => {
      if (data.error !== undefined) {
        console.log(data.error);
        return;
      }

      // Display the vehicles
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
                        ${vehicle.year} ${vehicle.make_name} ${
          vehicle.model_name
        }
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
                    <button 
                      id="edit-vehicle-button"
                      class="w-100" 
                      data-bs-toggle="modal" 
                      data-bs-target="#vehicle-edit-modal"
                      data-vehicle='${JSON.stringify(vehicle)}'
                      onclick="setModalInfo(event)">
                        Edit Vehicle
                    </button>
                </div>
            </div>
        `;
        document.getElementById("vehicle-card-container").appendChild(card);
      });
    })
    .catch((error) => {
      // Handle any errors here
      console.error("An error occurred:", error);
    });
}

/**
 * Get the vehicle condition options and populate the condition select
 */
function setConditionOptions() {
  let path =
    "app/Dispatcher.php?controller=InventoryController&action=getConditionOptions";

  // Fetch the conditions
  fetch(path)
    .then((response) => response.json())
    .then((data) => {
      if (data.error !== undefined) {
        console.log(data.error);
        return;
      }

      let conditionSelect = document.getElementById("condition");
      data.forEach((condition) => {
        let option = document.createElement("option");
        option.value = condition.id;
        option.textContent = condition.name;
        conditionSelect.appendChild(option);
      });
    })
    .catch((error) => {
      // Handle any errors here
      console.error("An error occurred:", error);
    });
}

/**
 * Update the form on the modal to reflect the current vehicle information
 *
 * @param event
 */
function setModalInfo(event) {
  let vehicle = JSON.parse(event.target.dataset.vehicle);
  document.getElementById("vehicle-id").value = vehicle.id;
  document.getElementById("mileage").value = vehicle.mileage;
  document.getElementById("price").value = vehicle.price;
  document.getElementById("condition").value = vehicle.vehicle_condition_id;
  document.getElementById("modal-error").textContent = "";
}

/**
 * Update the vehicle with the information from the modal form
 *
 * @param event
 */
function updateVehicle(event) {
  event.preventDefault();

  let formData = new FormData(event.target);
  let path =
    "app/Dispatcher.php?controller=InventoryController&action=updateVehicle";

  fetch(path, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams(formData),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data == null) {
        window.location.href = "dashboard";
      }
      if (data.error !== undefined) {
        document.getElementById("modal-error").textContent = data.error;
        return;
      }
    })
    .catch((error) => {
      console.error("An error occurred:", error);
    });
}
