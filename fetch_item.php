<?php
require_once('config.php');
// if id that send by the items.php is null return the id is null
if (isset($_GET['id']) == null){
    echo "The ID is Null";
}else{
    $itemid = $_GET["id"];
    $sql = " SELECT * FROM items WHERE item_id = '$itemid'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $item = $result->fetch_assoc();
        echo json_encode($item);
    }else{
        echo json_encode(["message"=>"Item no found"]);
    }
}
$conn->close();

?>