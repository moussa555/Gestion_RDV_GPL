// ============JS pour supprimer les lignes rdv gpl d'une table 
      
            $(document).ready(function () {
                      
            $('.deletebtn').on('click', function() {
                              
               $('#deletemodal').modal('show');
               $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function() {
                   return $(this).text();
                    }).get();

                 console.log(data);

               $('#delete_id').val(data[0]);

                  });
                });

                // ============JS pour supprimer les lignes rdv gpl d'une table 
      
            $(document).ready(function () {
                      
               $('.deletebtn-ing').on('click', function() {
                                 
                  $('#deletemodal-ing').modal('show');
                  $tr = $(this).closest('tr');
   
                     var data = $tr.children("td").map(function() {
                      return $(this).text();
                       }).get();
   
                    console.log(data);
   
                  $('#delete_id_ing').val(data[0]);
   
                     });
                   });
//<!-- ============ End JS pour supprimer les lignes dune table ============-->
//<!-- =========== recupérer le id dune ligne pour valider ==========-->

            $(document).ready(function () {
            $('.Btnvalider').on('click', function() {
                              
               $('#validatemodal').modal('show');
               $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function() {
                   return $(this).text();
                    }).get();

                 console.log(data);

               $('#validate_id').val(data[0]);

                  });
                });


//<!-- ============= message d'erreur/succès ==============-->
/*  $(document).ready(function(){
            $("#close").on('click', function(){
            $(".result").hide();
          });
        });*/
//<!-- ============= end message d'erreur/succès ==============-->
//<!-- ============= tooltip ==============-->

       $(function () {
       $('[data-toggle="tooltip"]').tooltip()
              })
