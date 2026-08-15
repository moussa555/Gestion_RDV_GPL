<?php
session_start();
if (isset($_SESSION['username']) && isset($_POST['password'])) {
  header('location: dist/index.php');
} else {

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
    integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="dist/css/login.css">
</head>

<body style="background-color : #e9ebee">
  <div class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand bg-white topbar static-top">
      <!-- Sidebar Toggle (Topbar) -->
      <span class="navbar-brand" style="color: #086de0; font-weight: 600;">Éco Gaz Amine</span>
    </nav>
  </div>
  <div class="container">
    <div class="d-flex justify-content-center">
      <?php
        if (isset($_SESSION['password_change'])) {
        ?>
      <div class="alert alert-success text-center mt-3">
        <?php echo $_SESSION['password_change'] . "
						<button class=\"btn-close\" data-bs-dismiss=\"alert\"></button>";
            unset($_SESSION['password_change']);
            ?>
      </div>
      <?php
        }
        if (isset($_SESSION['info_mail'])) {
        ?>
      <div class="alert alert-success text-center mt-3">
        <?php echo $_SESSION['info_mail'] . "
						<button class=\"btn-close\" data-bs-dismiss=\"alert\"></button>";
            unset($_SESSION['info_mail']);
            ?>
      </div>
      <?php
        }
        ?>
    </div>
    <div class="d-flex justify-content-center">
      <div class="user_card shadow-lg mb-5">
        <div class="d-flex justify-content-center mb-3">
          <div class="brand_logo_container">
            <img src="dist/image/user.jpg" class="brand_logo" alt="Logo">
          </div>
        </div>
        <?php
          $con = mysqli_connect('localhost', 'root', ''); //on se connecte à MySQL    
          mysqli_select_db($con, 'rdvgpl'); // on selectionne la base 

          ini_set('display_errors', 1);
          $username = "";
          $password = "";
          $error = "";
          if (isset($_POST['button'])) {
            function test_input($data)
            {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            if (empty($username)) {
              echo "<div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\">
                              <span class=\"ml-4\"> Entrer Votre Nom d'utilisateur.<span>
                              <button type=\"button\" class=\"btn-close pb-1\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                              </div>";
            } elseif (empty($password)) {
              echo "<div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\">
					          <span class=\"ml-5\">Entrer Votre Mot de Passe.<span>
                              <button type=\"button\" class=\"btn-close pb-1\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                              </div>";
            } else {
              $select = " SELECT * FROM user_table WHERE username = '$username' ";
              $result = mysqli_query($con, $select);
              $num = mysqli_num_rows($result);
              if ($num == 1) {
                $row = mysqli_fetch_assoc($result);
                $fpassword = $row['password'];
                if (password_verify($password, $fpassword)) {
                  $email = $row['email'];
                  $status = $row['statut'];
                  if ($status == "validé") {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['@email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    header("location: dist/index.php?succes= bienvenu");
                    // exit();
                  } else {
                    $code = $row['code'];
                    $subject = "Confirmer votre e-mail";
                    $message = "Bonjour, vous avez crée un compte sur Éco-Gaz-Amine, veuillez utiliser ce code pour confirmer votre adresse e-mail : $code";
                    $sender = "From: fortestcoder@gmail.com";
                    if (mail($email, $subject, $message, $sender)) {
                      //$mail_verify = "Nous avons envoyé un code de confirmation à votre adresse e-mail";
                      $_SESSION['mail_verify'] = $email;
                      $_SESSION['mail_access'] = "permission access mail_verify";
                      header('location: dist/email_verify.php');
                    } else {
                      echo "<div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\">
									                  <span class=\"ml-0\" style=\"font-size: 12px\">Votre adresse e-mail n'est pas encore confirmer, un code vous sera envoyer prochainnement.<span>
									                  <button type=\"button\" class=\"btn-close pb-1\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
									                  </div>";
                    }
                  }
                } else {
                  echo "<div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\">
									      <span class=\"ml-5\">Mot de passe incorrecte.<span>
									      <button type=\"button\" class=\"btn-close pb-1\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
									      </div>";
                }
              } else {
                echo "<div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\">
					          <span class=\"ml-5\">Nom d'utilisateur n'existe pas.<span>
                              <button type=\"button\" class=\"btn-close pb-1\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                              </div>";
              }
            }
          }
          ?>
        <div class="d-flex justify-content-center form_container mt-3">
          <!-- form login-->
          <form action="" method="POST">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="username" class="form-control input_user" placeholder="Nom utilisateur"
                value="<?php echo $username ?>" />
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="password" class="form-control input_pass" value=""
                placeholder="Mot de passe" />
            </div>
            <div class="d-flex justify-content-center mt-4 mb-3 login_container">
              <button type="submit" name="button" class="btn login_btn">Se connecter</button>
            </div>
          </form>
        </div>
        <div class="d-flex justify-content-center"><a href="dist/forgot-password.php">Mot de passe oublié?</a></div>
      </div>
    </div>
  </div>
  <footer class="py-4 bg-white mt-3">
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>
<?php } ?>