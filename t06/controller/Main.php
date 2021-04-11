<?php
include '../view/View.php';

interface ControllerInterface {
  public function __construct();
  public function execute();
}

class Main implements ControllerInterface {
  public $view;
  public function __construct() {$this->view = new View(__DIR__.'/../model/index.php');}
  public function execute() {$this->view->render();}
}
$hello_world = new Main();
$hello_world->execute();
?>
