
<?php 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Éco Gaz Amine</title>
        <!-- CSS only -->
        <!-- CSS only -->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="css/mystyle.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>

          <?php include('sidenav.php'); ?>
    <!--=========================================================================-->
                    <!--====== nombre total rdv gpl======-->
           <?php 
            $count_RdvGpl = "SELECT * from rendez_vous_gpl";
            $result = mysqli_query($con, $count_RdvGpl);
            $nbrrdvgpl = mysqli_num_rows($result);

                      /*====== nbr rdv today======*/
            $today_RdvGpl = "SELECT * from rendez_vous_gpl WHERE jour = CURDATE()";
            $result = mysqli_query($con, $today_RdvGpl);
            $nbrrdvgpl_today = mysqli_num_rows($result);

                    /*====== nbr rdv valider today======*/
            $today_RdvGpl_validate = "SELECT * from rendez_vous_gpl WHERE date_validation = CURDATE()";
            $result = mysqli_query($con, $today_RdvGpl_validate);
            $nbrrdvgpl_validatetoday = mysqli_num_rows($result);

                    /*====== nbr rdv gpl manquer======*/
            $RdvGpl_manquer = "SELECT * from rendez_vous_gpl WHERE jour < CURDATE() AND rendez_vous_gpl.statut IS null";
            $result = mysqli_query($con, $RdvGpl_manquer);
            $nbrRdvGpl_manquer = mysqli_num_rows($result);

                     /*====== nbr rdv ing ======*/
             $count_RdvIng = "SELECT * from rendez_vous_ing";
            $result = mysqli_query($con, $count_RdvIng);
            $nbrrdving = mysqli_num_rows($result);

                      /*====== nbr rdv ing today======*/
            $today_RdvIng = "SELECT * from rendez_vous_ing WHERE jour = CURDATE()";
            $result = mysqli_query($con, $today_RdvIng);
            $nbrrdving_today = mysqli_num_rows($result);

                   /*====== nbr rdv valider today======*/
            $today_RdvIng_validate = "SELECT * from rendez_vous_ing WHERE date_validation = CURDATE()";
            $result = mysqli_query($con, $today_RdvIng_validate);
            $nbrrdving_validatetoday = mysqli_num_rows($result);

                    /*====== nbr rdv ing manquer======*/
            $Rdving_manquer = "SELECT * from rendez_vous_ing WHERE jour < CURDATE() AND rendez_vous_ing.statut IS null";
            $result = mysqli_query($con, $Rdving_manquer);
            $nbrRdving_manquer = mysqli_num_rows($result);
     
           ?>
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-3 pt-2">Dashboard</h1>
                        <div id="result"></div>
                        <h5 class="mt-2" style="color: #086de0; font-weight: 600;">1- Instalation GPL</h5>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Totale Des Rendez-Vous</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="#mytab1"><?php echo $nbrrdvgpl." : Voir les Détails"; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Nombre Pour Aujourd'hui</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="Rendez_vous_gplToday.php"><?php echo $nbrrdvgpl_today." : Voir les Détails"; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Passé Aujourd'hui</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail"><?php echo $nbrrdvgpl_validatetoday; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Rendez-Vous Manqués</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="Rendez_vous_gplManquer.php"><?php echo $nbrRdvGpl_manquer." : Voir les Détails"; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <h5 class="" style="color: #086de0; font-weight: 600;">2- Consultation Ingénieur</h5>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Totale Des Rendez-Vous</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="#mytab2" value=""><?php echo $nbrrdving." : Voir les Détails"; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Nombre Pour Aujourd'hui</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="Rendez_vous_ingToday.php"><?php echo $nbrrdving_today. ": Voir les Détails"; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Passé Aujourd'hui</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="#"><?php echo $nbrrdving_validatetoday; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Rendez-Vous Manqués</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link view-detail" href="Rendez_vous_ingManquer.php"><?php echo $nbrRdving_manquer." : Voir les Détails"; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <!-- ======================== table rdv gpl=========== -->
                        <div class="card mb-4" id="mytab1">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Instalation Système GPL
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
                               <?php $select = "SELECT * FROM rendez_vous_gpl";
                                    $result = mysqli_query($con, $select);?>
                                    <table class="table table-bordered myTable1" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                                <th>Voiture</th>
                                                <th>Jour</th>
                                                <th>Paiement</th>
                                                <th>S / A</th>
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
                                          <td class="column6"><?php echo $rows['jour'];?></td>
                                          <td class="column7" style="display:none"><?php echo $rows['heure'];?></td>
                                          <td class="column8" style="display:none"><?php echo $rows['systemegpl'];?></td>
                                          <td class="column9" style="display:none"><?php echo $rows['capacite'];?></td>
                                          <td class="column10"><?php echo $rows['paiement'];?></td>
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
                                                              <div class="dropdown-menu pl-3">
                                                                <button type="button" name="Btnupdate" class="updatebtn icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fas fa-edit color-icon"></i></button>
                                                                <button type="button" name="Btndelete" class="deletebtn icon-awessome ml-2" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fas fa-trash-alt color-icon"></i></button>                         
                                                                <button type="button" name="btn_details" class="Btndetails icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Voir les Détails"><i class="fas fa-eye color-icon"></i></button>
                                                             </div>
                                                           </div>
                                                          </div><?php 
                                                    
                                                        } ?>
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
                              <li data-page="prev" data-toggle="tooltip" data-placement="left" title="Prévious">
                                    <span> << <span class="sr-only">(current)</span></span>
                              </li>
                             <!--	Here the JS Function Will Add the Rows -->
                              <li data-page="next" id="prev" data-toggle="tooltip" data-placement="right" title="Next">
                                 <span> >> <span class="sr-only">(current)</span></span>
                              </li>
                            </ul>
                          </nav>
                        </div>
                  <!--	end	Start Pagination -->
                            </div>
                        </div>  
                        
                  <!-- ======================== table rdv ing=========== -->
                  <div class="card mb-5" id="mytab2">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Consultation Ingénieur
                            </div>                            
                            <div class="card-body">
                               <input type="text" id="myInput1" class="float-right" onkeyup="myFunction1()" placeholder="Entrer le Nom du Client">
			                    	<div class="form-group"> 	
                               <!--		Show Numbers Of Rows 		-->
			 	                     	<select class  ="form-control col-md-2" name="state" id="maxRows1">
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
                               <?php $select = "SELECT * FROM rendez_vous_ing";
                                    $result = mysqli_query($con, $select);?>
                                    <table class="table table-bordered myTable1" id="myTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                                <th>Voiture</th>
                                                <th>Jour</th>
                                                <th>Paiement</th>
                                                <th>S / A</th>
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
                                          <td class="column6"><?php echo $rows['jour'];?></td>
                                          <td class="column7" style="display:none"><?php echo $rows['heure'];?></td>
                                          <td class="column8" style="display:none"><?php echo $rows['type_controle'];?></td>
                                          <td class="column9"><?php echo $rows['paiement'];?></td>
                                          <td class="column10 py-1"><?php
                                              if($rows['statut'] =="validé"){ ?>
                                                            <div class="row d-flex justify-content-center">
                                                              <button class="icon-awessome mr-2 mt-1 " data-toggle="tooltip" data-placement="left" title="Rendez-Vous Validé"><i class="fas fa-check-circle color-icon-val"></i></button>
                                                              <button class="icon-awessome ml-1 mt-1" data-toggle="tooltip" data-placement="left" title="Voir les Détails"><i class="fas fa-eye Btndetails-ing color-icon"></i></button>
                                                            </div>
                                                              <?php  } 
                                              elseif($rows['statut'] =="") { ?>
                                                          <div class="row d-flex justify-content-center mt-1">
                                                             <button class="icon-awessome mr-1" data-toggle="tooltip" data-placement="left" title="Rendez-Vous En Attente"><i class="fas fa-sync color-icon-att"></i></button>
                                                            <div class="drop">
                                                            <button class="icon-awessome ml-2" data-toggle="dropdown"><i class="fas fa-chevron-circle-down color-icon" data-toggle="tooltip" data-placement="left" title="Opération"></i></button>
                                                              <div class="dropdown-menu pl-3">
                                                                <button type="button" name="Btnupdate" class="updatebtn-ing icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fas fa-edit color-icon"></i></button>
                                                                <button type="button" name="Btndelete" class="deletebtn-ing icon-awessome ml-2" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fas fa-trash-alt color-icon"></i></button>                         
                                                                <button type="button" name="btn_details" class="Btndetails-ing icon-awessome ml-1" data-toggle="tooltip" data-placement="top" title="Voir les Détails"><i class="fas fa-eye color-icon"></i></button>
                                                             </div>
                                                           </div>
                                                          </div><?php 
                                                    
                                                        } ?>
                                          </td>
                                        </tr>
                                        </tbody>
                                    <?php $ligne++;}  } ?>
                                    </table>                              
                                </div>
                        <!--		Start Pagination -->
                        <div class="pagination-container float-right">
                          <nav>
                            <ul class="pagination-ing mb-page">
                              <li data-page="prev" data-toggle="tooltip" data-placement="left" title="Prévious">
                                    <span> << <span class="sr-only">(current)</span></span>
                              </li>
                             <!--	Here the JS Function Will Add the Rows -->
                              <li data-page="next" id="prev1" data-toggle="tooltip" data-placement="right" title="Next">
                                 <span> >> <span class="sr-only">(current)</span></span>
                              </li>
                            </ul>
                          </nav>
                        </div>
                  <!--	end	Start Pagination -->                                
                      </div>
                  </div>  
 <!--============================ confirmation de la suppression rdv gpl avec un modal/pop up====================-->                              
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

<!--============================ confirmation de la suppression rdv ing avec un modal/pop up====================-->                              
                    <div class="modal fade" id="deletemodal-ing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                   <input type="hidden" name="delete_id_ing" id="delete_id_ing">
                               <h5 align="center">Confirmer la Supprission de Ce Rendez-Vous?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">  Annuler </button>
                                <input type="submit" name="deletedata_ing" class="btn btn-primary" value="Confirmer">
                              </form>        
                            </div>
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
                     <!--============================ voir les détail un modal/pop up====================-->                              
                   <div class="modal fade" id="detailmodal-ing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog"> 
                          <div class="modal-content" role="document">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> Détails De Rendez-Vous </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="">&times;</span>
                              </button>
                            </div>
                              <div class="modal-body">
                                <div class="GFGclass-ing" id="divGFG-ing"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">  Fermer </button>
                              </div>
                          </div>
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
                          <div class="form-group col-md-5"><label class="small mb-1" for="systemegpl">SYstème GPL :</label>
                           <input class="form-control py-2" name="systemegpl" id="systemegpl" type="text" placeholder="Type de Système à Monter" required=""/>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group"><label class="small mb-1" for="capacite">Capacité de la Bouteille :</label>
                              <input class="form-control py-2" name="capacite" id="capacite" type="text" placeholder="Capacité de la Bouteille" required=""/></div>
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
                       <input type="submit" name="updatedata" id="update_data" class="btn btn-primary mr-3" value="Modifier" />
                       <div class="ml-5"></div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

           <!--================================== EDIT ing modal=======================================-->
<div class="modal fade" id="editmodal-ing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" name="update_id_ing" id="update_id_ing">   
            <div class="form-row justify-content-center">
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="nom2">Nom :</label>
                   <input class="form-control py-2" name="nom" id="nom2" type="text" placeholder="Entrer Votre Nom" required="" /></div>
                </div>
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="prenom2">Prénom :</label>
                   <input class="form-control py-2" name="prenom" id="prenom2" type="text" placeholder="Entrer Vtre Prénom" required="" /></div>
               </div>
            </div>
            <div class="form-row justify-content-center">
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="telephone2">Téléphone :</label>
                   <input class="form-control py-2" name="telephone" id="telephone2" type="number" placeholder="Entrer un Numéro de Téléphone" required=""/></div>
               </div>
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="marque2">Voiture :</label>
                   <input class="form-control py-2" name="marque" id="marque2" type="text" placeholder="Entrer la marque de la Voiture" required=""/></div>
               </div>
           </div>
           <div class="form-row justify-content-center">
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="jour2">Date :</label>
                   <input class="form-control py-2" name="jour" id="jour2" type="date" placeholder="" required=""/></div>
               </div>
               <div class="col-md-5">
                   <div class="form-group"><label class="small mb-1" for="heure2">Heure :</label>
                   <input class="form-control py-2" name="heure" id="heure2" type="time"/></div>
               </div>
           </div>
           <div class="form-row justify-content-center">
               <div class="form-group col-md-10" id="div2">
                   <label class="small mb-1" for="type_controle2">Type de Contrôle:</label>
                    <select name="controle-type"  class="form-control" id="type_controle2">
                       <option  value="Contrôle 2600">Contrôle 2600</option>
                       <option  value="montage GPL">montage GPL</option>
                       <option  value="AR (8000)">AR (8000).</option>
                    </select>
                </div>
           </div>
           <div class="form-row justify-content-center">
               <div class="form-group col-md-10">
                 <label class="small mb-1" for="paiement2">Paiement en DA</label>
                 <input class="form-control py-2" name="paiement" id="paiement2" type="number" placeholder="Prix Payé" required=""/>
               </div>
           </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal" id="modal-close">Annuler</button>
            <input type="submit" name="updatedata_ing" id="update_data_ing" class="btn btn-primary mr-3" value="Modifier" />
            <div class="ml-5"></div>
          </div>
       </form>
   </div>
</div>
</div>

         <!--============================ supprimer un user php====================-->                              
<?php

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM rendez_vous_gpl WHERE id='$id'";
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




     <!--============================ supprimer un rdv ing php====================-->                              
<?php

if(isset($_POST['deletedata_ing']))
{
    $id = $_POST['delete_id_ing'];

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



     <!-- ============= update ==============-->

     <?php 
      if(isset($_POST['updatedata'])){
        $id= $_POST['update_id'];
        $nom = $_POST['nom'];  
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];  
        $marque = $_POST['marque'];
        $jour = $_POST['jour'];  
        $heure = $_POST['heure'];
        $systemegpl = $_POST['systemegpl'];
        $capacite = $_POST['capacite'];
        $paiement = $_POST['paiement'];
        
        $update = " UPDATE rendez_vous_gpl SET 
         nom ='$nom',
         prenom='$prenom', 
         telephone='$telephone', 
         voiture='$marque',
         jour='$jour',
         heure='$heure',
         systemegpl='$systemegpl',
         capacite='$capacite',
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


<?php 
if(isset($_POST['updatedata_ing'])){
$id= $_POST['update_id_ing'];
$nom = $_POST['nom'];  
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];  
$marque = $_POST['marque'];
$jour = $_POST['jour'];  
$heure = $_POST['heure'];
$type_controle = $_POST['controle-type'];
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
             var g = 
             $(this).parents("tr").find(".column10").text();
            
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
              "<p id='h' name='column8' >Système Gpl : "
                      + h + " </p>";
                      p += 
              "<p id='i' name='column9' >Capacité de la Bouteille : "
                      + i + " </p>";
                      p += 
              "<p id='g' name='column10' >Paiement : "
                      + g + " </p>";

                       //CLEARING THE PREFILLED DATA
                    $("#divGFG").empty();
                    //WRITING THE DATA ON MODEL
                    $("#divGFG").append(p);

                  });
                });
        </script>


<!-- =========== voir les details ing ==========-->

<script>
            $(document).ready(function () {
                      
            $('.Btndetails-ing').on('click', function() {
                              
               $('#detailmodal-ing').modal('show');
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
              "<p id='h' name='column8' >Type De Controle : "
                      + h + " </p>";
                     
                      p += 
              "<p id='i' name='column9' >Paiement : "
                      + i + " </p>";

                       //CLEARING THE PREFILLED DATA
                    $("#divGFG-ing").empty();
                    //WRITING THE DATA ON MODEL
                    $("#divGFG-ing").append(p);

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
               $('#systemegpl').val(data[8]);
               $('#capacite').val(data[9]);
               $('#paiement').val(data[10]);

                  });
                });
        </script> 
<!-- =============================JS pour modifier les lignes d'une table =====================--> 
<script>
 $(document).ready(function () {
 $('.updatebtn-ing').on('click', function() {
    $('#editmodal-ing').modal('show');
    $tr = $(this).closest('tr');
       var data = $tr.children("td").map(function() {
        return $(this).text();
         }).get();
      console.log(data);
     $('#update_id_ing').val(data[0]);
    $('#nom2').val(data[2]);
    $('#prenom2').val(data[3]);
    $('#telephone2').val(data[4]);
    $('#marque2').val(data[5]);
    $('#jour2').val(data[6]);
    $('#heure2').val(data[7]);
    $('#type_controle2').val(data[8]);
    $('#paiement2').val(data[9]);

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

