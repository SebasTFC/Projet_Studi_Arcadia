
<?php

require __dir__.'../../vendor/autoload.php'; // Include the MongoDB PHP driver

  // Ouverture de la connexion (localhost par défaut)
  $mongo = new MongoDB\Client(getenv("MONGODB_URI"));
  
  // Création de la database "db"
  $db = $mongo->selectDatabase("db");

  // Création de la collection "CompteAnimaux"
  $CompteAnimaux = $db->CompteAnimaux;
//echo "Connected successfully";
?>

