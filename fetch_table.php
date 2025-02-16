<?php
require_once('config.php');


$data = array();
$sql="SELECT * FROM items";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data[] = $row;
}
}
$conn->close();

echo json_encode($data);    
?>