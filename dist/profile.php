<style>
.hide,
.hidepass,
.d-non {
  display: none;
}

.btn-close {
  font-size: 18px;
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>profile</title>
</head>

<body>
  <?php
  include('sidenav.php');

  // modifier les informations nom, prenom, username
  $error_username = "";
  $error_password = "";
  $error_message = "";
  $_SESSION['md-username'] = $_SESSION['username'];
  $_SESSION['md-nom'] = $_SESSION['nom'];
  $_SESSION['md-prenom'] = $_SESSION['prenom'];
  if (isset($_POST['modifier-info'])) {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $exusername = $_SESSION['username'];
  ?>
  <script>
  var nom = "<?php echo $nom ?>";
  </script>
  <script>
  var prenom = "<?php echo $prenom ?>";
  </script>
  <script>
  var username = "<?php echo $username ?>";
  </script>
  <?php

    $select = "SELECT user_table.username FROM user_table WHERE username = '$username' AND username != '$exusername'";
    $query = mysqli_query($con, $select);
    $num_row = mysqli_num_rows($query);
    if ($num_row > 0) {
      $error_username = "Ce nom d'utilisateur est déjà pris.";
    ?>
  <script>
  $(document).ready(function() {
    $(".hide").show();
    $(".show").hide();
    $(".username").val(username);
    $(".nom").val(nom);
    $(".prenom").val(prenom);
  });
  </script>
  <?php
    } else {
      $selectpass = "SELECT user_table.password FROM user_table WHERE username = '$exusername'";
      $query = mysqli_query($con, $selectpass);
      $row = mysqli_fetch_assoc($query);
      $password_hach = $row['password'];
      if (password_verify($password, $password_hach)) {
        $update = "UPDATE user_table SET nom = '$nom', prenom = '$prenom', username = '$username' WHERE username = '$exusername'";
        $query = mysqli_query($con, $update);
        if ($query) {
          $_SESSION['username'] = $username;
          $_SESSION['nom'] = $nom;
          $_SESSION['prenom'] = $prenom;
          $_SESSION['succes'] = "Les modifications apportées sont enregistré";
          header('location: profile.php');
        } else {
          $error_message = "Nous n'avons pas pu modifier vous informations, veuillez réessayer.";
      ?>
  <script>
  $(document).ready(function() {
    $(".hide").show();
    $(".show").hide();
    $(".username").val(username);
    $(".nom").val(nom);
    $(".prenom").val(prenom);
  });
  </script>
  <?php
        }
      } else {
        $error_password = "Mot de passe incorrecte.";
        ?>
  <script>
  $(document).ready(function() {
    $(".hide, .hidepass").show();
    $(".show, #registre").hide();
    $(".username").val(username);
    $(".nom").val(nom);
    $(".prenom").val(prenom);
  });
  </script>
  <?php
      }
    }
  }

  //modifier email 
  $error_mail = "";
  $error_pass = "";
  $error_mdemail = "";
  if (isset($_POST['modifier-mail'])) {
    $email = mysqli_real_escape_string($con, $_POST['nv-email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    ?>
  <script>
  var email = "<?php echo $email ?>";
  </script>
  <?php
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_mail = "la forme de cette e-mail n'est pas valide";
    ?>
  <script>
  $(document).ready(function() {
    $(".d-non").show();
    $('.inputemail').val(email);
    $(".md-password").hide();

  });
  </script>
  <?php
    } else {
      $username = $_SESSION['username'];
      $select = "SELECT user_table.email FROM user_table WHERE email='$email' AND user_table.username != '$username'";
      $query = mysqli_query($con, $select);
      $num_row = mysqli_num_rows($query);
      if ($num_row > 0) {
        $error_mail = "Cette adresse e-mail existe déjà";
      ?>
  <script>
  $(document).ready(function() {
    $(".d-non").show();
    $('.inputemail').val(email);
    $(".md-password").hide();
  });
  </script>
  <?php
      } else {
        $select = "SELECT user_table.password FROM user_table WHERE user_table.username = '$username'";
        $query = mysqli_query($con, $select);
        $row = mysqli_fetch_assoc($query);
        $fetch_password = $row['password'];
        if (password_verify($password, $fetch_password)) {
          $statut = "en_attente";
          $update = "UPDATE user_table SET email = '$email', statut = '$statut' WHERE user_table.username ='$username'";
          $query = mysqli_query($con, $update);
          if ($query) {
            $error_mail = "Adresse e-mail modifiée, nous vous demandons de la confirmer des votre reconnexion.";
        ?>
  <script>
  $(document).ready(function() {
    $(".d-non").show();
    $(".md-password").hide();
  });
  </script>
  <?php
            $_SESSION['@email'] = $email;
            header('location: profile.php');
          } else {
            $error_mdemail = "Une érreur est produite, veuillez réessayer.";
          ?>
  <script>
  $(document).ready(function() {
    $(".d-non").show();
    $('.inputemail').val(email);
    $(".md-password").hide();

  });
  </script>
  <?php
          }
        } else {
          $error_pass = "Mot de passe incorrecte";
          ?>
  <script>
  $(document).ready(function() {
    $(".d-non").show();
    $('.inputemail').val(email);
    $(".md-password").hide();

  });
  </script>
  <?php
        }
      }
    }
  }

  // modifier le mot de passe
  $error_mdpass = "";
  if (isset($_POST['modifier-password'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $username = $_SESSION['username'];
    if ($password == $cpassword) {
      if (strlen($password) < 8) {
        $error_mdpass = "Le mot de passe doit avoir au moins huit caractères.";
      } else {
        $password_hach = password_hash($password, PASSWORD_BCRYPT);
        $update = "UPDATE user_table SET password = '$password_hach' WHERE username = '$username'";
        $query = mysqli_query($con, $update);
        if ($query) {
          $error_mdpass = "Votre mot de passe a bien été modifié.";
          $_SESSION['password'] = $password_hach;
        } else {
          $error_mdpass = "une érreur est produite, veuillez réessayer.";
        }
      }
    } else {
      $error_mdpass = "Ces mot de passe ne correspondent pas, réessayer.";
    }
  }
  ?>

  <div id="layoutSidenav_content">
    <main>
      <?php
      if (isset($_SESSION['succes'])) {
      ?>
      <div class="d-flex justify-content-center pb-0">
        <div class="alert alert-success text-center mt-3">
          <?php echo $_SESSION['succes'] . "
                   <span type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\">&times</span>";
            unset($_SESSION['succes']);
            ?>
        </div>
      </div>
      <?php
      }
      ?>
      <div class="container col-md-11 rounded bg-white my-5">
        <div class="row">
          <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                width="150px" src="image/user.jpg">
              <span
                class="font-weight-bold text-muted mt-3"><?php echo strtoupper($_SESSION['nom']) . ' ' . ucwords($_SESSION['prenom']); ?></span>
              <span class="text-black-50 mt-1">
                <?php
                if ($_SESSION['role'] == "ADMIN") {
                  echo "Administrateur";
                } else {
                  echo "Utilisateur";
                } ?></span>
            </div>
          </div>
          <div class="col-md-5 border-right">
            <div class="p-3 pt-5">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-right">Informations sur le profile</h5>
              </div>
              <div class="row mt-2 show">
                <div class="col-md-6">
                  <span class="">
                    <h6>Nom :</h6> <?php echo strtoupper($_SESSION['nom']); ?>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="">
                    <h6>Prénom :</h6> <?php echo ucwords($_SESSION['prenom']); ?>
                  </span>
                </div>
              </div>
              <div class="row mt-3 show">
                <div class="col-md-12">
                  <span class="">
                    <h6>Nom utilisateur :</h6> <?php echo ($_SESSION['username']); ?>
                  </span>
                </div>
              </div>
              <div class="mt-4"><button class="btn btn-light float-right mt-3 show" type="button"
                  id="update-info">Modifier mes informations</button></div>
              <form action="" method="POST">
                <div class="row mt-2">
                  <div class="col-md-6 hide">
                    <label class="labels">Nom :</label>
                    <input type="text" class="form-control nom" name="nom" placeholder="Nom"
                      value="<?php echo $_SESSION['md-nom']; ?>" required>
                  </div>
                  <div class="col-md-6 hide">
                    <label class="labels">Prénom :</label>
                    <input type="text" class="form-control prenom" name="prenom"
                      value="<?php echo $_SESSION['md-prenom']; ?>" placeholder="Prénom" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12 hide">
                    <label class="labels">Nom utilisateur :</label>
                    <input type="text" class="form-control mb-1 username" name="username"
                      placeholder="Entrer un nom utilisateur" value="<?php echo $_SESSION['md-username']; ?>" required>
                    <span class="text-danger error"><?php echo $error_username; ?></span>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12 hidepass">
                    <label class="labels text-primary">- Entrer votre mot de passe pour enregistrer vos modifications *
                      :</label>
                    <input type="password" class="form-control mb-1" name="password"
                      placeholder="Entrer votre mot de passe" value="" required>
                    <span class="text-danger error"><?php echo $error_password; ?></span>
                  </div>
                </div>
                <span class="text-danger hide error"><?php echo $error_message; ?></span>
                <div class="mt-4 text-right d-flex float-right pb-5">
                  <button class="btn btn-light hide col-md-6 mr-2" id="annuler" type="button">Annuler</button>
                  <button class="btn btn-primary hide col-md-6" id="registre" type="button">Enregistrer</button>
                  <div class="hidepass"><button class="btn btn-primary" type="submit"
                      name="modifier-info">Enregistrer</button></div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center">
                <h5>E-mail et mot de passe</h5>
              </div><br>
              <div class="">
                <div class="d-flex justify-content-between">
                  <div class="float-left">
                    <h6>email :</h6> <?php echo ($_SESSION['@email']); ?>
                  </div>
                  <div class="float-right mt-3">
                    <button type="button" class="update-email icon-awessome" data-toggle="tooltip" data-placement="top"
                      title="Modifier e-mail"><i class="fas fa-edit color-icon"></i></button>
                  </div>
                </div>
                <div class="mt-3 d-non">
                  <form action="" method="POST">
                    <div class="row">
                      <input type="text" name="nv-email" class="form-control col-md-10 inputemail"
                        placeholder="Entrer une nouvelle adresse e-mail" value="" required style="font-size: 15px;">
                      <button type="button" class="btn-close icon-awessome ml-2 mt-1 annuler-m-email"
                        data-toggle="tooltip" data-placement="top" title="Annuler">&times</button>
                      <span class="text-danger error mt-1"><?php echo $error_mail; ?></span>
                      <input type="password" name="password" class="form-control col-md-10 mt-3"
                        placeholder="Entrer votre mot de passe" value="" required style="font-size: 15px;">
                      <span class="text-danger error mt-1"><?php echo $error_pass; ?></span>
                    </div>
                    <div class="row float-right">
                      <button type="submit" name="modifier-mail" class="btn btn-primary mr-5 mt-2">Enregistrer</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-12 md-password">
                <form action="" method="POST">
                  <div class="row">
                    <label class="labels pt-3">
                      <h6>Mot de passe :</h6>
                    </label>
                    <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe"
                      value="" required>
                    <input type="password" name="cpassword" class="form-control my-3"
                      placeholder="Confirmer le noveau mot de passe" value="" required>
                    <span class="text-danger error mb-2"><?php echo $error_mdpass; ?></span>
                  </div>
                  <div class="row justify-content-end">
                    <button type="submit" name="modifier-password" class="btn btn-primary">Enregistrer</button>
                  </div>
                </form>
              </div>
              <span class="text-danger error d-non mt-1"><?php echo $error_mdemail; ?></span>
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

  </div>


  <script>
  $(document).ready(function() {
    $('#update-info').click(function() {
      $(".hide").show();
      $(".show").hide();
    });

    var username = "<?php echo $_SESSION['username'] ?>";
    var nom = "<?php echo $_SESSION['nom'] ?>";
    var prenom = "<?php echo $_SESSION['prenom'] ?>";

    $('#annuler').click(function() {
      $(".hide, .hidepass").hide();
      $(".show").show();
      $('.error').text(" ");
      $('.username').val(username);
      $('.nom').val(nom);
      $('.prenom').val(prenom);
    });
    $('#registre').click(function() {
      $(".hidepass").show();
      $("#registre").hide();
    });

    $('.update-email').click(function() {
      $(".d-non").show();
      $('.inputemail').focus();
      $(".md-password").hide();
    });

    $('.annuler-m-email').click(function() {
      $(".d-non").hide();
      $('.inputemail').val("");
      $('.error').text(" ");
      $(".md-password").show();
    });

  });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>