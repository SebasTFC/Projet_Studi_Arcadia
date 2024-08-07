$(document).ready(function (){
    
    // Ajax Request for retrieving data
    function showdata(){
        output = "";
        $.ajax({
            url: "../../admin/crud_horaire/retrieve.php",
            method: "GET",
            dataType: "json",
            success: function(data){
                if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].h_ouv+"</td><td>"+x[i].h_ferm+"</td><td>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id + "><i class='bi bi-pencil-square'></i></button>";
                    $("#tbody").html(output);
                }
            }
        })  
    }
  
    showdata();
    
    // Ajax Request for update
    $("#btnadd").click(function(e){
        e.preventDefault();
        
        let id = $("#h_id").val();
        let ho = $("#h_ouverture").val();
        let hf = $("#h_fermeture").val();
        mydata = {id: id,h_ouv: ho,h_ferm: hf};
        $.ajax({
            url: "../../admin/crud_horaire/update.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                $("#msg").show();
                $("#msg").html(data);
                $("#myform")[0].reset();
                showdata();
                $("#btnadd").toggle('none');
            },
        })
        });
    });
    
    // Ajax Request for editing
    $("tbody").on("click",".btn-edit",function(){
        
        $("#btnadd").toggle('block');
        $("#msg").hide();
        let id = $(this).attr("data-sid");
        mydata = {sid: id};
        $.ajax({
            url:"../../admin/crud_horaire/edit.php",
            method:"POST",
            dataType: "json",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#h_id").val(data.id);
                $("#h_ouverture").val(data.h_ouv);
                $("#h_fermeture").val(data.h_ferm);
            },
        })
    });
    
    
    