<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];
$res = $bd->query("SELECT validation FROM avis WHERE id = {$id}")->fetch();
if($res['validation'] == TRUE){
    $sql = "UPDATE avis SET validation=FALSE WHERE id = {$id}";
    echo "Le commentaire n'est pas validé !";
   
    } else {
    $sql = "UPDATE avis SET validation=TRUE WHERE id = {$id}";
    echo "Le commentaire est validé !";
}

$result = $bd->query($sql);
//$row = $result->fetch();
//echo json_encode($row);
?>