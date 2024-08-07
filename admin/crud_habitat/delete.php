<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

if(!empty($id)){
    $sql = "DELETE FROM habitat WHERE id = {$id}";
    if($bd->query($sql) == TRUE){
        echo "L'habitat a été supprimé";
    }else{
        echo "Erreur de suppression!";
    }  
}
?>