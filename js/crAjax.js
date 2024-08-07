$(document).ready(function (){
    $(document).on("click",function(){
        $("#msg").hide();
    });

    function showdata(){
        let output = "";
        $("#pagination").DataTable().destroy();
        $.ajax({
            url: "../../admin/consultation_veterinaire/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
              if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].prenom+"</td><td style='text-align:center;'><img style='width:100px;' src='../../images/" +x[i].image+ "'></td><td style='text-align:center;'>"+x[i].date_etat+"</td><td>"+x[i].etat_etat+"</td><td>"+x[i].detail_etat+"</td></tr style='text-align:center;'>";
                    $("#tbody").html(output); 
                     }
                     
                     $('#pagination').DataTable({
                        lengthMenu: [
                            [3, 10,-1],
                            [3, 10, 'Tous'],
                        ],
                        columnDefs: [
                            {
                                targets: 2,
                                render: DataTable.render.datetime('D MM YYYY')
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