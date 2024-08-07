<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
$name = $mydata['nom'];
$image = $mydata['image'];
$description = $mydata['description'];
//Insert or update Data
if(!empty($name) && !empty($image) && !empty($description)){
            $sql = $bd->prepare("UPDATE habitat SET nom=?,image=?, description=? WHERE id=?");
            $sql->execute(array($name,$image,$description,$id));
            if($sql == TRUE){
                echo "L'habitat a été modifié";
            }else{
                echo "Erreur d'enregistrement";
            }
} else {
    echo "Complétez tous les champs!";
};
    
?>