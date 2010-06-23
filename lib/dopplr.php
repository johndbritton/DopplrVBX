<?php

class Dopplr {  
  function status() {
    return 'is in San Francisco until June 25th.';
  }
  
  function name() {
    return 'John';
  }
  
  function local_time() {
    return 'Noon';
  }
  
  function timezone() {
    return 'GMT';
  }

  function is_travelling() {
    return TRUE;
  }
  
  private function traveller_info() {
    return 'stuff';
  }
  
}

?>
