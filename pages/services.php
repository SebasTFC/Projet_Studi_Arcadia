<?php
session_start();
include('header.php');
include('connexion.php');

?>
<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Les services du zoo </h1>
    </div>
</div>
<div class="centrea">

    <!-- Afficher tous les services du zoo -->
    <div class="container mb-3">
        <div class="text-center px-2">
    <?php
        $recupServices = $bd->query('SELECT * FROM service');
        while($service = $recupServices->fetch()){
            ?>
                    <div class="row mt-3 p-1 bg-danger rounded-5 align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="text-center rounded-2 p-3">
                                <img style="width: 300px;"  src="/images/<?= $service['image'] ?>"alt="...">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h3 class="mb-3" style="color:black; text-decoration:underline;"><?= $service['nom'] ?></h3>
                            <p class="fst-italic">"<?= $service['description'] ?>"</p>
                        </div>
                    </div>
            <?php
        }
    ?>
    <!-- Fin Afficher tous les services-->
        <a class="btn btn-primary text-dark mt-3" href="./home.php">Retour</a>
        </div>
    </div>
</div>
<?php
    include('footer.php');
?>

                





