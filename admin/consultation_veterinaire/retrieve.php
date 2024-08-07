<?php
include('../../pages/connexion.php');

$sql = "SELECT visitemedicale.id_etat,visitemedicale.date_etat,visitemedicale.detail_etat,visitemedicale.etat_etat,animal.prenom,animal.image FROM `visitemedicale` 
INNER JOIN `animal`
WHERE visitemedicale.id_animal = animal.id";
$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>