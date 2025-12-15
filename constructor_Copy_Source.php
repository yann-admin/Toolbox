<?php
    #Copy file source/Controller.php => Controllers
    if (!file_exists('../app/Controllers/Controller.php')){copy("source/Controller.php","../app/Controllers/Controller.php");};
    #Copy file source/HomeController.php => Controllers
    if (!file_exists('../app/Controllers/HomeController.php')){copy("source/HomeController.php","../app/Controllers/HomeController.php");};
    #Copy file source/DbConnect.php => Core
    if (!file_exists('../app/Core/DbConnect.php')){copy("source/DbConnect.php","../app/Core/DbConnect.php");};
    #Copy file source/Form.php => Core
    if (!file_exists('../app/Core/Form.php')){copy("source/Form.php","../app/Core/Form.php");};
    #Copy file source/Router.php => Core
    if (!file_exists('../app/Core/Router.php')){copy("source/Router.php","../app/Core/Router.php");};
    #Copy file source/Token.php => Core
    if (!file_exists('../app/Core/Token.php')){copy("source/Token.php","../app/Core/Token.php");};
    #Copy file source/Autoloader.php => Racine
    if (!file_exists('../app/Autoloader.php')){copy("source/Autoloader.php","../app/Autoloader.php");};
    #Copy file source/style.css => Public
    if (!file_exists('../app/css/global.css')){copy("source/global.css","../app/css/global.css");};
    #Copy file source/index.php => Public
    if (!file_exists('../app/Public/index.php')){copy("source/index.php","../app/Public/index.php");};
    #Copy file source/indexHome.php => Views/home
    if (!file_exists('../app/Views/home/index.php')){copy("source/indexHome.php","../app/Views/home/index.php");};
    #Copy file source/base.php => Views
    if (!file_exists('../app/Views/base.php')){copy("source/base.php","../app/Views/base.php");};
    #Copy file source/base.php => Views
    if (!file_exists('../app/Core/Files.php')){copy("source/Files.php","../app/Core/Files.php");};
    #Copy file source/source_images/SOFTWAR.ico => images
    if (!file_exists('../app/images/SOFTWAR.ico')){copy("source/source_images/SOFTWAR.ico","../app/images/SOFTWAR.ico");};
?>