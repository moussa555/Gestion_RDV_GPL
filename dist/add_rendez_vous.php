
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
    </head>
    <body class="sb-nav-fixed">  
       <?php include('sidenav.php'); ?>      
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="contaer">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-header mt-3" style="background-color: #fff">
                                    <div class="card-head"><h1 class="mt-3 pt-2">Ajouter un Rendez-Vous</h1></div>
                                    <div id="result"></div>
                                    <div class="card-body">
                                        <form method="POST" id="registration">
                                            <div class="form-rows ml-5">
                                                <div class="btn btn-radio">
                                                  <label class="small mb-1 ml-3 text-grey"><b>Motif de Rendez-Vous * :</b></label>
                                                  <div class="custom-control custom-radio custom-control-inline ml-2">
                                                    <input type="radio" id="customRadioInline1" name="myRadio" class="custom-control-input" onclick="show1();" value="Gpl">
                                                    <label class="custom-control-label" for="customRadioInline1">GPL</label>
                                                  </div>
                                                  <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="myRadio" class="custom-control-input" onclick="show2();" value="Ingénieur">
                                                    <label class="custom-control-label" for="customRadioInline2">Ingénieur</label>
                                                  </div>
                                                  <span id="require-motif" style="color:#FF0000"></span>
                                                </div>
                                            </div>                        
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="nom">Nom * :</label>
                                                    <input class="form-control py-2" name="nom" id="nom" type="text" placeholder="Entrer Votre Nom" required="" /></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="prenom">Prénom * :</label>
                                                    <input class="form-control py-2" name="prenom" id="prenom" type="text" placeholder="Entrer Vtre Prénom" required="" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="telephone">Téléphone * :</label>
                                                    <input class="form-control py-2" name="telephone" id="telephone" type="number" placeholder="Entrer un Numéro de Téléphone" required=""/></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="marque">Voiture * :</label>
                                                    <input class="form-control py-2" name="marque" id="marque" type="text" placeholder="Entrer la marque de la Voiture" required=""/></div>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="jour">Date * :</label>
                                                    <input class="form-control py-2" name="jour" id="jour" type="date" placeholder="" required=""/></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="heure">Heure :</label>
                                                    <input class="form-control py-2" name="heure" id="heure" type="time"/></div>
                                                </div>
                                            </div>
                                            <div class="justify-content-center hide" id="div1">
                                                <div class="form-row justify-content-center">
                                                <div class="form-group col-md-5"><label class="small mb-1" for="systemegpl">SYstème GPL * :</label>
                                                 <input class="form-control py-2" name="systemegpl" id="systemegpl" type="text" placeholder="Type de Système à Monter" required=""/>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="capacite">Capacité de la Bouteille * :</label>
                                                    <input class="form-control py-2" name="capacite" id="capacite" type="text" placeholder="Capacité de la Bouteille" required=""/></div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <div class="form-group col-md-10 hide" id="div2">
                                                   <label class="small mb-1" for="">Type de Contrôle * :</label>
                                                    <select name="controle-type"  class="form-control" id="type_controle">
                                                       <option></option>
                                                       <option  value="Contrôle 2600">Contrôle 2600</option>
                                                       <option  value="montage GPL">montage GPL</option>
                                                       <option  value="AR (8000)">AR (8000)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <div class="form-group col-md-10">
                                                  <label class="small mb-1" for="paiement">Paiement en DA * :</label>
                                                  <input class="form-control py-2" name="paiement" id="paiement" type="number" placeholder="Prix Payé" required=""/>
                                                </div>
                                                <span id="require-input" style="color:#FF0000"></span>
                                            </div>
                                            <div class="form-row pl-5 mb-2">
                                                <div class="col-md-5 pl-4">
                                                   <input type="button" name="submitRdv" id="submitRdv" class="btn btn-primary ml-3" value="Ajouter Rendez-Vous"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    
              </main>
              <footer class="py-4 bg-light mt-5">
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
    </body>
</html>
<script>       
    function show1(){
  $('#div1').show();
  $('#div2').hide();
}
function show2(){
    $('#div1').hide();
    $('#div2').show();
}
</script>

<script>
    $(document).ready(function() {
        $("input[type='radio']").click(function(){
            $('#require-motif').text(" ");

        });
    });
</script>
<script>
        $(document).ready(function() {
	   $('#submitRdv').click(function() {
		var nom = $('#nom').val();
		var prenom = $('#prenom').val();
		var telephone = $('#telephone').val();
        var marque = $('#marque').val();
        var jour = $('#jour').val();
        var heure = $('#heure').val();
        var systemegpl = $('#systemegpl').val();
        var capacite = $('#capacite').val();
        var paiement = $('#paiement').val();
        var type_controle = $('#type_controle').val();
       
      if(!$("input[name='myRadio']:checked").val()){
            $('#require-motif').text("Choisir le type de Rendez-Vous");
        } 
                                                     
       else{
            var radioValue = $("input[name='myRadio']:checked").val(); 
                 }

            if(radioValue == "Gpl"){
                if(nom!="" && prenom!="" && telephone!="" && marque!="" && jour!="" && systemegpl!="" && capacite!="" && paiement!=""){

			$.ajax({
				url: "ajouter_rendez_vous.php",
				type: "POST",
				data: {
                    myRadio: radioValue,
					nom: nom,
					prenom: prenom,
					telephone: telephone,
					marque: marque,
                    jour: jour,	
                    heure: heure,
                    systemegpl: systemegpl,
                    capacite: capacite,
                    paiement: paiement
                    			
				},
                success:function(data){  
                          $("form").trigger("reset");  
                          $('#result').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#result').fadeOut("Slow");  
                          }, 6000);  
                     } ,

                     error:function(data){  
                          $("form").trigger("reset");  
                          $('#result').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#result').fadeOut("Slow");  
                          }, 6000);  
                     }  

			});
            $('#require-input').text(" ");
            $('#div1').hide();

                }else{
                    $('#require-input').text("les champs marqués en * sont obligatoire");

                }
            }
            else if(radioValue == "Ingénieur"){
                if(nom!="" && prenom!="" && telephone!="" && marque!="" && jour!="" && type_controle!="" && paiement!=""){
			$.ajax({
				url: "ajouter_rendez_vous.php",
				type: "POST",
				data: {
                    myRadio: radioValue,
					nom: nom,
					prenom: prenom,
					telephone: telephone,
					marque: marque,
                    jour: jour,	
                    heure: heure,
                    paiement: paiement,
                    type_controle: type_controle
				},
               success:function(data){  
                          $("form").trigger("reset");  
                          $('#result').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#result').fadeOut("Slow");  
                          }, 6000);  
                     } ,

                     error:function(data){  
                          $("form").trigger("reset");  
                          $('#result').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#result').fadeOut("Slow");  
                          }, 6000);  
                     } 
        
			});
            $('#require-input').text(" ");
            $('#div2').hide();
                }
                else{
                   $('#require-input').text("les champs marqués en * sont obligatoire");
                }
            }

       // }

	});
});
</script>

