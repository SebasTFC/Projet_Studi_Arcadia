<?php
session_start();
include('header.php');
include('connexion.php');
$ida = $_REQUEST['ida'];
$habitat = $bd->query("SELECT * FROM habitat where id=$ida");
while($habitats = $habitat->fetch()){
    $nom_h=$habitats['nom'];
}
?>
<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h2>Les animaux de la zone "<?= $nom_h ?>"</h2>
    </div>
</div>
<div class="centre">
    <!-- Afficher tous les membres -->
<div class="container">
    <div class="bg-danger rounded-5 pt-2">
        <div class="grid text-center"> 
            <div class="g-col-4 ">
                <?php
                    $recupServices = $bd->query("SELECT * FROM animal where id_habitat=$ida");
                    while($a = $recupServices->fetch()){
                        ?>
                    <a class="elem" href="afficheAnimaux.php?animal=<?= $a['id'] ?>"><img class="m-3" style="width:300px; height:200px;" src="../images/<?= $a['image'] ?>"/a>    
                        <?php
                     }
                ?>
            </div>
        </div>
    </div>
</div>
    <div class="p-4 text-center">
        <a href="./habitats.php" class="btn btn-primary text-dark">Retour</a>
    </div> 
</div>
<?php
    include('footer.php');
?>