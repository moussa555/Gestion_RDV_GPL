        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        </head>
        <body>
        <?php
        $hostname="localhost"; // Host name 
            $Mysqlusername="root"; // Mysql username 
            $Mysqlpassword=""; // Mysql password 
            $db_name="rdvgpl"; // Database name 

            $con = mysqli_connect("$hostname", "$Mysqlusername", "$Mysqlpassword");
            mysqli_select_db($con, "$db_name");
            if(!empty($_POST['myRadio'])) {       
                     $nom = addslashes($_POST['nom']);  
                     $radioValue = $_POST['myRadio'];
                     $prenom = addslashes($_POST['prenom']);
                     $telephone = $_POST['telephone'];  
                     $marque = addslashes($_POST['marque']);
                     $jour = $_POST['jour'];  
                     $heure = $_POST['heure'];
                     $paiement = $_POST['paiement'];
       if($radioValue == "Gpl"){
                     $systemegpl = addslashes($_POST['systemegpl']);
                     $capacite = addslashes($_POST['capacite']);
                     $insert = "INSERT INTO rendez_vousgpl(nom, prenom, telephone, voiture, jour, heure, systemegpl, capacite, paiement)
                      VALUES ('$nom','$prenom','$telephone','$marque','$jour','$heure','$systemegpl','$capacite', '$paiement')";
                     $result= mysqli_query($con, $insert);
            if($result){
                         echo"<div class=\"d-flex justify-content-center\">
                                  <div class=\"alert alert-success alert-dismissible fade show text-center\" role=\"alert\">
                                  <i class=\"fas fa-check-circle\"></i>
                                  <span class=\"ml-2\">Rendez-Vous Ajouté Avec Succès.<span>
                                   <button type=\"button\" class=\"btn-close pt-0\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>
                              </div>";
                      }
                     else{
                          echo"<div class=\"d-flex justify-content-center\">
                                <div class=\"alert alert-warning alert-dismissible fade show text-center\" role=\"alert\">
                                <i class=\"fas fa-times-circle\"></i><span class=\"ml-2\">Érreur, Veuillez Réessayer.<span>
                                 <button type=\"button\" class=\"btn-close pt-0\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>
                              </div>";
                          }
            }
            elseif($radioValue == "Ingénieur"){
                         $type_controle = $_POST['type_controle'];
                           $insert = "INSERT INTO rendez_vous_ing(nom, prenom, telephone, voiture, jour, heure, type_controle, paiement)
                           VALUES ('$nom','$prenom','$telephone','$marque','$jour','$heure','$type_controle','$paiement')";
                           $result= mysqli_query($con, $insert);

                           if($result){
                            echo"<div class=\"d-flex justify-content-center\">
                                     <div class=\"alert alert-success alert-dismissible fade show text-center\" role=\"alert\">
                                     <i class=\"fas fa-check-circle\"></i><span class=\"ml-2\">Rendez-Vous Ajouté Avec Succès.<span>
                                      <button type=\"button\" class=\"btn-close pt-0\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                   </div>
                                 </div>"; 
                         }
                        else{
                             echo"<div class=\"d-flex justify-content-center\">
                                   <div class=\"alert alert-warning alert-dismissible fade show text-center\" role=\"alert\">
                                    <i class=\"fas fa-times-circle\"></i> <span class=\"ml-2\">Érreur, Veuillez Réessayer.<span>
                                    <button type=\"button\" class=\"btn-close pt-0\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                   </div>
                                 </div>";
                             }
            }
            else{
              echo"<div class=\"d-flex justify-content-center\">
              <div class=\"alert alert-warning alert-dismissible fade show text-center\" role=\"alert\">
              <i class=\"fas fa-times-hexagon\"></i><span class=\"ml-2\">Érreur, Il s'agit d'une érreur de programme, Contacter Votre Fournisseur de Logiciel.<span>
               <button type=\"button\" class=\"btn-close pt-0\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
              </div>
            </div>";
            }
          }  
             
       ?> 
       	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        </body>
        </html>    
         