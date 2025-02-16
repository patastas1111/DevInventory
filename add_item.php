<?php
require_once('config.php');
$data = json_decode(    file_get_contents("php://input"));
if(isset($data->item_name) && isset($data->item_mac) && isset($data->item_sn) && isset($data->item_brand)){
    $item_name = $conn->real_escape_string($data->item_name);
    $item_mac = $conn->real_escape_string($data->item_mac);
    $item_sn = $conn->real_escape_string($data->item_sn);
    $item_brand = $conn->real_escape_string($data->item_brand);

    $sql = "INSERT INTO items (item_name, item_mac, item_sn, item_brand) VALUES ('$item_name', '$item_mac', '$item_sn', '$item_brand')";
    $result = $conn->query($sql);   

        if ($result == true){
            echo "Submit Successfully";
        } else{
         echo "Error:" . $conn->error;
                }
} else{
    echo "Missing requirements";
}
$conn->close();
?>