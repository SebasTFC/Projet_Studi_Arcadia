<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../admin/header_admin.php');
include('../../pages/connexion.php')
?>

<div class="container-fluid"> 
    <div class="col-12 mt-3">
        <div class="border p-3 justify-content-center">
            <h2 class="bg-success p-2 text-center">Compte-rendu des animaux:</h2>
            <div style="overflow-x: auto;">
                    <table class="table table-bordered align-middle table-responsive table-striped mx-1 text-center p-1" id="pagination" >
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">Animal:</th>
                                <th class="text-center">Image:</th>
                                <th class="text-center">Date:</th>
                                <th class="text-center">Etat:</th>
                                <th class="text-center">Détail:</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
            </div>
                    <div class="text-center mt-2">
                        <a href="../admin.php" class="btn btn-secondary text-dark">Retour</a>
                    </div>
        </div> 
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="../../js/crAjax.js"></script>
    </html>