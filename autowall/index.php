<!DOCTYPE html>
<html lang="en">
  <body>
    <?php
        //extract out the requested page from the url
        $request = explode(
            '?', 
            str_replace('/autowall', '', $_SERVER['REQUEST_URI'])
            )[0];
        $viewDir = '/public/views/';

        //set the default page to inventory
        if ($request === '/' || $request === '') {
            $request = 'inventory';
        }

        //route to the correct page, or 404 if it doesn't exist
        $fileName = __DIR__ . $viewDir . $request . '.php';
        if (file_exists($fileName)){
            require(__DIR__ . $viewDir . 'app.php');
            require($fileName);
        }
        else {
            http_response_code(404);
            require __DIR__ . $viewDir . '404.php';
        }
    ?>
  </body>
</html>
