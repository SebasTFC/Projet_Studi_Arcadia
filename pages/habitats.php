<?php
session_start();

include ('header.php');
include('connexion.php');
?>

<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Les habitas </h1>
    </div>
</div>
<div class="centre">
<h3 class="text-dark text-center m-5">Le zoo Arcadia se décompose en 3 types d'habitats.</h3>  
    <div class="container" style="width:100%;">
        
                    <?php
                        $recupHabitats = $bd->query('SELECT * FROM habitat');
                        while($habitat = $recupHabitats->fetch()){
                        $_REQUEST['ida']= $habitat['id'];
                        ?>
                    <div class="bg-danger rounded-5 my-4 p-1">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-lg-4 text-center m-2">
                                <h3 class="text-decoration-underline text-dark m-3"><?= $habitat['nom'] ?></h3>
                                <h5 class="m-3 text-primary fst-italic">" <?= $habitat['description'] ?>"</h5>
                                <a href="tapage.php?ida=<?= $habitat['id'] ?>" class="btn btn-primary text-dark">Animaux de l'habitat</a>
                            </div>
                            <div class="col-12 col-lg-4 m-3">
                                    <a class="elem" href="tapage.php?ida=<?= $habitat['id'] ?>"><img src="/images/<?= $habitat['image'] ?>" style="width:100%; heigth:100%px;" class="rounded-5 text-center"></a>
                            </div>
                        </div>
                        </div>
                    <?php
                    }
                    ?>
    <div class="m-4 text-center">
        <a href="./home.php" class="btn btn-primary text-dark">Revenir à l'accueil</a>
    </div> 
</div>
</div>
<?php
include_once('footer.php');
?>