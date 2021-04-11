<?php
class Router {
  public function __construct() {$this->params = [];}
  public function init_params($url) {
    $parsed_url = parse_url($url);
    if(!$parsed_url) {echo 'Parsing error'; return;}
    $parsed_url = $parsed_url['query'];
    foreach(explode('&',$parsed_url) as $val) {$pair = explode('=', $val); $this->params[$pair[0]] = $pair[1];}
  }
  public function print_params() {
    $res = '';
    foreach($this->params as $key => $val) {$res .= "'$key': '$val', ";}
    $res = substr($res, 0, -2);
    $res = '{'.$res.'}';
    echo $res;
  }
}
?>
