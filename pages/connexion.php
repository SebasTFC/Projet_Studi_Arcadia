<?php
//Mode serveur
if(getenv('JAWSDB_URL') !== false) {
    $dbparts = parse_url(getenv('JAWSDB_URL'));
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');
} else {
//Sinon mode Local
   $password = '';
   $username = 'root';
   $database = 'arcadiazoo';
   $hostname = 'localhost';
}
   try {
    $bd = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
    $bd ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
    }catch (Exception $e){
        echo "Erreur de connexion.Base de donnée pas trouvée.".$e->getMessage();
    }


?>