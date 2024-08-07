<?php
include('../../pages/connexion.php');
    $date=htmlspecialchars($_POST['date_visite']);
    $etat = htmlspecialchars($_POST['etat_visite']);
    $detail = htmlspecialchars($_POST['detail_visite']);
    $id_animal = htmlspecialchars($_POST['animal']);
        if(!empty($date) &&  !empty($etat) && !empty($id_animal) && ($etat!="0")){
            if ($id_animal > 0){
            $sql = $bd->prepare("INSERT INTO visitemedicale(date_etat,etat_etat,detail_etat, id_animal) VALUES (?,?,?,?)");
            $sql->execute(array($date,$etat,$detail,$id_animal));             
                if($sql == TRUE){
                    echo "L'etat médical est enregistré !";
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