<?php
require_once('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE user_email='$email'";

    $result = $conn->query($sql);
    // if email have the same value of the user_email 
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            if ($row['user_password'] == $password){
                $_SESSION["login_email"] = $email;
                header(header: "Location: dashboard.php");
                exit();
            }else{
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