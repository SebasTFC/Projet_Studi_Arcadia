<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: signin.php');
}
include'../../admin/header_admin.php';
?>
<body>
    <div class="container mt-5">
        <div class="row">
            <form id="myform" class="col-lg-4">
            <div class="border p-3 m-1">
                <h2 class="bg-success text-center p-2">Ajouter/Modifier horaire</h2>
                <div>
                    <input type="hidden" id="h_id"/>
                    <label for="h_ouverture" class="form-label">Heures d'ouverture:</label>
                    <input type="time" class="form-control" id="h_ouverture"/>
                </div>
                <div>
                    <label for="h_fermeture" class="form-label">Heures de fermeture:</label>
                    <input type="time" class="form-control" id="h_fermeture"/>
                </div>
                   
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-dark" style="display:none;" id="btnadd">Modifier</button>
                    <div class="alert alert-danger text-center" style="display:none; " id="msg"></div>
                </div>
            </div>
            </form>
            
                <div class="col-lg-8 text-center">
                <div class="border p-3 m-1">
                    <h2 class="bg-success p-2 mb-5">Horaires du zoo</h2>
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr class="table">
                                <th scope="col">Heure d'ouverture</th>
                                <th scope="col">Heures de fermeture</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                </div>
                </div>
            
        </div>
        <div class="text-center p-4">
            <a href="./../admin.php" class="btn btn-primary text-dark">Retour</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->
    <script src="../../js/hajax.js"></script>
  </body>
</html>