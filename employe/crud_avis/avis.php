<?php 
session_start();
if((!$_SESSION['role'])=='employe'){
    header('location: ../../pages/signin.php');
}
include('../../employe/header_employe.php');
?>

<body>
<div class="container my-5"> 
    
    <div class="row justify-content-between ">
            

            <div class="col-12 text-center">
                <div class="border p-3">
                    <h2 class="bg-success p-2 text-center">Avis des visiteurs:</h2>
                    <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped align-middle text-center table-responsive"id="pagination">
                        <thead class="table-success ">
                            <tr>
                                <th scope="col">Pseudo:</th>
                                <th scope="col">Commentaire:</th>
                                <th scope="col">Date:</th>
                                <th scope="col">Validation:</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="../employe.php" class="btn btn-secondary text-dark">Retour</a>
                        <div id="msg" style="display:none;"></div>
                    </div>
                    
                </div> 
                </div>
        </div>
    </div>
    </body>
    <script src="../../js/avisAjax.js"></script>
    </html>
