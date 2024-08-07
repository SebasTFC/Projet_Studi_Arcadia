<?php
session_start();
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
$ho = $mydata['h_ouv'];
$hf = $mydata['h_ferm'];

//update Data
if(!empty($ho) && !empty($hf)){
            $sql = $bd->prepare("UPDATE horaire SET h_ouv=?,h_ferm=? WHERE id=?");
            $sql->execute(array($ho,$hf,$id));
            if($sql == TRUE){
                echo "Horaire modifiée !";
            }else{
                echo "Erreur d'enregistrement";
            }
              
} else {
    echo "Complétez tous les champs!";
};

?>

