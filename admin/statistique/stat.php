<?php
session_start();
if((!$_SESSION['role'])=='admin'){
    header('location: ../../pages/signin.php');
}
include('../../admin/header_admin.php');
include('../../pages/mongodb.php');
$document = [];

?>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 m-4">
        <table class="table table-primary table-striped text-center">
            <thead class="table table-info">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nb de click</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ordre= 1;
                $cursor = $CompteAnimaux->find(
                );
                foreach ($cursor as $document) {
                    echo '<tr>';
                    echo '<th scope="row">'.$ordre.'</th>';
                echo '<td>' .@$document['name']. '</td>';
                echo '<td>' .@$document['nbClick']. '</td>';
                echo '<td>  <a href="del.php?id=' .@$document['name']. '"class=\'edit\'><i class=\'bi bi-trash\'></i></a></td>';
                $ordre = $ordre+1;
                    }
                ?>

                </tr>
            </tbody>
        </table>
        <div class="text-center pb-2">
                        <a href="../admin.php" class="btn btn-secondary text-dark">Retour</a>
                    </div>
</div>
</div>
</div>
</body>