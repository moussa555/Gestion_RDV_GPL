 <?php
 session_start();
if(!isset($_SESSION['email']) || !$_SESSION['reset-code']){
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
  
  $email = $_SESSION['email'];
  include('db_connecte.php');
  $message="";
   if(isset($_POST['check-code'])){ 
      $conf_code = $_POST['code'];
      if(empty($conf_code)){
        $message = "<div class=\"d-flex justify-content-center\">
        <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
          <span class=\"\">Veuillez entrer le code de confirmation.</span>
          <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
        </div>
    </div>";
      }else{
        $select = "SELECT * FROM user_table WHERE code = '$conf_code' AND email = '$email'";
        $query = mysqli_query($con, $select);
        $num = mysqli_num_rows($query);

      if($num == 1){
          $code = rand(100000, 999999);
          $update = "UPDATE user_table SET code = '$code' WHERE code = '$conf_code' AND email = '$email'";
           $query = mysqli_query($con, $update);
           if($query){
               $acces="droit accès.";
               $_SESSION['reset-password'] = $acces;
               unset($_SESSION['reset-code']);
               header('location: reset_password.php');
           }
           else{
            $message = "<div class=\"d-flex justify-content-center\">
            <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
            <i class=\"fas fa-exclamation-circle mr-2\"></i>
            <span class=\"\">Érreur temporaire, réessayer!.</span>
              <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">&times</span>
            </div>
            </div>";

           }
          
      }
      else{
        $message = "<div class=\"d-flex justify-content-center\">
        <div class=\"alert alert-success alert-dismissible fade show text-center pr-2\" role=\"alert\">
        <i class=\"fas fa-exclamation-circle mr-2\"></i>
        <span class=\"\">Ce code ne correspond pas au code envoyé</span>
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
    <title>Code de Vérification</title>
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
        <div class="card text-center" style="top: 100px">
            <div class="card-header" style="color : #b2c7dd; background-color : #ffffff">
               <h2 style="color : #b2c7dd">Code de Vérification</h2>
            </div>
            <div class="card-body">
                <form action="" method="post" autocomplete="off">
                    <p class="text-center"><span class="text-primary">Nous avons envoyer un code à : </span><span class="text-info"><b><?php echo $email ?></b></span></p>
                    <div id="result"><?php echo $message ; ?></div>
                    <div class="form-group d-flex justify-content-center mt-0">
                        <input class="form-control col-md-9" type="number" name="code" placeholder="Entrer le code">
                    </div>
                    <hr class="hr-ligne">
                    <div class="form-group d-flex justify-content-center">
                        <div class="justify-content-center col-md-5">
                            <a href="../login.php"><button class="form-control btn-light" type="button" name="annuler">Annuler</button></a>
                        </div>  
                        <div class="justify-content-center col-md-5">
                           <input class="form-control btn-primary" type="submit" name="check-code" value="Continuer">
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
