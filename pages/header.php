<?php
include('connexion.php');

$recupUser = $bd->query('SELECT * FROM horaire');
            $recupUser->execute();
            if($recupUser->rowcount()>0){
            $heure =$recupUser->fetchall();
           $heureouverture = substr($heure[0]['h_ouv'],0,-3);
           $heurefermeture = substr($heure[0]['h_ferm'],0,-3);
          }
   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akronim&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz@8..144&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../scss/main.css">
    <link rel="stylesheet" href="../../node_modules\bootstrap-icons\font\bootstrap-icons.min.css">
   
    <title>Index</title>
</head>

<body>
    <header>
      <nav class="navbar navbar-expand-lg bg-dark "data-bs-theme="dark">
        <div class="container-fluid">
          <img class="navbar-brand logo" src="/images/logo_zoo.png" alt="Logo du zoo"/>
          <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-secondary" href="./home.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="./habitats.php">Les habitats</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="./services.php">Nos services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="./contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary"  href="./signin.php">Connexion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    
