<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

if(!empty($id)){
    $sql = "DELETE FROM nourriture WHERE id_nou = {$id}";
    if($bd->query($sql) == TRUE){
        echo "La pature a été supprimé";
    }else{
        echo "Erreur de suppression!";
    }  
}
?>