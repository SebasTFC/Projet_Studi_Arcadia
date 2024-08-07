<?php
include('../../pages/connexion.php');
$sql = "SELECT animal.id,animal.prenom,animal.race,animal.image,animal.id_habitat,habitat.nom FROM `animal` 
INNER JOIN `habitat`
WHERE animal.id_habitat = habitat.id ";
$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>