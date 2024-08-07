<?php
include('../../pages/connexion.php');

    $id=$_POST['animal_id'];
    $prenom=htmlspecialchars($_POST['prenomid']);
    $race=htmlspecialchars($_POST['race']);
    $habitat=htmlspecialchars($_POST['habitat']);
    //$target=basename($_FILES['image']['name']);
    $target=$_FILES['image']['name'];
    $ext=pathinfo($target,PATHINFO_EXTENSION);
    $imgData = $_FILES['image']['tmp_name'];
   
        if(empty($target)){
            echo "Complétez tous les champs!";
             }else{
                if($ext!="jpg" && $ext!="jpeg" && $ext!="png"){
                echo("Format exigé: jpg,jpeg ou png!!!");
                }else{
                     if($_FILES['image']['size']>5000000){
                        echo 'Fichier trop volumineux!!';
                      } else{
                        move_uploaded_file($imgData,"/php/images/".$target);
                         
                                if ($id > 0){
                                    $sql = $bd->prepare(" UPDATE animal SET prenom=?,race=?,image=?, id_habitat=? WHERE id=?");
                                    $sql->execute(array($prenom, $race, $target, $habitat, $id));
                                    if($sql == TRUE){
                                        echo "Animal modifié !";
                                         
                                    }else{
                                        echo "Erreur de modification!";
                                    }
                                }else{
                                        $sql = $bd->prepare("INSERT INTO animal(prenom, race, image,id_habitat) VALUES (?,?,?,?)");
                                        $sql->execute(array($prenom,$race,$target,$habitat));
                                    
                                        if($sql == TRUE){
                                            echo "Animal enregistré !";
                                        }else{
                                            echo "Erreur d'enregistrement";
                                        }
                                }
                            }
                      }
                      
            }
            
            
          
           
?>

