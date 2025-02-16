<?php
  
  // The unencrypted password to be hashed 
  $unencrypted_password = "abcdefg"; 
  
  // The hash of the password can be saved in the database
  $hash = password_hash($unencrypted_password, PASSWORD_DEFAULT); 
  
  // Print the generated hash code
  echo "Generated hash code: ".$hash; 
?>