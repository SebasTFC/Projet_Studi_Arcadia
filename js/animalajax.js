

$(document).ready(function (){
   
    function validateprenomAnimal(){
      let prenom_animal = document.getElementById('prenomid').value;
      
      if(prenom_animal.length == 0){
          prenomError.innerHTML="Le prénom est requis";
          return true;
      } else {
          prenomError.innerHTML="";
          return false;
      } 
  };
  
  function validateraceAnimal(){
      let race_animal = document.getElementById('race').value;
      
      if(race_animal.length == 0){
          raceError.innerHTML="La race est requise";
          return true;
      } else {
          raceError.innerHTML="";
          return false;
      } 
  };
  
      // Ajax Request for retrieving data
      function showdata(){
          output = "";
          $("#pagination").DataTable().destroy();
          
          $.ajax({
              url: "../../admin/crud_animal/retrieve.php",
              method: "GET",
              dataType: "json",
              success: function(data){
                  if(data){
                      x=data;
                  }else{
                      x="";
                  }
                  for(i=0;i<x.length;i++){
                      output += "<tr><td>"+x[i].prenom+"</td><td>"+x[i].race+"</td><td style='text-align:center;'><img style='width:100px;' src='/images/" +x[i].image+ "'></td><td>"+x[i].nom+"</td><td>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-warning'data-sid=" +x[i].id +"><i class='bi bi-trash'></i></button></td></tr>";
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
                          lengthMenu: 'Animaux/Page: _MENU_',
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
          if(!validateprenomAnimal() && !validateraceAnimal()){
          $.ajax({
                  url: 'submit.php',
                  method: 'POST',
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  success: function(data){
                      $("#message").show();
                      $("#message").html(data);
                      $("#upload-box")[0].reset();
                      $('#btnadd').html("Enregistrer");
                      showdata();
                  }
                  });
              }
              validateprenomAnimal();
              validateraceAnimal();
      });  
  
      // Ajax Request for deleting
      $("tbody").on("click",".btn-del",function(){
          let id = $(this).attr("data-sid");
          mydata = {sid: id};
          $.ajax({
              url:"../../admin/crud_animal/delete.php",
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
              url:"../../admin/crud_animal/edit.php",
              method:"POST",
              dataType: "json",
              data: JSON.stringify(mydata),
              success:function(data){
                  $("#animal_id").val(data.id);
                  $("#prenomid").val(data.prenom);
                  $("#race").val(data.race);
                  $("#habitat").val(data.id_habitat);     
              }
          })
      });
      });
      
      