<?php
class Session {
   public function getUsername() {
      session_start();
      $val = $_SESSION["Username"];
      session_destroy();
      return $val;
   }
   public function getToken() {
      session_start();
      $val = $_SESSION["Token"];
      session_destroy();
      return $val;
   }
   public function getBasket() {
      session_start();
      $val =  $_SESSION["Basket"];
      session_destroy();
      return $val;
   }
}
?>
