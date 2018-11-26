<?php
    class Reservation { 
      
    public $reservation_date;  
    public $reservation_place; 
    public $reservation_heure; 
    public $reservation_aller;
    public $reservation_retour;
    public $reservation_allerretour;
    
    
    
      
      
    public function inserer() { 
  
    $connection = new PDO('mysql:dbname=easycafet;host=127.0.0.1', 'root', 'azerty'); 
      
    $connection->exec("INSERT INTO easycafet (reservation_date, reservation_place, reservation_heure, reservation_aller, reservation_retour, reservation_allerretour) 
    VALUES ('" . $this->reservation_date . "','" . $this->reservation_place . "','" . $this->reservation_heure . "','" . $this->reservation_aller . "','" . $this->reservation_retour . "','" . $this->reservation_allerretour . "')"); 
    }   
}     
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

