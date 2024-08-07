<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../employe/header_employe.php');
?>

<body>
<div class="container-fluid my-5"> 
    
    <div class="row justify-content-between ">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
        <h2 class="bg-success p-2 text-center">Création d'un service</h2>    
        <form action="#" method="post" id="upload-box" enctype="multipart/form-data">
                <div class="form-group p-1">
                   <!-- <input type="hidden" class="form-control" id="service_id"/>-->
                    <input type="text" class="form-control" name="service_id" id="service_id" style="display:none;"/>

                    <label for="nomservice" class="form-label">Nom du service:</label>
                    <input type="text" name="nomservice" class="form-control" id="nomservice">
                    <div style="color: red;" class="mt-1"id="nomError"></div>
                </div>

                <div class="form-group p-1">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" name="description" class="form-control" id="description">
                    <div style="color: red;" class="mt-1"id="descriptionError"></div>
                </div>
                
                <div class="form-group p-1">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <div style="color: red;" class="mt-1"id="imageError"></div>
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
                    <h2 class="bg-success p-2 text-center">Liste des services</h2>
                    <div style="overflow-x: auto;">
                    <table class="table table-bordered table-responsive align-middle table-striped text-center">
                        <thead class="table-success ">
                            <tr>
                                <th style="width:20%;">Nom:</th>
                                <th style="width:50%;">Description:</th>
                                <th style="width:20%;">Image:</th>
                                <th style="width:10%;">Action</th>
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
    
    <script src="../../js/serviceAjax.js"></script>
    </html>
