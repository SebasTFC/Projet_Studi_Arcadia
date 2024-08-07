<?php
include('../../pages/connexion.php');
$sql = "SELECT * FROM `service`";
$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>