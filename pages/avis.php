<?php
include_once('header.php');
//include('connexion');
if(isset($_POST['submit_avis'])){
    if(isset($_POST['InputPseudo']) AND (isset($_POST['InputAvis']) AND !empty($_POST['InputPseudo']) AND !empty($_POST['InputAvis']))){
        $pseudo = htmlspecialchars($_POST['InputPseudo']);
        $avis =  html_entity_decode($_POST['InputAvis'], ENT_QUOTES);
        $date = date("Y-m-d H:i:s");
        $insert = $bd->prepare("INSERT INTO avis (pseudo, commentaire,date_avis, validation) VALUES(?,?,?,?)");
        $insert->execute(array($pseudo,$avis,$date,FALSE));
        $msg = "Votre commentaire a bien été posté!!";
        
    }else{
        $avis_erreur = "Tous les champs doivent être complètés ! ";
    }

}
?>
<div class="centre">
<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Donner votre avis sur le zoo</h1>
    </div>
</div>

<div class="container">
    <form method="POST">
        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <label for="InputPseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="InputPseudo" id="InputPseudo" placeholder="Votre pseudo...">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <label for="InputAvis" class="form-label">Mail:</label>
                <textarea type="text" class="form-control" id="InputAvis" name="InputAvis" rows="5" placeholder="Donnez votre avis...."></textarea>
            </div>
        </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary text-dark" value="Envoyer votre avis" name="submit_avis">
                <a class="btn btn-primary text-dark" href="./home.php">Retour</a>
                <br/><br/>
                <div style="color:red;">
                <?php
                    if(isset($avis_erreur)){ echo $avis_erreur;}
                ?>
               
                </div>

                <div class="text-dark"> <?php
                    if(isset($msg)){ echo $msg;}
                ?>
            </div>

    </form>
</div>
</div>
<?php
include_once('footer.php');
?>

