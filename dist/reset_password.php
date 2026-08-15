<?php 
  session_start();
   if(!isset($_SESSION['reset-password']) || !isset($_SESSION['email'])){
   header('location: ../login.php');
   }
?>
<style>
    .form-group a:hover{
        text-decoration: none;
    }
    .btn-close{
        padding-right: 6px;
        margin-left: 10px;
    
    }
    .card .hr-ligne{
        margin-right: -20px;
        margin-left: -20px;

    }
</style>
 <?php
 $message = "";
//if user click continue button in forgot password form
    include('db_connecte.php');
    if(isset($_POST['check-password'])){
           $password = mysqli_real_escape_string($con, $_POST['password']);
           $conf_password = mysqli_real_escape_string($con, $_POST['conf-password']);
            if($conf_password !== $password){
                $message = "<div class=\"d-flex justify-content-center\">
                    <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
                       <i class=\"fas fa-exclamation-circle\"></i>
                           <span class=\"\">Ces mots de passe ne correspondent pas, réessayer !</span>
                           <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
                       </div>
                    </div>";
             }else if(strlen($password) < 8){
                $message = "<div class=\"d-flex justify-content-center\">
                    <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
                        <i class=\"fas fa-exclamation-circle mr-2\"></i>
                         <span class=\"\">Utiliser au moins huit caractères pour un mot de passe.</span>
                           <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
                        </div>
                    </div>";
                }else{
                    $pass_hach = password_hash($password, PASSWORD_BCRYPT);
                    $email = $_SESSION['email'];
                    $update = "UPDATE user_table SET password = '$pass_hach' WHERE email = '$email'";
                    $query_run = mysqli_query($con, $update);
                    if($query_run){
                        $password_change = "Votre mot de passe a bien été réinitialisé";
                        $_SESSION['password_change'] = $password_change;
                        unset($_SESSION['reset-password']);
                        header('location: ../login.php');
                    }else{
                        $message = "<div class=\"d-flex justify-content-center\">
                        <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
                            <i class=\"fas fa-exclamation-circle mr-2\"></i>
                             <span class=\"\">Nous n'avons pas pu réinitialiser votre mot de passe, veuillez réessayer.</span>
                               <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
                            </div>
                        </div>";
                    }

                }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Éco-GAZ-amine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body style="background-color : #e9ebee">
    <div class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-white topbar static-top">
           <!-- Sidebar Toggle (Topbar) -->
           <span class="navbar-brand" style="color: #086de0; font-weight: 600;">Éco Gaz Amine</span>
        </nav>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="col-md-6">
        <div class="card text-center" style="top: 60px">
            <div class="card-header" style="color : #b2c7dd; background-color : #ffffff">
               <h2>Nouveau mot de passe</h2>
            </div>
            <div class="card-body pt-0">
                <p><?php echo $message ; ?></p>
                <form action="" method="POST" autocomplete="">
                    <div class="form-group d-flex justify-content-center">
                        <input class="form-control col-md-9" type="password" name="password" placeholder="Entrer un nouveau mot de passe" required value="">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <input class="form-control col-md-9" type="password" name="conf-password" placeholder="Confirmer le nouveau mot de passe" required value="">
                    </div>
                    <span class="text-muted" style="font-size: 14px">Le mot de passe doit avoir au minimum huit (8) caractères.</span>
                    <hr class="hr-ligne">
                    <div class="form-group d-flex justify-content-center">
                        <div class="justify-content-center col-md-5">
                            <a href="../login.php"><button class="form-control btn-light" type="button" name="annuler">Annuler</button></a>
                        </div>  
                        <div class="justify-content-center col-md-5">
                           <input class="form-control btn-primary" type="submit" name="check-password" value="Modifier">
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    <footer class="py-4 bg-white fixed-bottom">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">
                    Copyright &copy; SARL Éco Gaz Amine 2021
                </div>
                <div>
                    <a>Privacy Policy</a>
                        &middot;
                        <a>Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>