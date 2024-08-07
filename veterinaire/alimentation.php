<?php 
session_start();
if((!$_SESSION['role'])=='veterinaire'){
    header('location: ../../pages/signin.php');
}
include('../veterinaire/header_veterinaire.php');
?>

<body>
        <div class="container">
            <div class="col-12">
                <div class="justify-content-center mt-5">
                    <div class="border p-3 ">
                        <h2 class="bg-success p-2 text-center">Alimentation des animaux</h2>
                        <div style="overflow-x: auto;">
                        <table class="table table-bordered table-striped align-middle text-center table-responsive"id="pagination">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">Animal:</th>
                                    <th class="text-center">Date:</th>
                                    <th class="text-center">Heure:</th>
                                    <th class="text-center">Nourriture:</th>
                                    <th class="text-center">Quantité(Gr):</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>
                        </div>
                    <div class="text-center mt-3">
                        <a href="veterinaire.php" class="btn btn-secondary text-dark">Retour</a>
                    </div>
                    </div> 
                </div>
            </div>
        </div>
    </body>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>-->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="../../js/alimentationAjax.js"></script>
    </html>
