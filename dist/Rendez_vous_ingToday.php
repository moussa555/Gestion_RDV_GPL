 
<?php include('sidenav.php'); ?>      

<div id="layoutSidenav_content">
     <main>
         <div class="container-fluid">
            <h1 class="py-4">Rendez-Vous Pour Aujourd'hui</h1>
               <div id="result"></div>
               
             <!-- ======================== table rdv gpl=========== -->
             <div class="card mb-5">
                 <div class="card-header"><i class="fas fa-table mr-1"></i>Consultation Ingénieur
                 </div>                            
                 <div class="card-body">
                    <input type="text" id="myInput" class="float-right" onkeyup="myFunction()" placeholder="Entrer le Nom du Client">
                 <div class="form-group"> 	
                    <!--		Show Numbers Of Rows 		-->
                     <select class  ="form-control col-md-2" name="state" id="maxRows">
                      <option value="5000">Afficher Tout</option>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                   </select>
                 </div>
                 <div class="table-responsive">
                    <?php $select = "SELECT * FROM rendez_vous_ing WHERE jour = CURDATE()";
                         $result = mysqli_query($con, $select);?>
                         <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Nº</th>
                                     <th>Nom</th>
                                     <th>Prénom</th>
                                     <th>Téléphone</th>
                                     <th>Voiture</th>
                                     <th>Paiement (DA)</th>
                                     <th>S/A</th>
                                 </tr>
                             </thead>
                            <?php
                            if($result)
                          {
                            $ligne=1; 
                          foreach($result as $rows)
                         { ?>
                       <tbody>
                             <tr>
                               <td class="column0" style="display:none"><?php echo $rows['id']; ?></td>
                               <td class="column1"><?php echo $ligne; ?></td>
                               <td class="column2"><?php $rows['nom']; echo strtoupper($rows['nom']);?></td>
                               <td class="column3"><?php $rows['prenom']; echo ucwords($rows['prenom']);?></td>
                               <td class="column4"><?php echo $rows['telephone'];?></td>
                               <td class="column5"><?php echo $rows['voiture'];?></td>
                               <td class="column6" style="display:none"><?php echo $rows['jour'];?></td>
                               <td class="column7" style="display:none"><?php echo $rows['heure'];?></td>
                               <td class="column8" style="display:none"><?php echo $rows['type_controle'];?></td>
                               <td class="column9"><?php echo $rows['paiement'];?></td>
                               <td class="column11 py-1"><?php
                                              if($rows['statut'] =="validé"){ ?>
                                                            <div class="row d-flex justify-content-center">
                                                              <button class="icon-awessome mr-2 mt-1 " data-toggle="tooltip" data-placement="left" title="Rendez-Vous Validé"><i class="fas fa-check-circle color-icon-val"></i></button>
                                                              <button class="icon-awessome ml-1 mt-1" data-toggle="tooltip" data-placement="left" title="Voir les Détails"><i class="fas fa-eye Btndetails color-icon"></i></button>
                                                            </div>
                                                              <?php  } 
                                              elseif($rows['statut'] =="") { ?>
                                                          <div class="row d-flex justify-content-center mt-1">
                                                             <button class="icon-awessome mr-1" data-toggle="tooltip" data-placement="left" title="Rendez-Vous En Attente"><i class="fas fa-sync color-icon-att"></i></button>
                                                            <div class="drop">
                                                            <button class="icon-awessome ml-2" data-toggle="dropdown"><i class="fas fa-chevron-circle-down color-icon" data-toggle="tooltip" data-placement="left" title="Opération"></i></button>
                                                              <div class="dropdown-menu pl-2">
                                                                <button type="button" class="Btnvalider icon-awessome" data-toggle="tooltip" data-placement="top" title="Valider Ce Rendez-Vous"><i class="fas fa-check-circle color-icon"></i></button>
                                                                <button type="button" name="Btnupdate" class="updatebtn icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fas fa-edit color-icon"></i></button>
                                                                <button type="button" name="Btndelete" class="deletebtn icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fas fa-trash-alt color-icon"></i></button>                         
                                                                <button type="button" name="btn_details" class="Btndetails icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Voir les Détails"><i class="fas fa-eye color-icon"></i></button>
                                                             </div>
                                                           </div>
                                                          </div>
                                                  <?php   }?>
                                          </td>
                             </tr>
                           </tbody>
                         <?php $ligne++;}  } ?>
                         </table>                              
                     </div>
                                     
         <!--		Start Pagination -->
         <div class="pagination-container float-right">
           <nav>
             <ul class="pagination">
               <li data-page="prev" >
                    <span> << <span class="sr-only">(current)</span></span>
               </li>
              <!--	Here the JS Function Will Add the Rows -->
               <li data-page="next" id="prev">
                  <span> >> <span class="sr-only">(current)</span></span>
               </li>
             </ul>
           </nav>
         </div>
        </div>
        </div>
      </div>  
         <!--============================ confirmation de la validation avec un modal/pop up====================-->                              
         <div class="modal fade" id="validatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog"> 
               <div class="modal-content" role="document">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel"> Valider Un Rendez-Vous </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="">&times;</span>
                   </button>
                 </div>
                 <form action="" method="POST">
                   <div class="modal-body">
                        <input type="hidden" name="validate_id" id="validate_id">
                    <h5 align="center">Confirmer la Validation de ce Rendez-Vous</h5>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-light" data-dismiss="modal">  Annuler </button>
                     <button type="submit" name="validate-Rdv" class="btn btn-primary" value="<?php echo $rows['id'];?>">Confirmer</button>
                   </div>
                 </form>        
               </div>
             </div>
         </div>
          <!--============================ confirmation de la suppression avec un modal/pop up====================-->                              
          <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog"> 
               <div class="modal-content" role="document">
                 <div class="modal-header">
                   <h6 class="modal-title" id="exampleModalLabel"> Supprimer Un Rendez-Vous </h6>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <form action="" method="POST">
                   <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                    <h5 align="center">Confirmer la Supprission de Ce Rendez-Vous?</h5>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-light" data-dismiss="modal">  Annuler </button>
                     <button type="submit" name="deletedata" class="btn btn-primary" value="<?php echo $rows['id'];?>">Confirmer</button>
                   </form>        
                 </div>
               </div>
             </div>
         </div>
        <!--============================ voir les détail un modal/pop up====================-->                              
         <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog"> 
               <div class="modal-content" role="document">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel"> Détails De Rendez-Vous </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="">&times;</span>
                   </button>
                 </div>
                   <div class="modal-body">
                     <div class="GFGclass" id="divGFG"></div>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-light" data-dismiss="modal">  Fermer </button>
                   </div>
               </div>
             </div>
         </div>
     </main>
     <footer class="py-4 bg-light">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SARL Éco Gaz Amine 2021</div>
                            <div>
                                <a>Privacy Policy</a>
                                &middot;
                                <a>Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                  </footer>   
 </div>
</div>   
<!--================================== EDIT  modal=======================================-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
 <div class="modal-content">
   <div class="modal-header ">
     <div class="header-content">
       <h5 class="modal-title" id="exampleModalLabel"> Modifier un rendez-vous </h5>
     </div>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
       <form method="POST">
         <div class="modal-body">
            <input type="hidden" name="update_id" id="update_id">   
            <div class="form-row justify-content-center">
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="nom">Nom :</label>
                   <input class="form-control py-2" name="nom" id="nom" type="text" placeholder="Entrer Votre Nom" required="" /></div>
                </div>
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="prenom">Prénom :</label>
                   <input class="form-control py-2" name="prenom" id="prenom" type="text" placeholder="Entrer Vtre Prénom" required="" /></div>
               </div>
            </div>
            <div class="form-row justify-content-center">
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="telephone">Téléphone :</label>
                   <input class="form-control py-2" name="telephone" id="telephone" type="number" placeholder="Entrer un Numéro de Téléphone" required=""/></div>
               </div>
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="marque">Voiture :</label>
                   <input class="form-control py-2" name="marque" id="marque" type="text" placeholder="Entrer la marque de la Voiture" required=""/></div>
               </div>
           </div>
           <div class="form-row justify-content-center">
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="jour">Date :</label>
                   <input class="form-control py-2" name="jour" id="jour" type="date" placeholder="" required=""/></div>
               </div>
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="heure">Heure :</label>
                   <input class="form-control py-2" name="heure" id="heure" type="time"/></div>
               </div>
           </div>
           <div class="form-row justify-content-center">
               <div class="form-group col-md-10" id="div2">
                   <label class="small mb-1" for="">Type de Contrôle:</label>
                    <select name="controle-type"  class="form-control" id="type_controle">
                       <option  value="Contrôle 2600">Contrôle 2600</option>
                       <option  value="montage GPL">montage GPL</option>
                       <option  value="AR (8000)">AR (8000).</option>
                    </select>
                </div>
           </div>
           <div class="form-row justify-content-center">
               <div class="form-group col-md-10">
                 <label class="small mb-1" for="paiement">Paiement en DA</label>
                 <input class="form-control py-2" name="paiement" id="paiement" type="number" placeholder="Prix Payé" required=""/>
               </div>
           </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal" id="modal-close">Annuler</button>
            <input type="submit" name="updatedata" id="update_data" class="btn btn-primary mr-5" value="Modifier" />
            <div class="ml-3"></div>
         </div>
       </form>
   </div>
</div>

<?php 
if(isset($_POST['updatedata'])){
$id= $_POST['update_id'];
$nom = addslashes($_POST['nom']);  
$prenom = addslashes($_POST['prenom']);
$telephone = $_POST['telephone'];  
$marque = addslashes($_POST['marque']);
$jour = $_POST['jour'];  
$heure = $_POST['heure'];
$type_controle = addslashes($_POST['controle-type']);
$paiement = $_POST['paiement'];
$update = " UPDATE rendez_vous_ing SET 
nom ='$nom',
prenom='$prenom', 
telephone='$telephone', 
voiture='$marque',
jour='$jour',
heure='$heure',
type_controle='$type_controle',
paiement='$paiement'
WHERE id= '$id' ";
$result = mysqli_query($con, $update);

if($result) 
{ ?>
<script>
$(document).ready(function(){
$("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Rendez-Vous Modifié Avec Succès</span><button id=\"close\">&times</button></div></div>");
setTimeout(function(){  
     $('#result').fadeOut("Slow");  
   }, 5000);
});
</script>
<?php
}

else {
?>
<script>
$(document).ready(function(){
$("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Érreur ! Veuiller Réessayer.</span><button id=\"close\">&times</button></div></div>");
setTimeout(function(){  
     $('#result').fadeOut("Slow");  
   }, 5000);
});
</script>
<?php
} ?>
<script>
(function()
{
if( window.localStorage )
{
if( !localStorage.getItem('firstLoad') )
{
localStorage['firstLoad'] = true;
window.location.reload();
}  
else
localStorage.removeItem('firstLoad');
}
})();

</script>
<?php } 
?>

<!--============================ valider rdv gpl php====================-->                              
<?php

if(isset($_POST['validate-Rdv']))
{
$id = $_POST['validate_id'];

$query = "update rendez_vous_ing SET statut = 'validé', date_validation = CURDATE() WHERE rendez_vous_ing.id='$id'";
$query_run = mysqli_query($con, $query);

if($query_run) 
{ ?>
<script>
$(document).ready(function(){
$("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Rendez-Vous Valider Avec Succès</span><button id=\"close\">&times</button></div></div>");
setTimeout(function(){  
     $('#result').fadeOut("Slow");  
   }, 5000);
});
</script>
<?php
}

else {
?>
<script>
$(document).ready(function(){
$("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Érreur ! Veuiller Réessayer.</span><button id=\"close\">&times</button></div></div>");
setTimeout(function(){  
     $('#result').fadeOut("Slow");  
   }, 5000);
});
</script>
<?php
} ?>
<script>
(function()
{
if( window.localStorage )
{
if( !localStorage.getItem('firstLoad') )
{
localStorage['firstLoad'] = true;
window.location.reload();
}  
else
localStorage.removeItem('firstLoad');
}
})();

</script>
<?php } ?>

<!--============================ supprimer un rdv php====================-->                              
<?php

if(isset($_POST['deletedata']))
{
$id = $_POST['delete_id'];

$query = "DELETE FROM rendez_vous_ing WHERE id='$id'";
$query_run = mysqli_query($con, $query);

if($query_run) 
{ ?>
<script>
$(document).ready(function(){
$("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Rendez-Vous Supprimer Avec Succès</span><button id=\"close\">&times</button></div></div>");
setTimeout(function(){  
     $('#result').fadeOut("Slow");  
   }, 5000);
});
</script>
<?php
}

else {
?>
<script>
$(document).ready(function(){
$("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Érreur ! Veuiller Réessayer.</span><button id=\"close\">&times</button></div></div>");
setTimeout(function(){  
     $('#result').fadeOut("Slow");  
   }, 5000);
});
</script>
<?php
} ?>
<script>
(function()
{
if( window.localStorage )
{
if( !localStorage.getItem('firstLoad') )
{
localStorage['firstLoad'] = true;
window.location.reload();
}  
else
localStorage.removeItem('firstLoad');
}
})();

</script>
<?php } ?>

<!-- =========== voir les details ==========-->

<script>
 $(document).ready(function () {
           
 $('.Btndetails').on('click', function() {
                   
    $('#detailmodal').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
         }).get();

      console.log(data);

  
    var a =
  $(this).parents("tr").find(".column2").text();
  var c =
  $(this).parents("tr").find(".column3").text();
         var d =
  $(this).parents("tr").find(".column4").text();
  var e = 
  $(this).parents("tr").find(".column5").text();
  var f = 
  $(this).parents("tr").find(".column6").text();
  var j = 
  $(this).parents("tr").find(".column7").text();
  var h = 
  $(this).parents("tr").find(".column8").text();
  var i = 
  $(this).parents("tr").find(".column9").text();
 
 
    var p = "";
         // CREATING DATA TO SHOW ON MODEL
         p += 
   "<p id='a' name='column2' >Nom : "
           + a + " </p>";
           p +=
   "<p id='c' name='column3'>Prénom : " 
           + c + "</p>";
         p += 
   "<p id='d' name='column4' >Téléphone : "
           + d + " </p>";
         p += 
   "<p id='e' name='column5' >Voiture : "
           + e + " </p>";
           p += 
   "<p id='f' name='column6' >Date Rendez-Vous : "
           + f + " </p>";
           p += 
   "<p id='j' name='column7' >Heur Rendez-Vous : "
           + j + " </p>";
           p += 
   "<p id='h' name='column8' >type de controle : "
           + h + " </p>";
          
           p += 
   "<p id='i' name='column9' >Paiement : "
           + i + " </p>";

            //CLEARING THE PREFILLED DATA
         $("#divGFG").empty();
         //WRITING THE DATA ON MODEL
         $("#divGFG").append(p);

       });
     });
</script>
<!-- =============================JS pour modifier les lignes d'une table =====================--> 
<script>
 $(document).ready(function () {
 $('.updatebtn').on('click', function() {
    $('#editmodal').modal('show');
    $tr = $(this).closest('tr');
       var data = $tr.children("td").map(function() {
        return $(this).text();
         }).get();
      console.log(data);
     $('#update_id').val(data[0]);
    $('#nom').val(data[2]);
    $('#prenom').val(data[3]);
    $('#telephone').val(data[4]);
    $('#marque').val(data[5]);
    $('#jour').val(data[6]);
    $('#heure').val(data[7]);
    $('#type_controle').val(data[8]);
    $('#paiement').val(data[9]);

       });
     });
</script> 


<script>  
$(document).ready(function(){
            $("#close").on('click', function(){
            $(".result").hide();
          });
        });
  </script>

<script src="js/pagination.js"></script>
