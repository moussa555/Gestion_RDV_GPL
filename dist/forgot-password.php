
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
 session_start();
 $message = "";
//if user click continue button in forgot password form
    include('db_connecte.php');
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message = "<div class=\"d-flex justify-content-center\">
            <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
              <i class=\"fas fa-exclamation-circle mr-2\"></i>
              <span class=\"\">Entrer une form valide de e-mail.<span>
              <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
            </div>
        </div>";
        }
        else{
        $check_email = "SELECT * FROM user_table WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(100000, 999999);
            $insert_code = "UPDATE user_table SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Réinitialiser votre mot de passe";
                $message = "Bonjour, veuillez utiliser ce code pour réinitialiser votre mot de passe : $code";
                $sender = "From: fortestcoder@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $_SESSION['email'] = $email;
                    $_SESSION['reset-code'] = "permission access";
                    header('location: reset_code.php');
                    exit();
                }else{
                    $message = "<div class=\"d-flex justify-content-center\">
                    <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
                        <i class=\"fas fa-exclamation-circle mr-2\"></i>
                        <span class=\"\">Code non envoyé, veuillez réessayer.<span>
                        <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
                      </div>
                  </div>";
                }
            }else{
                $message = "<div class=\"d-flex justify-content-center\">
                    <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
                      <i class=\"fas fa-exclamation-circle mr-2\"></i>
                      <span class=\"\">Une érreur est produite, veuillez réssayer.</span>
                      <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
                    </div>
                </div>";
            }
        }else{
            $message = "<div class=\"d-flex justify-content-center\">
            <div class=\"alert alert-success alert-dismissible fade show pr-2\" role=\"alert\">
              <i class=\"fas fa-exclamation-circle mr-1\"></i>
              <span class=\"col-md-4 justify-content-center\">Aucun compte associé à $email.<span>
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
    <title>Forgot Password</title>
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
        <div class="col-md-7">
            <div class="card text-center" style="top: 80px">
                <div class="card-header" style="color : #b2c7dd; background-color : #ffffff">
                    <h2 style="color : #b2c7dd">Rechercher votre compte</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" autocomplete="">
                        <p><?php echo $message ; ?></p>
                        <div class="form-group d-flex justify-content-center mt-0">
                            <input class="form-control col-md-9" type="email" name="email" placeholder="Entrer votre adresse e-mail" required value="">
                        </div>
                        <p class="text-muted" style="font-size: 12px">Mot de passe oublié ?</br> Entrer votre adresse e-mail, nous vous enverrons un code pour réinisialiser votre mot de passe</p>
                        <hr class="hr-ligne">
                        <div class="form-group d-flex justify-content-center">
                            <div class="justify-content-center col-md-5">
                               <a href="../login.php"><button class="form-control btn-light" type="button" name="annuler">Annuler</button></a>
                            </div>  
                            <div class="justify-content-center col-md-5">
                               <input class="form-control btn-primary" type="submit" name="check-email" value="Continuer">
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