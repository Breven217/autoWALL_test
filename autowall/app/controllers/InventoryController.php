<?php
require 'DB.php';
require 'enums/Vehicle.php';

class InventoryController {
    /**
     * Gets all vehicles from the database filtered by the given condition id
     *
     * @param integer $condition_id
     * @return array
     */
    public function getVehicles($args): array
    {
        // If the condition is set, get the condition name from the enum
        // and use it to filter the vehicles, else get all vehicles
        $condition = isset($args['condition']) 
            ? [Vehicle::CONDITIONS[$args['condition']]]
            : [];

        $baseSql = "SELECT 
            vehicles.*, 
            vehicle_model.name AS model_name, 
            vehicle_make.name AS make_name,
            vehicle_condition.name AS condition_name
            FROM vehicles
            JOIN vehicle_model ON vehicles.vehicle_model_id = vehicle_model.id
            JOIN vehicle_make ON vehicle_model.vehicle_make_id = vehicle_make.id
            JOIN vehicle_condition ON vehicles.vehicle_condition_id = vehicle_condition.id";

        if ($condition) {
            $baseSql .= " WHERE vehicles.vehicle_condition_id = ?";
        }

        $vehicles = DB::query(
            sql: $baseSql,
            params: $condition,
        );

        return $vehicles;
    }

    /**
     * Gets the details of a vehicle from the database
     *
     * @param array $args
     * @return array
     */
    public function getVehicleDetails($args): array
    {
        if (!isset($args['vehicle_id'])){
            throw new Exception("Vehicle ID is required.");
        }

        $vehicle = DB::query(
            sql: "SELECT 
            vehicles.*, 
            vehicle_model.name AS model_name, 
            vehicle_make.name AS make_name,
            vehicle_condition.name AS condition_name
            FROM vehicles
            JOIN vehicle_model ON vehicles.vehicle_model_id = vehicle_model.id
            JOIN vehicle_make ON vehicle_model.vehicle_make_id = vehicle_make.id
            JOIN vehicle_condition ON vehicles.vehicle_condition_id = vehicle_condition.id
            WHERE vehicles.id = ?",
            params: [$args['vehicle_id']],
        );

        return $vehicle;
    }

    /**
     * Gets all vehicle condition options from the database
     *
     * @return array
     */
    public function getConditionOptions(): array
    {
        $options = DB::query(
            sql: "SELECT * FROM vehicle_condition",
        );

        return $options;
    }

    /**
     * Updates the vehicle with the given details
     *
     * @param $args
     * @return void
     */
    public function updateVehicle($args)//: void
    {
        if (!isset($args["vehicle_id"])){
            throw new Exception("Vehicle ID is required.");
        }
        if (!isset($args["condition"])){
            throw new Exception("Condition is required.");
        }
        if (!isset($args["mileage"])){
            throw new Exception("Mileage is required.");
        }
        if (!isset($args["price"])){
            throw new Exception("Price is required.");
        }

        // Check if the vehicle exists and if the details have changed
        $vehicle = DB::query(
            sql: "SELECT 
            vehicles.*
            FROM vehicles
            WHERE vehicles.id = ?
            AND vehicles.vehicle_condition_id = ?
            AND vehicles.mileage = ?
            AND vehicles.price = ?",
            params: [
                $args['vehicle_id'],
                $args['condition'],
                $args['mileage'],
                $args['price'],
            ],
        );
        //if the vehicle is not empty, no changes were made
        if (!empty($vehicle)){
            throw new Exception("No changes were made.");
        }

        // Update the vehicle
        $success = DB::query(
            sql: "UPDATE vehicles
            SET vehicle_condition_id = ?, mileage = ?, price = ?
            WHERE id = ?",
            params: [
                $args['condition'], 
                $args['mileage'], 
                $args['price'], 
                $args['vehicle_id']
            ]
        );

        if (!$success){
            throw new Exception('Failed to update vehicle.');
        }
    }
}
?>