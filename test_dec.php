<?php
  // Plaintext password entered by the user 
  $unencrypted_password = "abcdefg"; 
  
  // The hashed password can be retrieved from database 
  $hash ="$2y$10$4ckzM0Kn9CEIJXiPmnDZcOWuqPFYCblR/4hblSecNSs3xZS.3V8ZK";
 
  
  // Verify the hash code against the unencrypted password entered 
  $verify = password_verify($unencrypted_password, $hash); 
  
  // Print the result depending if they match 
  if ($verify) {
       echo 'Correct Password!'; 
       }
 
  else { 
      echo 'Password is Incorrect';
       } 
?>