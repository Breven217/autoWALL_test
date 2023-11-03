<?php

class Dispatcher {
    /**
     * Calls the requested function from the requested controller.
     *
     * @param string $controller
     * @param string $action
     * @return void
     */
    public function callFunction(
        string $controller, 
        string $action,
        array $args = []
        ): void
    {
        require_once(__DIR__ . "/controllers/$controller.php");
        $controller = new $controller();
        if (method_exists($controller, $action)) {
            try {
                echo json_encode($controller->$action($args));
            } catch (\Throwable $th) {
                echo json_encode(array("error" => $th->getMessage()));
            }
        } else {
            echo json_encode(array("error" => "Invalid action."));
        }
    }
}

//get the requested controller and action from the url
$dispatcher = new Dispatcher();
if (isset($_GET['action']) && isset($_GET['controller'])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $args = $_POST;
    } else {
        foreach ($_GET as $key => $value) {
            // Exclude 'controller' and 'action' from the args
            if ($key !== 'controller' && $key !== 'action') {
                $args[$key] = $value;
            }
        }
    }
    $dispatcher->callFunction(
        controller: $_GET['controller'], 
        action: $_GET['action'],
        args: $args ?? []
    );
} else {
    echo json_encode(array("error" => "Invalid request."));
}

?>