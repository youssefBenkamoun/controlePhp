<?php
session_start();
extract($_GET);
$message = "";
$p = $_GET['token'];
$rec = $_GET['email'];

if (isset($_POST['btn_submit'])) {
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        include_once 'classes/Departement.php';
        include_once 'services/DepartementService.php';
        $es = new DepartementService();
        $cin = $es->findByEmail($_POST['email']);
        $em = $es->findById($cin);
        if ($_GET['token'].'+y2001' == $_POST['password']) {
            $_SESSION['employe'] = $em->getCin();
            $_SESSION['photo'] = $em->getPhoto();
            $_SESSION['nom'] = $em->getNom();
            $_SESSION['prenom'] = $em->getPrenom();
            $_SESSION['role'] = $em->getPoint();
            $_SESSION['n_drp'] = $em->getNdrp();
            $_SESSION['telephone'] = $em->getTelephone();
            $_SESSION['naissance'] = $em->getNaissance();
            $_SESSION['recrutement'] = $em->getRecrutement();
            $_SESSION['directeur'] = $em->getDirecteur();
            $_SESSION['structure'] = $em->getStructure();
            $_SESSION['specialite'] = $em->getSpecialite();
            $_SESSION['prof_ensa'] = $em->getEnsa();
            $_SESSION['id'] = $em->getId();
            $_SESSION['password'] = $em->getPassword();
            $_SESSION['pedagogique'] = $em->getPedagogique();
            $_SESSION['administratif'] = $em->getAdministratif();
            $_SESSION['scientifique'] = $em->getScientifique();
            $_SESSION['email'] = $em->getEmail();
            header('Location:./index.php');
        }
        else{
            header('Location: ./acceder.php?email='.$rec.'&token='.$p);
          //header('Location:./login.php?error=invalid');
        }
    } else {
        header('Location: ./acceder.php?email='.$rec.'&token='.$p);
        //header('Location:./login.php?error=vide');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Candidature - Login</title>

        <!-- Fontfaces CSS-->
        <link href="style/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="style/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="./">
                                    <span class="h2 text-dark">Verification de mot de passe</span>
                                </a>
                            </div>
                            <div class="login-form">
                              <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="invalid")
                                        echo '<div class="alert alert-danger" role="alert">Mote de passe ou Email incorrect!</div>';
                                    if($_GET['error']=="vide")
                                        echo '<div class="alert alert-danger" role="alert">Quelque champ est vide</div>';
                                }if(isset($_GET['success'])){
                                    if($_GET['success']=="verifyok")
                                        echo '<div class="alert alert-success" role="alert">Votre mot de passe est changé avec succés</div>';
                                }
                               ?>
                                <form action="" method="POST" id="checkLogin" >
                                    <div class="form-group">
                                        <label>Adresse Email</label>
                                        <input class="au-input au-input--full" type="text" id="" value="<?php echo $_GET['email'];?>" name="email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>token de verification</label>
                                        <input class="au-input au-input--full" type="password" id="password" name="password" placeholder="token">
                                    </div>
                                    
                                    <button id="connect" name="btn_submit" class="btn au-btn--block btn-outline-success" type="submit">Connexion</button>
                                    <a href="./login.php" class="btn au-btn--block btn-outline-info" >autre compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>


        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="script/main.js" type="text/javascript"></script>
    </body>

</html>
<!-- end document-->
