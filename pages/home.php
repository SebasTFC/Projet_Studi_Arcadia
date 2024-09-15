
<?php
include('header.php');
?>

<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Bienvenue au Zoo ARCADIA </h1>
    </div>
</div>
<!-- <div class="centrea"> -->
<section>
<div class="container">
        <div class="row justify-content-center m-4">
        <div class="col-12 col-lg-10">  
            <div class="border border-2 border-primary rounded-2 justify bg-secondary fst-italic text-dark p-4 ">
                <p> ARCADIA est un zoo situé en France,près de la forêt de Brocéliande,en Bretagne qui a été crée en 1960.Il possède    tout un panel d'animaux,réparti sur trois types d'habitats.Vous decouvrirez l'habitat des animaux dans leur    environnement naturel. Vous apprendrez les noms de chaque animal pour connaître leur état de forme au quotidien grace à    nos équipes de vétérinaires.
                 Plusieurs activitées vous seront proposées lors de votre visite au zoo dont un tour en petit train.Le zoo possède   egalement son service prope service de restauration.
                 </p>
                 <p class="text-center">Bonne visite à vous.</p> 
            </div>
        </div>
    </div>

    <article>
        <div class="mb-4 bg-danger rounded-5 p-3 ">
            <h3 class="text-dark text-center">Le zoo est divisé en plusieurs types d'habitats.</h3>
                <div class="row rounded-5 align-items-center"> 
                        <div class="col-12 col-lg-4">
                            <div class="text-center rounded-2">
                            <img src="/images/savane.jpg"  style="width: 300px;" alt="Photo de la savane" class="card-img-top rounded-2">
                            </div>
                            <p class="text-center fst-italic mt-2">La savane</p>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="text-center rounded-2">
                            <img src="/images/jungle.jpg"  style="width: 300px;" alt="Photo de la jungle"class="card-img-top rounded-2">
                            </div>
                            <p class="text-center fst-italic mt-2">La jungle</p>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="text-center rounded-2">
                            <img src="/images/marais.jpg"  style="width: 300px;" alt="Photo des marais"class="card-img-top rounded-2">
                            </div>
                            <p class="text-center fst-italic mt-2">Les marais</p>
                        </div>
                </div>
            <div class="pb-2 text-center">
                <a href="./habitats.php" class="btn btn-primary text-dark">Les habitas</a>
            </div> 
        </div>
        
    </article>

    <article>
        <div class="my-1 bg-danger rounded-5 p-1 ">
            <h3 class="text-center text-dark mt-1 p-2">Plusieurs services vous seront proposés.</h3>
            <div class="row justify-content-center mb-2">
                <div class="col-12 col-lg-4">
                        <h5 class="text-center fst-italic">Parking gratuit surveillé (gratuit)</h5>
                        <h5 class="text-center fst-italic">Le zoo est équipé de 2 services de restauration(Int/Ext)</h5>
                        <h5 class="text-center fst-italic">Possibilité de visiter le parc à bord d'un"petit-train"</h5>
                        <h5 class="text-center fst-italic">Un guide peut vous accompagner lors de votre visite (gratuit)</h5>
                </div>
            </div>
            <div class="text-center mt-2 p-2">
                <a href="./services.php" class="btn btn-primary text-dark">Nos services</a>
            </div>
        </div>
        
    </article>
   
    <article>
            <div class="mt-4 bg-danger rounded-5 p-3">
                <h3 class="text-center text-dark">Quelques exemples d'animaux que vous rencontrerez lors de votre visite.</h3>
                <div class="row justify-content-center"> 
                    <div class="col-12 col-lg-6 p-5">       
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/hippopotame.jpeg" class="d-block w-100 rounded" alt="Photo hippopotame"/>
                            </div>
                            <div class="carousel-item">
                                <img src="/images/crocodile.jpeg" class="d-block w-100 rounded"  alt="Photo Crocodile"/>
                            </div>
                            <div class="carousel-item">
                                <img src="/images/perroquet.jpeg" class="d-block w-100 rounded " alt="Photo perroquet"/>
                            </div>
                            <div class="carousel-item">
                                <img src="/images/serpent.jpeg" class="d-block w-100 rounded " alt="Photo serpent"/>
                            </div>
                            <div class="carousel-item">
                                <img src="/images/singe.jpeg" class="d-block w-100 rounded" alt="Photo singe"/>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden ">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden ">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <article>       
            <div class=" my-4 p-2 bg-danger rounded-5">
                <div class="col-12">
                    <h3 class="text-center">Avis des visiteurs:</h3>
                </div>
                <div class="col-12">   
                    <div class=" w-100 scroll_avis px-5">
                       <?php
                        $avis = $bd->prepare("SELECT * from avis WHERE validation =true ORDER BY date_avis DESC");
                        $avis -> execute();
                        while($c = $avis->fetch()){
                            echo '<h6 class="text-primary text-center">'
                            . htmlspecialchars($c['date_avis'])." : ". htmlspecialchars($c['pseudo']).'</h6>';
                            echo '<h6 class="text-secondary text-center pb-3 card-text fst-italic">'
                            . nl2br(htmlspecialchars($c['commentaire'])).'</h6>';    
                        }
                            ?>          
                    </div>
                </div> 
                <div class="col-12 p-1 text-center">             
                     <a href="./avis.php" class="btn btn-primary text-dark" >Donner votre avis</a>
                </div>    
            </div>          
            </div>
        </article>
</section>

<!--</div> -->
<?php
include('footer.php');

?>

