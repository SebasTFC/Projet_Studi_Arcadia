$(document).ready(function (){
    $(document).on("click",function(){
        $("#msg").hide();
    });

    function showdata(){
        let output = "";
        $("#pagination").DataTable().destroy();
        $.ajax({
            url: "../../veterinaire/crud_visite/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
              if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].prenom+"</td><td style='text-align:center;'>"+x[i].date_etat+"</td><td>"+x[i].etat_etat+"</td><td>"+x[i].detail_etat+"</td><td style='text-align:center;'>"+"<button class='btn-del border-1 border-light ' data-sid="+x[i].id_etat +"><i class='bi bi-trash'></i></button></td></tr>";
                    $("#tbody").html(output); 
                     }
                     
                     $('#pagination').DataTable({
                        lengthMenu: [
                            [6, 10,-1],
                            [6, 10, 'Tous'],
                        ],
                        columnDefs: [
                            {
                                targets: 1,
                                render: DataTable.render.datetime('D MM YYYY')
                            }
                        ],
                       
                        order:[1,'desc'],
                        "info":     false,
                        pagingType: 'simple_numbers',
                        language: {
                            lengthMenu: 'Santé /Page: _MENU_',
                            search: 'Rechercher :',                                          
                        },
                    }); 
                 }     
             });
            };
            showdata();
            
    //Ajax Request for insert
    $("#upload-box").submit(function(e){
        e.preventDefault();
        $.ajax({
                url: "../../veterinaire/crud_visite/submit.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data){
                    $("#msg").show();
                    $("#msg").html(data);
                    $("#upload-box")[0].reset();
                    $("#pagination").DataTable().destroy();
                    showdata();
                    }
                }) 
        })
   
    // Ajax Request for deleting
    $("tbody").on("click",".btn-del",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../veterinaire/crud_visite/delete.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#msg").show();
                $("#msg").html(data);
                $("#upload-box")[0].reset();
                $("#pagination").DataTable().destroy();
                showdata();
                 }
                })
            }) 
        });
    
    
    