<?php
include('../../pages/connexion.php');
    $date=htmlspecialchars($_POST['date_nourriture']);
    $heure=htmlspecialchars($_POST['heure_nourriture']);
    $nourriture = htmlspecialchars($_POST['nourriture']);
    $quantite = htmlspecialchars($_POST['quantite_nourriture']);
    $id_animal = htmlspecialchars($_POST['animal']);
        if(!empty($date) && !empty($heure) && !empty($nourriture) && !empty($quantite) && !empty($id_animal)){
            if ($id_animal > 0){
            $sql = $bd->prepare("INSERT INTO nourriture(date_nou,heure_nou,donnee_nou,quantite_nou, id_animal) VALUES (?,?,?,?,?)");
            $sql->execute(array($date,$heure,$nourriture,$quantite,$id_animal));             
                if($sql == TRUE){
                    echo "La pature est enregistré !";
                }else{
                    echo "Erreur d'enregistrement";
                    }
                }else{
                    echo "Choisissez un animal";
                }
            }else {
                echo "Complétez tous les champs!";
            };
?>