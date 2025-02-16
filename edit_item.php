<?php
require_once('config.php');
$data = json_decode(    file_get_contents("php://input"));
if (isset($data->id) && isset($data->name) && isset($data->mac) && isset($data->sn) && isset($data->brand)) {
    $item_id = $conn->real_escape_string($data->id);
    $item_name = $conn->real_escape_string($data->name);
    $item_mac =$conn->real_escape_string($data->mac);
    $item_sn = $conn->real_escape_string($data->sn);
    $item_brand = $conn->real_escape_string($data->brand);
    $sql = "UPDATE items SET item_name='$item_name', item_mac='$item_mac', item_sn='$item_sn',  item_brand='$item_brand' WHERE item_id=$item_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Missing requirements";
}

$conn->close();
?>