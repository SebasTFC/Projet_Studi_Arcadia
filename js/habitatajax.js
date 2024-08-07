
$(document).ready(function (){

    // Ajax Request for retrieving data
    function showdata(){
        output = "";
        $.ajax({
            url: "../../admin/crud_habitat/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
                if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].nom+"</td><td><img style='width:100px;' src='../../images/"+x[i].image+"'></td><td>"+x[i].description+"</td><td>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-warning'data-sid=" +x[i].id + "><i class='bi bi-trash'></i></button></td></tr>";
                    $("#tbody").html(output);
                }
            }
        })  
    }
    showdata();
    
    // Ajax Request for insert
    $("#btnadd").click(function(e){
        e.preventDefault();
        let h_id = $("#habitat_id").val();
        let nm = $("#nameid").val();
        let image=document.getElementById('image').files[0];
        let image_name = image.name;
        let des = $("#description").val();
        mydata = {id: h_id,nom: nm,image: image_name,description: des};
        $.ajax({
            url: "../../admin/crud_habitat/insert.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                $("#msg").html(msg);
                $("#myform")[0].reset();
                showdata();
            },
        })
    });
    $("#btnupd").click(function(e){
        e.preventDefault();
        let h_id = $("#habitat_id").val();
        let nm = $("#nameid").val();
        let image=document.getElementById('image').files[0];
        let image_name = image.name;
        let des = $("#description").val();
        mydata = {id: h_id,nom: nm,image: image_name,description: des};
       
        $.ajax({
            url: "../../admin/crud_habitat/update.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                $("#msg").html(msg);
                $("#myform")[0].reset();
                btnadd = $('#btnadd').toggle("block");
                btnupd = $('#btnupd').toggle("none");
                showdata();
            },
        })
    });

    // Ajax Request for deleting
    $("tbody").on("click",".btn-del",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../admin/crud_habitat/delete.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                $("#msg").html(msg);
                showdata(); 
            },
        })
    });
    // Ajax Request for editing
    $("tbody").on("click",".btn-edit",function(){
        let btnadd = $('#btnadd').toggle("none");
        let btnupd = $('#btnupd').toggle("block");
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../admin/crud_habitat/edit.php",
            method:"POST",
            dataType: "json",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#habitat_id").val(data.id);
                $("#nameid").val(data.nom);
                $("#description").val(data.description);
            }
        })
    });
    });
    
    