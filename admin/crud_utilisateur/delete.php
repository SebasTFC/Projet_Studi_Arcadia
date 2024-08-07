<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];
if(!empty($id)){
        $sql_role = "SELECT role FROM users WHERE id = {$id}";
        $res=$bd->query($sql_role);
        $row = $res->fetch();
        if($row['role']!='admin'){
            $sql = "DELETE FROM users WHERE id = {$id} && role !='admin'";
            if($bd->query($sql) == TRUE){
                echo "L'utilisateur a été supprimé";
            }else{
                echo "Erreur de suppression!";
            } 
        }else {
            echo "Impossible d'effacer un administrateur !";
        }
   
}
?>