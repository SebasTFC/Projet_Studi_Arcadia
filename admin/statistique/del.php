<?php
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;}

include('../../pages/mongodb.php');
$deleteResult = $CompteAnimaux->deleteOne(
    ['name' => $id]
);
printf("Deleted %d documents",$deleteResult->getDeletedCount());
header("Location: stat.php");
?>
