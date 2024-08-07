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

    
    $sql = "SELECT email FROM users WHERE email='$email'";
    $exist = $bd->query($sql);
    if (!$exist->rowCount()>0){
            $sql = $bd->prepare("INSERT INTO users(nom, prenom, email, password, role) VALUES (?,?,?,?,?)");
            $sql->execute(array($name,$firstname,$email,$password,$role));
            if($sql == TRUE){
                echo "$firstname $name a été enregistré";
            }else{
                echo "Erreur d'enregistrement";
            }
    }else{
        echo"Cette adresse mail existe déjà !";
    } ; 

    
?>