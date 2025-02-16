<?php
require_once('config.php');

if (isset($_POST['id']) == null) {
    echo "null value";
}else {
    $item_id = $_POST['id'];
    $sql = "DELETE FROM items WHERE item_id=$item_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

?>