<?php 
session_start();
if((!$_SESSION['role'])=='employe'){
    header('location: signin.php');
}
include'../employe/header_employe.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Employe</title>
</head>
<body>
    
    <div class="text-center m-2">
        <h2 class="mt-2" style="font-size:70px; text-decoration:underline;">DASHBOARD Employé</h2>
        <h3  style="text-decoration:none;">Bienvenue  <?php echo $_SESSION['prenom'].' '.$_SESSION['nom'] ?></h3>
        <h3 style="text-decoration:none;"><?php echo $_SESSION['email'] ?></h3> 
        </br>
        </br>
        <img style="width:300px ;"class="p-2" src="/images/logo_zoo.png" alt="Logo">
    </div>
</body>
</html>