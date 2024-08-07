<?php
session_start();
include_once('header.php');
include('connexion.php');
$message="";

try{    
    //$bd = new PDO('mysql:host=localhost;dbname=arcadiaZoo;charset=utf8;','root','');
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["btn-connection"])){
        if(!empty($_POST['email']) AND !empty($_POST['password'])){
            $token = bin2hex(random_bytes(32));
            $pseudo=htmlspecialchars($_POST['email']);
            $mdp=$_POST['password'];
            $recupUser = $bd->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $recupUser->execute(array($pseudo,$mdp));
            if($recupUser->rowcount()>0){
                  
                //$bdd->exec("UPDATE users SET token='$token' WHERE email = '$pseudo' AND password = '$mdp'");
                //setcookie('token',$token,time()+3600);
                $_SESSION['email']= $pseudo;
                $_SESSION['password']=$mdp;
                //$_SESSION['role']=$recupUser->fetch()['role'];
                //$_SESSION['nom']=$recupUser->fetch()['nom'];
                //$role=$_SESSION['role'];
                $res = $recupUser->fetchall();
                $role=$res[0]['role'];
                $nom=$res[0]['nom'];
                $prenom=$res[0]['prenom'];
                $_SESSION['role']=$role;
                $_SESSION['nom']=$nom;
                $_SESSION['prenom']=$prenom;
                
                header("Location:/$role/$role.php");
                }else{
                $message= "Mail ou de Mot de passe incorrect...";}
        }else{
            $message= "Veuillez completez tous les champs...";
        }
}
    }
catch(PDOException $e){
    echo "Erreur:".$e->getMessage();
    }   
?>
<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Connexion</h1>
    </div>
</div>
    <div class="centrea">
    <div class="container">
    <form method="POST" action="">
    <div class="row justify-content-center">
          <div class="col-7 text-center mb-1">
            <label class="form-label" for="email">Mail:</label>
            <input class="form-control" type="email"  id="email" name="email" placeholder="Entrez l'email..." autocomplete="off">
          </div>
          <div class="col-7 text-center mb-1">
            <label class="form-label" for="password">Mot de passe:</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Entrez le mot de passe..." autocomplete="off">
          </div>
    </div>
          <div class="text-center mt-2">
              <button type="submit" id="btnSignin" class="btn btn-primary text-dark" name="btn-connection" >Connection</button>
              <div style="color:red"></br><?php echo $message ?></div>
              <div id="response" style="color:red">
            </div>
        </div>
      </form>  
</div>
</div>
<?php
include_once('footer.php');
?>
