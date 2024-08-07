<?php
include('../../pages/connexion.php');
    $id=$_POST['service_id'];
    $nomservice=htmlspecialchars($_POST['nomservice']);
    $description=htmlspecialchars($_POST['description']);
    $target=basename($_FILES['image']['name']);
    $ext=pathinfo($target,PATHINFO_EXTENSION);

        if(empty($target)){
            echo "Complétez tous les champs!";
             }else{
                if($ext!="jpg" && $ext!="jpeg" && $ext!="png"){
                echo("Format exigé: jpg,jpeg ou png!!!");
                }else{
                     if($_FILES['image']['size']>1000000){
                        echo 'Fichier trop volumineux!!';
                      } else{
                            move_uploaded_file($_FILES['image']['tmp_name'],"C:\PHP\images/".$target);
                                if ($id > 0){
                                    $sql = $bd->prepare(" UPDATE service SET nom=?,description=?,image=? WHERE id=?");
                                    $sql->execute(array($nomservice, $description ,$target, $id));
                                    if($sql == TRUE){
                                        echo "Service modifié !";
                                    }else{
                                        echo "Erreur de modification!";
                                    }
                                }else{
                                        $sql = $bd->prepare("INSERT INTO service(nom, description, image) VALUES (?,?,?)");
                                        $sql->execute(array($nomservice,$description,$target));
                                    
                                        if($sql == TRUE){
                                            echo "Service enregistré !";
                                        }else{
                                            echo "Erreur d'enregistrement";
                                        }
                                }
                            }
                      }
            };
?>