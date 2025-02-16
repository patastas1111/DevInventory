<?php
require_once('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $unencrypted_password = $_POST["password"];
    
    
    $sql = "SELECT * FROM users WHERE user_email='$email'";

    $result = $conn->query($sql);
    // if email have the same value of the user_email 
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $hash = $row['user_password'];
            // Verify the hash code against the unencrypted password entered 
            $verify = password_verify($unencrypted_password, $hash); 
            if ($verify) {
                $_SESSION["login_email"] = $email;
                header(header: "Location: dashboard.php");
                exit();
            } else {
                echo "Please check you email or password";
            }
        }
    }else {
        echo "Please check you email or password";
    }
    

    
}else {
    echo "ERROR";
}

?>