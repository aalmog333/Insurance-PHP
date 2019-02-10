<?php

if(isset($_POST['submit'])){
  
  if(isset($_POST['c_id']) && is_numeric($_POST['c_id'])){
    
    if(isset($_POST['phone']) && is_numeric($_POST['phone'])){
      
      $x = $_POST['c_id'];
      $y = $_POST['phone'];
      $result = $x + $y;
      
      echo "Result are: $result";
      echo '<br>' . $_POST['guid'];
      
    }   
  }  
}

?>
