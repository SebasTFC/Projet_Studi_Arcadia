<?php
include_once('header.php');      
?>


<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Inscription</h1>
    </div>
</div>
<div class="centre">
<div class="container">
    <form>
          <div class="input-group">
            <label for="nom">Nom</label>
            <input type="text"  id="nom" onkeyup="validateName()"placeholder="Entrez le nom..." autocomplete="off">
            <span  style="margin:5px;"id="nom-error"></span>
          </div>

          <div class="input-group">
            <label for="prenom">Prenom</label>
            <input type="text"  id="prenom" onkeyup="validatefirstName()"placeholder="Entrez le nom..." autocomplete="off">
            <span  style="margin:5px;"id="nom-error"></span>
          </div>

          <div class="input-group">
            <label for="email">Mail:</label>
            <input type="email"  id="email" onkeyup="validateEmail()"placeholder="Entrez l'email..."autocomplete="off">
            <span style="margin:5px;" id="email-error"></span>
          </div>
       
          <div class="input-group">
              <label for="role">Fonction :</label>
                <select  id="role" class="border border-2  border-bottom-0 border-end-0 border-black">
                  <option value="admin">Administrateur</option>
                  <option value="veterinaire">Vétérinaire</option>
                  <option value="employe">Employé</option>
                </select>
          </div>
      
          <div class="input-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password"  onkeyup="validatePassword()" placeholder="Entrez le mot de passe...">
            <span style="margin:5px;" id="password-error"></span>
          </div>
      
          <div class="input-group">
              <label for="passwordConfirm" >Confirmation:</label>
              <input type="password" id="passwordConfirm"  onkeyup="validatePasswordConfirm()" placeholder="Confirmation...">
              <span style="margin:5px;" id="passwordConfirm-error"></span>
          </div>
      
          <div class="text-center my-3">
              <button onclick="send(event)" id="btn-inscription">Inscription</button>
              <div id="response" style="color:red">
            </div>
        </div>
      </form>    
</div>
</div>

<?php
include_once('footer.php');
?>
