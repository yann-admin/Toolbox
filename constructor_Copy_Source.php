<?php
    #Copy file source/Controller.php => Controllers
    if (!file_exists('../Controllers/Controller.php')){copy("source/Controller.php","../Controllers/Controller.php");};
    #Copy file source/HomeController.php => Controllers
    if (!file_exists('../Controllers/HomeController.php')){copy("source/HomeController.php","../Controllers/HomeController.php");};
    #Copy file source/DbConnect.php => Core
    if (!file_exists('../Core/DbConnect.php')){copy("source/DbConnect.php","../Core/DbConnect.php");};
    #Copy file source/Form.php => Core
    if (!file_exists('../Core/Form.php')){copy("source/Form.php","../Core/Form.php");};
    #Copy file source/Router.php => Core
    if (!file_exists('../Core/Router.php')){copy("source/Router.php","../Core/Router.php");};
    #Copy file source/Token.php => Core
    if (!file_exists('../Core/Token.php')){copy("source/Token.php","../Core/Token.php");};
    #Copy file source/Autoloader.php => Racine
    if (!file_exists('../Autoloader.php')){copy("source/Autoloader.php","../Autoloader.php");};
    #Copy file source/style.css => Public
    if (!file_exists('../css/global.css')){copy("source/global.css","../css/global.css");};
    #Copy file source/index.php => Public
    if (!file_exists('../Public/index.php')){copy("source/index.php","../Public/index.php");};
    #Copy file source/indexHome.php => Views/home
    if (!file_exists('../Views/home/index.php')){copy("source/indexHome.php","../Views/home/index.php");};
    #Copy file source/base.php => Views
    if (!file_exists('../Views/base.php')){copy("source/base.php","../Views/base.php");};
    #Copy file source/base.php => Views
    if (!file_exists('../Core/Files.php')){copy("source/Files.php","../Core/Files.php");};
    #Copy file source/source_images/SOFTWAR.ico => images
    if (!file_exists('../images/SOFTWAR.ico')){copy("source/source_images/SOFTWAR.ico","../images/SOFTWAR.ico");};
?>