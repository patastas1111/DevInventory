<?php
session_start();  // Start the session

// Destroy all session data
session_unset();  // Removes all session variables
session_destroy();  // Destroys the session


// Redirect to the login page after logging out
header("Location: index.php");
exit();
?>
