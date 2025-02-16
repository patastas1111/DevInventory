<?php
require_once('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = $_POST["email"];
    $unencrypted_password = $_POST["password"];
    $address = $_POST["address"];
    //hashing
    $hash = password_hash($unencrypted_password, PASSWORD_DEFAULT); 
    $password = $hash;
    $sql = "SELECT * FROM users WHERE user_email= '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['user_email'] . "<br>User Exist";
        }
    }else{
        $sql_insert = "INSERT INTO users (user_email, user_password, user_address) VALUES('$email', '$password', '$address')";
        if ($conn->query($sql_insert) === TRUE){
            header(header: "Location: index.php");
            exit();
        }else{
            echo "Error" . $sql_insert ."<br>". $conn->error;
        }
    }
}else {
    echo "Error Data";
}

?>