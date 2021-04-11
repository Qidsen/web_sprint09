<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Router</title>
</head>
<body>
    <?php
        include 'Router.php';
        $router = New Router();
        $router->init_params("http://localhost:8080/web_sprint09/t03/index.php/?data=somedata&filter=somefilter");
        $router->print_params(); 
    ?>
</body>
</html>
