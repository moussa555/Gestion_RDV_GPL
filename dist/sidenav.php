<?php
ob_start();
include('db_connecte.php');

?>
<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header('location: ../login.php');
} else {

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
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/mystyle.css" rel="stylesheet" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-light topbar static-top">
    <!-- Sidebar Toggle (Topbar) -->
    <span class="navbar-brand" style="color: #086de0; font-weight: 600;">Éco Gaz Amine
      <button id="sidebarToggle" class="btn btn-link mb-1 ml-5">
        <i class="fa fa-bars"></i>
      </button></span>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto mr-4">
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span
            class="mr-2 d-none d-lg-inline user-session"><?php echo strtoupper($_SESSION['nom']) . " " . ucwords($_SESSION['prenom']) ?></span>
          <img class="img-profile rounded-circle mb-1" src="image/user.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php" data-target="#logoutModal">
            <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
            Mon Compte
          </a>
          <a class="dropdown-item" href="logout.php" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Se Déconnecter
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <a class="nav-link sb-color" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i>
              </div>Dashboard
            </a>
            <a class="nav-link sb-color" href="add_rendez_vous.php">
              <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
              Rendez-Vous
            </a>
            <a class="nav-link sb-color" href="user.php">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i>
              </div>Utilisateur
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer py-4">
          <div class="small text-muted">Admin : Tahir Youcef</div>
        </div>
      </nav>
    </div>
    <script>
    $(document).ready(function() {
      $('.sb-color').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active')
      });
    });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="js/action.js"></script>

</body>

</html>
<?php }  ?>