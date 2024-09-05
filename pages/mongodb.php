
<?php

require __dir__.'../../vendor/autoload.php'; // Include the MongoDB PHP driver

  // Ouverture de la connexion (localhost par défaut)
  if(getenv('MONGODB_URI') !== false) {
  $mongo = new MongoDB\Client(getenv("MONGODB_URI"));}
  else{
  $mongo = new MongoDB\Client("mongodb://localhost:27017/");
  }
  // Création de la database "db"
  $db = $mongo->selectDatabase("db");

  // Création de la collection "CompteAnimaux"
  $CompteAnimaux = $db->CompteAnimaux;
//echo "Connected successfully";
?>

