<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
$name = $mydata['nom'];
$firstname = $mydata['prenom'];
$email = $mydata['email'];
$password = $mydata['password'];
$role = $mydata['role'];
//Insert or update Data
if(!empty($name) && !empty($firstname) && !empty($email) && !empty($password) && $role != 0){
            $sql = $bd->prepare("UPDATE users SET nom=?,prenom=?, email=?, password=?,role=? WHERE id=?");
            $sql->execute(array($name,$firstname,$email,$password,$role,$id));
            if($sql == TRUE){
                echo "$firstname $name a été modifié !";
            }else{
                echo "Erreur d'enregistrement";
            }
} else {
    echo "Complétez tous les champs!";
};
?>