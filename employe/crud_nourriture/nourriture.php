<?php 
session_start();
if((!$_SESSION['role'])=='employe'){
    header('location: ../../pages/signin.php');
}
include('../../employe/header_employe.php');
include('../../pages/connexion.php')
?>

<body>
<div class="container-fluid my-5"> 
    
    <div class="row justify-content-between ">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
            <h2 class="bg-success p-2 text-center">Nourir un animal</h2>    
            <form action="#" method="post" id="upload-box" enctype="multipart/form-data">
            <div class="form-group">
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
                    <div class="form-group">
                        <label for="date_nourriture" class="form-label">Date:</label>
                        <input type="date" name="date_nourriture" class="form-control" id="date_nourriture" value="<?= date("Y-m-d") ?>">
                    </div>

                    <div class="form-group">
                        <label for="heure_nourriture" class="form-label">Description:</label>
                        <input type="time" name="heure_nourriture" class="form-control" id="heure_nourriture" value="<?= date("H:i") ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="nourriture" class="form-label">Nourriture donnée:</label>
                        <input type="text" id="nourriture" name="nourriture" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="quantite_nourriture" class="form-label">Quantité (en Gr):</label>
                        <input type="text" id="quantite_nourriture" name="quantite_nourriture" class="form-control">
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
                    <h2 class="bg-success p-2 text-center">Alimentation des animaux</h2>
                    <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped align-middle text-center table-responsive" id="pagination">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">Animal:</th>
                                <th class="text-center">Date:</th>
                                <th class="text-center">Heure:</th>
                                <th class="text-center">Nourriture:</th>
                                <th class="text-center">Quantité(Gr):</th>
                                <th class="text-center">Action:</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="../employe.php" class="btn btn-secondary text-dark">Retour</a>
                    </div>
                </div> 
                </div>
        </div>
    </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="../../js/nourritureAjax.js"></script>
    </html>
