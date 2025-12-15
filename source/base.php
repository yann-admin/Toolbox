<?php
$titrePageH1="MON PORTE FOLIO";
//$onglet="MON PORTE FOLIO - Home";
$favIcon="../images/SOFTWAR.ico";
if(isset($_SESSION['identifiant'])){
    $hidden='';
}else{
    $hidden='hidden';//'';//;
}
?>
<!-- **********************************************************************
**** Titre: ????????????????????????????                               ****
**** Author: Yann Martin                                               ****
**** Version: 1.00                                                     ****
**** Date creation: 04/07/2025                                         ****
**** Date modification:                                                ****
*************************************************************************** -->
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="user-scalable=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="Yann MARTIN">
        <title> <?= $onglet ?> </title>
        <!--  <link rel="icon" href="<?= $favIcon ?>" type="image/x-icon">-->
        <link rel="shortcut icon" href="<?= $favIcon ?>" type="image/x-icon"> 
        <!-- Link to  styles fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven Pro">
        <!--Links to icons  -->
        <script src="https://kit.fontawesome.com/a9862965ca.js" crossorigin="anonymous"></script>
        <!-- Link to modale sweetalert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!--ICONES Bootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        <!-- Link to CSS styles sheets -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href=" "> 
        <!--Links to script JS   
        <script type="module" src="js/scriptControlForm.js"></script>-->
        <!-- header charger!!!! -->
    </head>
    <!-- Start body -->
    <body>
        <!-- Start div class="Wrapper" -->
        <div class="container">
            <header>
                <h1> <?php echo $titrePageH1 ?> </h1>
            </header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                <div class="container-fluid">
                    <!-- <a class="navbar-brand" href="#">Mon porte Folio</a> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle naviagtion">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav" <?= $hidden; ?>>
                            <li class="nav-item">
                                <a class="nav-link active" aria-curent="page" href="index.php">Acceuil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=creation&action=indexCreation">Mes Créations</a>
                            </li>
                        </ul>
                    </div>
                    <a href="index.php?controller=userapp&action=disconnect"><button type="button" class="btn btn-primary" <?= $hidden; ?>>Déconnection</button></a>
                </div>
            </nav>
            <main>
                <!-- Affichage dynamique de la variable $content -->
                <?= $content ?>
            </main>
            <!-- main charger!!!! -->
            <footer>
                <!--  <h1>Mon porte folio</h1> -->
            </footer>
            </div>
                <!-- Optional JavaScript; choose one of the two! -->
                <!-- Option 1: Bootstrap Bundle with Popper 
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        </body>
        <!-- End body -->
         <!-- footer charger!!!! -->
</html>