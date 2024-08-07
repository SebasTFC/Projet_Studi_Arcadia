<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../admin/header_admin.php');
?>

<body>
<div class="container-fluid mt-5"> 
    
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
            

                <div class="col-sm-8 text-center">
                <div class="border p-3">
                    <h2 class="bg-success p-2">Liste des services</h2>
                    <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped text-center align-middle table-responsive" id="pagination" >
                        <thead>
                            <tr  class="table-success">
                                <th scope="col">Nom:</th>
                                <th scope="col">Description:</th>
                                <th scope="col">Image:</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                </div>
                <div class="text-center m-3">
                        <a href="../admin.php" class="btn btn-secondary text-dark">Retour</a>
                    </div> 
                </div>
            </div>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>-->
    <script src="../../js/serviceAjax.js"></script>
    
    
    
    </html>
