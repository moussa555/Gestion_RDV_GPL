
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
                        <div class="contair">
                        <?php  if($_SESSION['role'] == "ADMIN"){ ?>     
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-12">
                                <div class="card-header my-2" style="background-color: #fff">
                                    <div class="card-head"><h1 class="mt-3 pt-2">Ajouter Un Compte Utilisateur</h1></div>
                                    <div id="result"></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="inputName">Nom * :</label>
                                                    <input class="form-control py-2" name="nom" id="inputFirstName" type="text" placeholder="Entrer Votre Nom" required="" /></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="inputprénom">Prénom * :</label>
                                                    <input class="form-control py-2" name="prenom" id="inputLastName" type="text" placeholder="Entrer Votre Prénom" required="" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Nom utilisateur * :</label>
                                                    <input class="form-control py-2" name="username" id="inputusername" type="text" placeholder="Entrer un Nom d'Utilisateur" required=""/></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Mot de Passe * :</label>
                                                    <input class="form-control py-2" name="password" id="inputPassword" type="password" placeholder="Entrer un Mot de Passe" required=""/></div>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-center">
                                                <div class="form-group col-md-5">
                                                   <label class="small mb-1" for="inputmail">E-mail * :</label>
                                                   <input class="form-control py-2" name="email" id="inputmail" type="text" placeholder="Entrer e-mail d'utilisateur" required=""/>
                                                </div>
                                                <div class="form-group col-md-5">
                                                   <label class="small mb-1" for="inputmail">Rôle * :</label>
                                                   <select class="form-control py-2" name="role" id="role" required="">
                                                   <option value=""></option>
                                                     <option value="ADMIN">Administrateur</option>
                                                     <option value="USER">Simple-utilisateur</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="row pl-5">
                                               <button type="submit" name="add-user" class="btn btn-primary ml-5">Créer un Compte</button>
                                            </<div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><?php } ?>
                    </div>
                    <div id="result-msg"></div>
                    <?php
                      $select = "SELECT * FROM user_table";
                      $result = mysqli_query($con, $select);
                    ?>
                        <div class="card mt-4 mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Liste Des Utilisateurs
                               <input type="text" id="myInput" class="float-right" onkeyup="myFunction()" placeholder="Entrer un nom d'un utilisareur">
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>E-mail</th>
                                                <th>Rôle</th>
                                                <?php 
                                                   if($_SESSION['role'] == "ADMIN"){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>E-mail</th>
                                                <th>Rôle</th>
                                                <?php 
                                                   if($_SESSION['role'] == "ADMIN"){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </tfoot>
                                     <?php
                                       if($result)
                                     {
                                       $ligne=1; 
                                     foreach($result as $rows)
                                    { ?>
                                  <tbody>
                                        <tr>
                                          <td class="column0" style="display : none"><?php echo $rows['id']; ?></td>
                                          <td class="column1"><?php echo $ligne; ?></td>
                                          <td class="column2"><?php $rows['nom']; echo strtoupper($rows['nom']);?></td>
                                          <td class="column3"><?php $rows['prenom']; echo ucwords($rows['prenom']);?></td>
                                          <td class="column5"><?php echo $rows['email'];?></td>
                                          <td class="column6"><?php echo $rows['role'];?></td>
                                        <?php 
                                          if($_SESSION['role'] == "ADMIN" && $rows['username'] == $_SESSION['username']){ ?>
                                          <td class="column11 py-1">
                                              <button class="icon-awessome ml-1 mt-1" data-toggle="tooltip" data-placement="left" title="vous étes l'admin on ne peut pas supprimer votre compte" style="cursor: default;"><i class="fas fa-trash-alt" style="color: #f8f9fa;"></i></button>                         
                                          </td>
                                        <?php 
                                        } else if($_SESSION['role'] == "ADMIN"){ ?>
                                          <td class="column11 py-1">
                                            <button type="button" name="Btndelete" class="deletebtn icon-awessome mt-1 ml-1" data-toggle="tooltip" data-placement="left" title="Supprimer"><i class="fas fa-trash-alt color-icon"></i></button>                         
                                          </td> 
                                          <?php 
                                        } ?>
                                        </tr>
                                      </tbody>
                                    <?php $ligne++;}  } ?>
                                    </table>
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
                               <h5 align="center">Confirmer la Supprission de Cet Utilisateur?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">  Annuler </button>
                                <button type="submit" name="deletedata" class="btn btn-primary" value="<?php echo $rows['id'];?>">Confirmer</button>
                              </form>        
                            </div>
                          </div>
                        </div>
                    </div>
                    
         <!--==================ajouter un utilisateur (script php)=============--> 
    <?php
        if(isset($_POST['add-user'])){
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; }
        $nom = test_input($_POST['nom']);  
        $prenom = test_input($_POST['prenom']);
        $email = test_input($_POST['email']);  
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);
        $role = test_input($_POST['role']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          ?>
          <script>
          $(document).ready(function(){
           $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">E-mail invalide</span><span type=\"button\" id=\"close\">&times</span></div></div>");
           setTimeout(function(){  
                $('#result').fadeOut("Slow");  
              }, 5000);
          });
        </script>
        <?php
        }else{
        $select = " SELECT * FROM user_table WHERE username = '$username'";
        $query = mysqli_query($con, $select);
        $num = mysqli_num_rows($query);

        $select_mail = " SELECT * FROM user_table WHERE email = '$email'";
        $query_mail = mysqli_query($con, $select_mail);
        $num_mail = mysqli_num_rows($query_mail);
        if($num == 1){
            ?>
            <script>
            $(document).ready(function(){
             $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Nom D'utilisateur Existe Déjà, Veuillez Choisir Un Autre</span><span type=\"button\" id=\"close\">&times</span></div></div>");
             setTimeout(function(){  
                  $('#result').fadeOut("Slow");  
                }, 5000);
            });
          </script>
          <?php
        }
        elseif($num_mail == 1){
          ?>
          <script>
          $(document).ready(function(){
           $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">E-mail Existe Déjà, Veuillez Choisir Un Autre</span><span type=\"button\" id=\"close\">&times</span></div></div>");
           setTimeout(function(){  
                $('#result').fadeOut("Slow");  
              }, 5000);
          });
        </script>
        <?php
      }
        elseif(strlen($password)<8){
            ?>
            <script>
            $(document).ready(function(){
             $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Le mot de passe doit avoir au minimum 8 caractères</span><span type=\"button\" id=\"close\">&times</span></div></div>");
             setTimeout(function(){  
                  $('#result').fadeOut("Slow");  
                }, 5000);
            });
          </script>
          <?php
        }
         else{
           $code = rand(100000,999999);
           $statut = "en_attente";
           $pass_hach = password_hash($password, PASSWORD_BCRYPT);
            $insert = "INSERT INTO user_table(nom, prenom, username, password, email, role, code, statut)
                      VALUES ('$nom','$prenom','$username','$pass_hach','$email', '$role', '$code', '$statut')";
            $result= mysqli_query($con, $insert);
            if($result){
                        $subject  = 'Vérifier votre e-mail';
                        $message  = "Bonjour, Veuillez utiliser ce code pour confirmer votre e-mail: $code";
                        $headers  = 'From: fortestcoder@gmail.com';
                  if(mail($email, $subject, $message, $headers)){  ?>
                      <script>
                           $(document).ready(function(){
                           $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Utilisateur ajouté, un code de confirmation est envoyé à son e-mail</span><span type=\"button\" id=\"close\">&times</span></div></div>");
                           setTimeout(function(){  
                           $('#result').fadeOut("Slow");  
                           }, 5000);
                              });
                      </script>
                  <?php
                        }
    
                  else{
                    ?>
                    <script>
                         $(document).ready(function(){
                         $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Utilisateur ajouté, Nous enverrons un e-mail de confirmation des sa première connexion</span><span type=\"button\" id=\"close\">&times</span></div></div>");
                         setTimeout(function(){  
                         $('#result').fadeOut("Slow");  
                         }, 6000);
                            });
                    </script>
                <?php
                  }
            }
            else{
                ?>
                <script>
                $(document).ready(function(){
                 $("#result").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Une érreur est produite, Veuillez réessayer</span><span type=\"button\" id=\"close\">&times</span></div></div>");
                 setTimeout(function(){  
                      $('#result').fadeOut("Slow");  
                    }, 5000);
                });
              </script>
              <?php
                                       }
              
                 }}
                }
       ?>  
       
   <!--============================ supprimer un user====================-->                              
<?php

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM user_table WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run) 
         { 
           $_SESSION['id'] = $id;
           unset($_SESSION['id']);
           ?>
          <script>
          $(document).ready(function(){
           $("#result-msg").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Utilisateur Supprimé</span><span type=\"button\" id=\"close\">&times</span></div></div>");
           setTimeout(function(){  
                $('#result-msg').fadeOut("Slow");  
              }, 5000);
          });
        </script>
        <?php
         }

         else {
          ?>
          <script>
          $(document).ready(function(){
           $("#result-msg").html("<div class=\"d-flex justify-content-center\"><div class=\"alert alert-success alert-dismissible fade show text-center result col-md-8\" role=\"alert\"><span class=\"ml-5\">Érreur ! Veuiller Réessayer.</span><span id=\"close\">&times</span></div></div>");
           setTimeout(function(){  
                $('#result-msg').fadeOut("Slow");  
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

    </body>
</html>
  

<script>  
$(document).ready(function(){
            $("#close").on('click', function(){
            $(".result").hide();
          });
        });
  </script>
 
   
