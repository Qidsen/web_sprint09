<?php
class View {
  public $value;
  public function __construct($value) {$this->value = file_get_contents($value);}
  public function render() {echo $this->value;}
}
?>
