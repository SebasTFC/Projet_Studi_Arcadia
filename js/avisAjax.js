$(document).ready(function (){
    $(document).on("click",function(){
        $("#msg").hide();
    });

    // Ajax Request for retrieving data
    function showdata(){
        output = "";
        $.ajax({
            url: "../../employe/crud_avis/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
                if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].pseudo+"</td><td>"+x[i].commentaire+"</td><td style='text-align:center;'>"+x[i].date_avis+"</td><td style='text-align:center;'>"+x[i].validation+"</td><td>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-warning'data-sid=" +x[i].id + "><i class='bi bi-trash'></i></button></td></tr>";
                    $("#tbody").html(output);
                }
                $('#pagination').DataTable({
                    lengthMenu: [
                        [5, 10,-1],
                        [5, 10, 'Tous'],
                    ],
                    "info":     false,
                    pagingType: 'simple_numbers',
                    language: {
                        lengthMenu: 'Avis/Page: _MENU_',
                        search: 'Rechercher :',                                          
                    },
                });      
            }
        })  
    }
    showdata();
    
    // Ajax Request for deleting
    $("tbody").on("click",".btn-del",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../employe/crud_avis/delete.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#msg").show();
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+ data +"</div>";
                $("#msg").html(msg);
                $( '#pagination' ).DataTable().destroy();
                showdata(); 
            },
        })
    });
    // Ajax Request for editing
    $("tbody").on("click",".btn-edit",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../employe/crud_avis/edit.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                msg = "<div class='alert alert-dark mt-3 text-center' style='color:red;'>"+data+"</div>";
                $("#msg").show();
                $("#msg").html(msg);
                $( '#pagination' ).DataTable().destroy();
                showdata(); 
            },
        })
    });
    });
    
    