$(document).ready(function (){
   

    function validatenomservice(){
        let nom_service = document.getElementById('nomservice').value;
        
        if(nom_service.length == 0){
            nomError.innerHTML="Le nom du service est requis";
            return true;
        } else {
            nomError.innerHTML="";
            return false;
        } 
    };
    
    function validatedescriptionservice(){
        let description = document.getElementById('description').value;
        
        if(description.length == 0){
            descriptionError.innerHTML="La description est requise";
            return true;
        } else {
            descriptionError.innerHTML="";
            return false;
        } 
    };

    // Ajax Request for retrieving data
    function showdata(){
        output = "";
        $.ajax({
            url: "../../admin/crud_service/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
                if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].nom+"</td><td>"+x[i].description+"</td><td><img style='width:100px;' src='../../images/"+x[i].image+"'></td><td>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-light'data-sid=" +x[i].id + "><i class='bi bi-trash'></i></button></td></tr>";
                    $("#tbody").html(output);
                } 
                $('#pagination').DataTable({
                    lengthMenu: [
                        [3, 10,-1],
                        [3, 10, 'Tous'],
                    ],
                    "info":     false,
                    pagingType: 'simple_numbers',
                    language: {
                        lengthMenu: 'Services/Page: _MENU_',
                        search: 'Rechercher :',                                          
                    },
                });    
            }
            
        })      
    }
    showdata();
    
      //Ajax Request for insert
      $("#upload-box").submit(function(e){
        e.preventDefault();
        $( '#pagination' ).DataTable().destroy();
        if(!validatenomservice() && !validatedescriptionservice()){
        $.ajax({
                url: 'submit.php',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data){
                    showdata();
                    $("#message").show();
                    $("#message").html(data);
                    $("#upload-box")[0].reset();
                    $('#btnadd').html("Enregistrer");
                    
                }
                });
            }
            validatenomservice();
            validatedescriptionservice();
    });  

    

    // Ajax Request for deleting
    $("tbody").on("click",".btn-del",function(){
        $( '#pagination' ).DataTable().destroy();
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../admin/crud_service/delete.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#message").html(data);
                $("#upload-box")[0].reset();
                showdata(); 
            },
        })
    });

    // Ajax Request for editing
    $("tbody").on("click",".btn-edit",function(){
        $('#btnadd').html("Modifier");
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../admin/crud_service/edit.php",
            method:"POST",
            dataType: "json",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#service_id").val(data.id);
                $("#nomservice").val(data.nom);
                $("#description").val(data.description);
            }
        });
    })
    });