<?php
include('connexion.php');

$sql = "SELECT * FROM animals where id_habitat={$id}";
$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>