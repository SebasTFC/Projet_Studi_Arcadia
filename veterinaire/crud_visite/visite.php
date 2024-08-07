<?php 
session_start();
if((!$_SESSION['role'])=='veterinaire'){
    header('location: ../../pages/signin.php');
}
include('../../veterinaire/header_veterinaire.php');
include('../../pages/connexion.php')
?>

<body>
<div class="container-fluid my-5"> 
    
    <div class="row justify-content-between ">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
            <h2 class="bg-success p-2 text-center">Renseigner l'état de l'animal:</h2>    
            <form action="#" method="post" id="upload-box" enctype="multipart/form-data">
            <div class="form-group pb-2">
                <label for="animal" class="form-label">Animal:</label>
                <select id="animal" name="animal" class="form-control">
                    <option value="0" >Choisir un animal</option>
                        <?php
                        $recupAnimal = $bd->query('SELECT * FROM animal');
                        while($animal = $recupAnimal->fetch()){
                        ?>
                        <option  value="<?= $animal['id'] ?>"><?= $animal['prenom']."(".$animal['race'].")"?></option>
                        <?php 
                        }
                        ?>
                </select>
            </div>
                    <div class="form-group pb-2">
                        <label for="date_visite" class="form-label">Date:</label>
                        <input type="date" name="date_visite" class="form-control" id="date_visite" value="<?= date("Y-m-d") ?>">
                    </div>
                    
                    <div class="form-group pb-2">
                    <label for="etat_visite" class="form-label">Etat :</label>
                    <select  id="etat_visite" name="etat_visite"class="form-control">
                        <option class="fst-italic" selected value="0">Etat de l'animal</option>
                        <option value="Grande forme">Grande forme</option>
                        <option value="Etat à surveiller">Etat stable</option>
                        <option value="Malade">Malade</option>
                    </select>
                </div>
                    
                    <div class="form-group pb-2">
                        <label for="detail_visite" class="form-label">Détail:</label>
                        <input type="text" id="detail_visite" name="detail_visite" class="form-control">
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary my-3">Enregistrer</button>
                    </div>
                    <div class="alert alert-danger text-center text-light" id="msg" style="display:none;"></div>          
                </form>
            </div>
            <br/><br/>
            </div> 
            
                <div class="col-lg-8 col-12">
                <div class="border p-3">
                    <h2 class="bg-success p-2 text-center">Etat de santé des animaux:</h2>
                    <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped align-middle text-center table-responsive" id="pagination">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">Animal:</th>
                                <th class="text-center">Date:</th>
                                <th class="text-center">Etat:</th>
                                <th class="text-center">Détail:</th>
                                <th class="text-center">Action:</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                    </div>
                    <br>
                    <div class="text-center mt-3">
                        <a href="../veterinaire.php" class="btn btn-secondary text-dark">Retour</a>
                    </div>
                </div> 
                </div>
        </div>
    </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="../../js/etatAjax.js"></script>
    </html>
