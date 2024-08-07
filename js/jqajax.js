
$(document).ready(function (){

    function validateNom(){
        let nom = document.getElementById('nameid').value;
        
        if(nom.length == 0){
            nomError.innerHTML="Le nom est requis";
            return true;
        } else {
            nomError.innerHTML="";
            return false;
        } 
    };
    
        function validatePrenom(){
            let prenom = document.getElementById('firstnameid').value;
            if(prenom.length == 0){
                prenomError.innerHTML="Le prénom est requis";
                return true;
            } else {
                prenomError.innerHTML="";
                return false;
            }
    };  

    function validatePassword(){
        
        let passworde = document.getElementById('passwordid').value;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
        if(!passworde.match(passwordRegex)){
            passwordError.innerHTML="Le mot de passe n'est pas valide";
            return true;
        } else {
            passwordError.innerHTML="";
            return false;
        }  
    }
    function validateEmail(){
        let emaile = document.getElementById('emailid').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        if(emaile.length == 0){
            emailError.innerHTML="L'email est requis";
            return true;
        }
        if(!emaile.match(emailRegex)){
            emailError.innerHTML="L'adresse n'est pas valide";
            return true;
        }
        emailError.innerHTML='';
        return false;
        
    }

    // Ajax Request for retrieving data
    function showdata(){
        output = "";
        $.ajax({
            url: "../../admin/crud_utilisateur/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
                if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].nom+"</td><td>"+x[i].prenom+"</td><td>"+x[i].email+"</td><td>"+x[i].password+"</td><td> "+x[i].role+"</td><td> <button class='border-1 border-success btn-edit'data-sid=" +x[i].id + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-light'data-sid=" +x[i].id + "><i class='bi bi-trash'></i></button></td></tr>";
                    $("#tbody").html(output);
                }
            }
        })  
    }
   
    showdata();
    $("#annule").click(function(e){
        e.preventDefault();
        msg = "";
        $("#msg").html(msg);
        $("#myform")[0].reset();
        showdata();
        $('#btnupd').hide();
        $('#btnadd').show();
    });



    // Ajax Request for insert
    $("#btnadd").click(function(e){
        e.preventDefault();
        let ut_id = $("#util_id").val();
        let nm = $("#nameid").val();
        let pn = $("#firstnameid").val();
        let em = $("#emailid").val();
        let pw = $("#passwordid").val();
        let rl = $("#roleid").val(); 
        mydata = {id: ut_id,nom: nm,prenom: pn,email: em,password: pw,role: rl};
        if(!validatePassword() && !validateEmail() && !validateNom() && !validatePrenom()){

        $.ajax({
            url: "../../admin/crud_utilisateur/insert.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                $("#msg").html(msg);
                $("#myform")[0].reset();
                showdata();

            },
        })  
    }else {
        validatePrenom();
        validateNom();
        validateEmail();
        validatePassword();
};
    });

     // Ajax Request for update
     $("#btnupd").click(function(e){
        e.preventDefault();
        let ut_id = $("#util_id").val();
        let nm = $("#nameid").val();
        let pn = $("#firstnameid").val();
        let em = $("#emailid").val();
        let pw = $("#passwordid").val();
        let rl = $("#roleid").val(); 
        mydata = {id: ut_id,nom: nm,prenom: pn,email: em,password: pw,role: rl};
        if(!validatePassword() && !validateEmail()){
        $.ajax({
            url: "../../admin/crud_utilisateur/update.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                $("#msg").html(msg);
                $("#myform")[0].reset();
                showdata();
                $('#btnupd').hide();
                $('#btnadd').show();
            },
        })
        };
    });

    // Ajax Request for deleting
    $("tbody").on("click",".btn-del",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../admin/crud_utilisateur/delete.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#msg").html(msg);
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                showdata(); 
            },
        })
    });
    // Ajax Request for editing
    $("tbody").on("click",".btn-edit",function(){
        $('#btnupd').show();
        $('#btnadd').hide();
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        
        $.ajax({
            url:"../../admin/crud_utilisateur/edit.php",
            method:"POST",
            dataType: "json",
            data: JSON.stringify(mydata),
            success:function(data){
                
                if(data.role == "admin"){
                    msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>Impossible de modifier un administrateur</div>";
                    $("#msg").html(msg);
                    $("#myform")[0].reset();
                }else{
                $("#util_id").val(data.id);
                $("#nameid").val(data.nom);
                $("#firstnameid").val(data.prenom);
                $("#emailid").val(data.email);
                $("#passwordid").val(data.password);
                $("#roleid").val(data.role);
                msg="";
                $("#msg").html(msg);
                
                }
            }
        });
    });
    });
    
    