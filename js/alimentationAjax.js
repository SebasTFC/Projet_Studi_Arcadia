$(document).ready(function (){
    $(document).on("click",function(){
        $("#msg").hide();
    });

    function showdata(){
        let output = "";
        $("#pagination").DataTable().destroy();
        $.ajax({
            url: "../../veterinaire/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
              if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].prenom+"</td><td style='text-align:center;'>"+x[i].date_nou+"</td><td>"+x[i].heure_nou+"</td><td>"+x[i].donnee_nou+"</td><td style='text-align:center;'>"+x[i].quantite_nou+"</td></tr style='text-align:center;'>";
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
                                render: DataTable.render.datetime('D/MM/YYYY')
                            } 
                        ],
                       
                        order:[1,'desc'],
                        "info":     false,
                        pagingType: 'simple_numbers',
                        language: {
                            lengthMenu: 'Pature /Page: _MENU_',
                            search: 'Rechercher :',                                          
                        },
                    }); 
                 }     
             });
            };
            showdata();
            
        });
    
    