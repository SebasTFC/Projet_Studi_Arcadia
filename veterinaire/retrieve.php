<?php
include('../pages/connexion.php');

$sql = "SELECT nourriture.id_nou,nourriture.date_nou,nourriture.heure_nou,nourriture.donnee_nou,nourriture.quantite_nou,animal.prenom FROM `nourriture` 
INNER JOIN `animal`
WHERE nourriture.id_animal = animal.id";
$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>