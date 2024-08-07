<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../admin/header_admin.php');
include('../../pages/connexion.php');
?>

<body>
<div class="container-fluid my-5"> 
    <div class="row justify-content-between">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
            <h2 class="bg-success p-2 text-center">Création/Modification d'un animal</h2>    
            <form action="#" method="post" id="upload-box" enctype="multipart/form-data">
                <div class="form-group p-1">
                    <input type="hidden" class="form-control" id="habitat_id"/>
                    <input type="text" class="form-control" name="animal_id" id="animal_id" style="display:none;"/>
                    <label for="prenomid" class="form-label">Prénom:</label>
                    <input type="text" name="prenomid" class="form-control" id="prenomid">
                    <div style="color: red;" class="mt-1"id="prenomError"></div>
                </div>

                <div class="form-group p-1">
                    <label for="race" class="form-label">Race:</label>
                    <input type="text" name="race" class="form-control" id="race">
                    <div style="color: red;" class="mt-1"id="raceError"></div>
                </div>
                    
                <div class="form-group p-1">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <div style="color: red;" class="mt-1"id="imageError"></div>
                </div>

                <div class="form-group p-1">
                    <label for="habitat" class="form-label">Habitat:</label>
                    <select id="habitat" name="habitat" class="form-control">
                        <?php
                        $recupHabitats = $bd->query('SELECT * FROM habitat');
                        while($habitat = $recupHabitats->fetch()){
                        ?>
                        <option  value="<?= $habitat['id'] ?>"><?= $habitat['nom']?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>

                <div class="text-center p-1">
                    <button type="submit" class="btn btn-secondary my-4" id="btnadd">Enregistrer</button>
                </div>
                <div class="alert alert-danger text-center" id="message" style="display:none;"></div>           
            </form>
            </div>
            <br/><br/>
        </div> 
            
                <div class="col-lg-8 col-12">
                    <div class="border p-3">
                        <h2 class="bg-success p-2 text-center">Liste des animaux</h2>
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped text-center align-middle table-responsive" id="pagination" >
                                <thead class="table-success ">
                                    <tr>
                                        <th scope="col">Prénom:</th>
                                        <th scope="col">Race:</th>
                                        <th scope="col">Image:</th>
                                        <th scope="col">Habitat:</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="../admin.php" class="btn btn-secondary text-dark">Retour</a>
                        </div>
                    </div> 
                </div>
        </div>
    </div>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="../../js/animalajax.js"></script>
</body>
</html>