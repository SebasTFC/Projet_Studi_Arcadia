<?php
session_start();
include('header.php');
include('connexion.php');
include('mongodb.php');

$id_animal = $_REQUEST['animal'];
?>
<div class="img_fond_zoo text-center">
    <div class="img_fond_zoo_content">
       <h1>Les animaux en détail</h1>
    </div>
</div>
<div class="centre">
    <div class="container-fluid">
    <?php
    $recupServices = $bd->query("SELECT animal.id,animal.prenom,animal.race,animal.image,habitat.nom,habitat.id,visitemedicale.etat_etat,visitemedicale.date_etat,visitemedicale.id_animal,visitemedicale.detail_etat,nourriture.donnee_nou,nourriture.quantite_nou,nourriture.date_nou,nourriture.id_animal FROM `animal`
    INNER JOIN `habitat` ON animal.id_habitat=habitat.id
    INNER JOIN `visitemedicale` ON animal.id=visitemedicale.id_animal
    INNER JOIN `nourriture` ON animal.id=nourriture.id_animal 
    WHERE animal.id=$id_animal ORDER BY visitemedicale.date_etat DESC, nourriture.date_nou DESC");
    $animal = $recupServices->fetch();

        if(empty($animal['etat_etat']) && empty($animal['detail_etat']) && empty($animal['date_nou'])  && empty($animal['donnee_nou'])){
                $recupServices = $bd->query("SELECT animal.id,animal.prenom,animal.race,animal.image,habitat.nom,habitat.id FROM `animal`
                INNER JOIN `habitat` ON animal.id_habitat=habitat.id
                WHERE animal.id=$id_animal");
                    $animal = $recupServices->fetch();
                    ?>
                    <div class="row mt-5 p-1 bg-dark rounded-5 align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="text-center rounded-2 p-3">
                                <img style="width: 300px;"  src="../images/<?= $animal['image'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-white text-center">
                            <label class="fst-italic">Prénom :</label>
                            <span <p  >"<?= $animal['prenom'] ?>"</p></span>

                            <label class="fst-italic">Race :</label>
                            <span<p><?= $animal['race'] ?></p></span>

                            <label class="fst-italic">Son habitat :</label>
                            <span<p><?= $animal['nom'] ?></p></span>

                            <label class="fst-italic">Nouvel animal au zoo :</label>
                            <span<p>Le vétérinaire n'a pas encore vu l'animal qui n'a pas encore mangé.</p></span>
                            </div>
                    </div>
                  
         <?php
                 
        }else {
            ?>
        
                    <div class="row mt-5 p-1 bg-dark rounded-5 align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="text-center rounded-2 p-3">
                                <img style="width: 300px;"  src="../images/<?= $animal['image'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-white text-center">
                            <label class="fst-italic">Prénom :</label>
                            <span  <p id="pre">"<?= $animal['prenom'] ?>"</p></span>

                            <label class="fst-italic">Race :</label>
                            <span<p><?= $animal['race'] ?></p></span>

                            <label class="fst-italic">Son habitat :</label>
                            <span<p><?= $animal['nom'] ?></p></span>
                            
                            <label class="fst-italic">Dernier état de santé :</label>
                            <span<p><?= $animal['etat_etat'] ?> le <?= date("d-m-Y", strtotime($animal['date_etat'])) ?></p></span>

                            <label class="fst-italic">Détail de sa santé :</label>
                            <span<p><?= $animal['detail_etat'] ?></p></span>

                            <label class="fst-italic">Dernière pature :</label>
                            <span<p>Le <?= date("d-m-Y", strtotime($animal['date_nou'])) ?> : <?= $animal['quantite_nou'] ?> grammes de <?= $animal['donnee_nou'] ?> </p></span>
                           
                        </div>
                    </div>
                    
         <?php
        } 


          ?>
    
       
    <!-- Fin Afficher tous les services-->
    </div>
    <div class="p-4 text-center">
        <a href="./habitats.php" class="btn btn-primary text-dark">Retour</a>
        <p class="mt-1 text-light">Une vue de plus pour <?= $animal['prenom'] ?>.Merci pour lui!!!</p>
    </div> 
</div>

<?php 

$prenom=  $animal['prenom']; 
$document = [
           "name" => $prenom,
           "nbClick" => 1
         ];

       
$result = $CompteAnimaux->updateOne(
         ["name"=> $prenom],
          ['$inc'=>["nbClick"=>1]],
         ["upsert"=> true]   
);
    include('footer.php');
    
?>