<?php


require 'Reservation.php'; //Appel du fichier contenant la class Reservation 
$reservation= new Reservation();    
  
$reservation->reservation_date = $_POST['date']; 
$reservation->reservation_heure = $_POST['time']; 
$reservation->reservation_place = $_POST['number']; 
$reservation->reservation_traverse = $_POST['varchar'];
$reservation->reservation_nomBateau  = $_POST['varchar'];
  
  
  
$reservation->inserer(); 
header('location:reservation.php');
?>


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

