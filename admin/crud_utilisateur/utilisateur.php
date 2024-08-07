<?php 
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../admin/header_admin.php');
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-between ">
        <div class="col-lg-4 col-12">
        <div class="border p-3">
        <h2 class="bg-success text-center p-2">Ajouter/Modifier Utilisateur</h2>
            <form id="myform" method="POST">
               
                <div>
                    <input type="hidden" class="form-control" id="util_id"/>
                    <label for="nameid" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nameid"/>
                    <div style="color: red;" class="mt-1"id="nomError"></div>
                </div>
                <div>
                    <label for="firstnameid" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" id="firstnameid"/>
                    <div style="color: red;" class="mt-1" id="prenomError"></div>
                </div>
                <div>
                    <label for="emailid" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="emailid"/>
                    <div style="color: red;" class="mt-1"id="emailError"></div>
                </div>
                <div>
                    <label for="passwordid" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="passwordid" autocomplete="off"/>
                    <div style="color: red;" class="mt-1"id="passwordError"></div>
                </div>
                <div>
                    <label for="roleid" class="form-label">Rôle :</label>
                    <select  id="roleid" class="form-control">
                        <option class="fst-italic" selected value="0">Choisir le Rôle</option>
                        <!--<option value="admin">Administrateur</option>-->
                        <option value="veterinaire">Vétérinaire</option>
                        <option value="employe">Employé</option>
                    </select>
                </div>
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-dark" id="btnadd">Ajouter</button>
                    <button type="submit" class="btn btn-dark" style="display:none;" id="btnupd">Modifier</button>
                    <button type="submit" class="btn btn-dark" id="annule">Annuler</button>
                </div>
                <div id="msg"></div>
            </form>
            </div>
            <br/><br/>
            </div> 
                <div class="col-lg-8 col-12 text-center">
                <div class="border p-3">
                    <h2 class="bg-success p-2">Liste des utilisateurs</h2>
                    <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped align-middle text-center table-responsive">
                        <thead>
                            <tr class="table">
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Rôle</th>
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
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../../js/jqajax.js"></script>
  </body>
</html>