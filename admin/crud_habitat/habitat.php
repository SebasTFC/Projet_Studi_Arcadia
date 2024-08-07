<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../admin/header_admin.php');
?>

<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-between">
        <div class="col-lg-4 col-12">
        <div class="border p-3">
        <h2 class="bg-success text-center p-2">Ajouter/Modifier un habitat</h2>

            <form id="myform" method="POST" enctype="multipart/form-data">
                <div class="form-group p-1">
                    <input type="hidden" class="form-control" id="habitat_id"/>
                    <label for="nameid" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nameid"/>
                </div>
                <div class="form-group p-1">
                    <label class="form-label" for="image">Image de l'habitat</label>
                    <input type="file" class="form-control" id="image" name="image"/>
                </div>
                <div class="form-group p-1">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="description"/>
                </div>
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-dark" id="btnadd">Ajouter</button>
                    <button type="submit" class="btn btn-dark" style="display:none;" id="btnupd">Modifier</button>
                </div>
                <div id="msg"></div>
            </form>
            </div>
            <br/><br/>
            </div> 
                <div class="col-sm-8 text-center">
                <div class="border p-3">
                    <h2 class="bg-success p-2">Liste des habitats</h2>
                    <table class="table table-bordered align-middle table-striped text-center">
                        <thead>
                            <tr class="table">
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
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
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../../js/habitatajax.js"></script>
  </body>
</html>