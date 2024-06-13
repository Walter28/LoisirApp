<?php
    session_start();

    //verification si l'utilisateur est connecte
    if (isset($_SESSION['userid'])) {
        $user = $_SESSION['userid'];
    } else {
        // header('location:../');
        // unset($_SESSION['useremail']);
        // unset($_SESSION['userid']);
    }

    //deconnection de l'utilisateur
    if(isset($_GET['deconnexion'])) {
        if ($_GET['deconnexion']==true) {
            session_unset();
            // header("location:../");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoisirApp</title>
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- font-awesome css  -->
    <link rel="stylesheet" href="assets/css/all.css">

    <!-- new bootstrap -->
    <!-- i<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <scrpt src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    
</head>

<body class="body-fixed">

    <?php include("controllers/getListeActivites.php"); ?>
    <?php include("controllers/getListeActivitesByCateg.php"); ?>
    <?php include("controllers/getUtilisateurStatusCompte.php"); ?>
    <?php include("controllers/getListeActivitesRecente.php"); ?>


    <!-- start of header  -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="logo.png" width="160" height="36" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="index.html">Acceuil</a></li>
                                <li><a href="#menu">Activités</a></li>
                                <!-- <li><a href="#gallery"></a></li> -->
                                <li><a href="#blog">Recent</a></li>
                                <?php if(isset($_SESSION['userid'])) { ?>
                                    <li><a href="views/create_activity.php">Cree Activité</a></li>
                                <?php } ?>
                                <li><a href="views/terms-cond.php">Terms & Conditions </a></li>
                                <!-- <li><a href="#contact">Contact</a></li> -->
                            </ul>
                        </nav>
                        <div class="header-right">
                            <form action="#" class="header-search-form for-des">
                                <input type="search" class="form-input" placeholder="Search Here...">
                                <button type="submit">
                                    <i class="uil uil-search"></i>
                                </button>
                            </form>
                            <a href="javascript:void(0)" class="header-btn header-cart">
                                <i class="uil uil-shopping-bag"></i>
                                <span class="cart-number">3</span>
                            </a>
                            <!-- <a href="javascript:void(0)" class="header-btn">
                                <i class="uil uil-user-md"></i>
                            </a> -->

                            <?php if(isset($_SESSION['userid'])) { ?>
                            <ul class="topbar-menu d-flex align-items-center gap-3">
                                <?php $status_compte = getStatusCompte() ?>
        
                                <li class="dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <!-- <span class="account-user-avatar">
                                            <img src="../assets/images/avatar.png" alt="user-image" width="32" class="rounded-circle">
                                        </span> -->
                                        <i class="uil uil-user-md"></i>
                                        <!-- <span class="d-lg-flex flex-column gap-1 d-none">
                                            <h5 class="my-0">Walter</h5>
                                            <h6 class="my-0 fw-normal">Admin</h6>
                                        </span> -->
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                        <!-- item-->
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Bienvenu !</h6>
                                        </div>
        
                                        <!-- item-->
                                        
                                        <?php if($status_compte=="proprietaire") { ?>
                                        <a href="views/profile.php" class="dropdown-item">
                                            <i class="mdi mdi-account-circle me-1"></i>
                                            <span>Mon Compte</span>
                                        </a>
                                        <?php } ?>
                                        <!-- item-->
                                        <a href="?deconnexion=true" class="dropdown-item">
                                            <i class="mdi mdi-logout me-1"></i>
                                            <span>Se Deconnecter</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <?php } ?>
                            <?php if(!isset($_SESSION['userid'])) { ?>
                                <a href="login.php" style="margin-left:20px">Login</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends  -->

    <div id="viewport">
        <div id="js-scroll-content">
            <section class="main-banner" id="home">
                <div class="js-parallax-scene">
                    <div class="banner-shape-1 w-100" data-depth="0.30">
                        <img src="assets/images/berry.png" alt="">
                    </div>
                    <div class="banner-shape-2 w-100" data-depth="0.25">
                        <img src="assets/images/leaf.png" alt="">
                    </div>
                </div>
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <h1 class="h1-title">
                                        Bienvenue a
                                        <span>Goma</span>
                                        Loisir.
                                    </h1>
                                    <p>Découvrez Goma autrement avec notre application ! Explorez 
                                        une variété d'activités de loisirs, réservez en ligne et 
                                        vivez des aventures inoubliables. Stimulez le tourisme local dès aujourd'hui</p>
                                    <div class="banner-btn mt-4">
                                        <a href="#menu" class="sec-btn">Voir nos loisirs </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img" style="background-image: url(assets/images/serenayy.jpg);">
                                    </div>
                                </div>
                                <div class="banner-img-text mt-4 m-auto">
                                    <!-- <h5 class="h5-title">Sushi</h5>
                                    <p>.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-service text-center">

                <h1 class="section-service-h1">Planifiez, réservez, partagez : nous vous facilitons la tâche</h1>
                    
                <div class="section-container">
                    <div class="s1 d-flex" style="flex-direction: column; align-items: center">
                        <div class="section-container-img">
                            <span class="fa fa-home" style="color: #fff; font-size: 20px;"></span>
                        </div>
                        <h4 class="subtitle">Planifiez</h4>
                        <p>"Organisez votre temps de loisirs avec précision grâce à notre fonction de planification. 
                            Choisissez parmi une multitude d'activités et construisez votre emploi du temps idéal en quelques clics.
                            Planifiez vos aventures avec facilité et efficacité. 
                            Notre application vous permet de créer des itinéraires personnalisés 
                            pour explorer de nouveaux horizons et vivre des expériences inoubliables."</p>
                    </div>
                    <div class="s2 d-flex" style="flex-direction: column; align-items: center">
                        <div class="section-container-img">
                            <span class="fa fa-laptop" style="color: #fff; font-size: 20px;"></span>
                        </div>
                        <h4 class="subtitle">Reservation facile a prix abordable</h4>
                        <p>"Réservez vos billets pour l'aventure en quelques instants. Notre système de réservation 
                            rapide et sécurisé vous permet de garantir votre place dans les activités les plus prisées,
                             sans tracas. Ne laissez pas les opportunités de loisirs vous échapper. Avec notre outil
                              de réservation intuitif, bloquez vos places pour les événements et les activités dès maintenant,
                               et vivez l'instant présent en toute sérénité."</p>
                    </div>
                    <div class="s3 d-flex" style="flex-direction: column; align-items: center">
                        <div class="section-container-img">
                            <span class="fa fa-briefcase" style="color: #fff; font-size: 20px;"></span>
                        </div>
                        <h4 class="subtitle">Faite decouvrir votre communaute</h4>
                            <p>Partagez vos passions avec vos proches en toute simplicité. Notre plateforme vous permet 
                                de recommander des activités, de créer des listes de favoris et de partager vos découvertes 
                                avec votre réseau social. La joie des loisirs est encore meilleure lorsqu'elle est 
                                partagée. Avec notre fonction de partage intégrée, invitez vos amis à se joindre à vos 
                                escapades et créez des souvenirs ensemble.</p>
                    </div>
                </div>
            </section>


            <section class="about-sec section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">Tourisme</p>
                                <h2 class="h2-title">Decouvrez <span>Goma Autrement</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="assets/images/title-shape.svg" alt="">
                                </div>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe dolore at
                                    aspernatur eveniet temporibus placeat voluptatum quaerat accusamus possimus
                                    cupiditate, quidem impedit sed libero id perspiciatis esse earum repellat quam.
                                    Dolore modi temporibus quae possimus accusantium, cum corrupti sed deserunt iusto at
                                    sapiente nihil sint iste similique soluta dolor! Quod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 m-auto">
                            <div class="about-video">
                                <div class="about-video-img" style="background-image: url(assets/images/serna11.jpg);">
                                </div>
                                <div class="play-btn-wp">
                                    <a href="assets/images/voir_goma.mp4" data-fancybox="video" class="play-btn">
                                        <i class="uil uil-play"></i>

                                    </a>
                                    <span>Voir les endroit chic  de Goma</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section style="background-image: url(assets/images/menu-bg.png);"
                class="our-menu section bg-light repeat-img" id="menu">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Nos Activités</p>
                                    <h2 class="h2-title">Voir nos<span>differentes activités</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-tab-wp">
                            <div class="row">
                                <div class="col-lg-12 m-auto">
                                    <div class="menu-tab text-center">
                                        <ul class="filters">
                                            <div class="filter-active"></div>
                                            <li class="filter" data-filter=".tout, .sport, .religion, .chill, .culture, .tourisme">
                                                <img src="assets/images/trotti.png" alt="">
                                                Tout
                                            </li>
                                            <li class="filter" data-filter=".sport">
                                                <img src="assets/images/sport.png" alt="">
                                                Sport
                                            </li>
                                            <li class="filter" data-filter=".religion">
                                                <img src="assets/images/religion.png" alt="">
                                                Religion
                                            </li>
                                            <li class="filter" data-filter=".chill">
                                                <img src="assets/images/chill.png" alt="">
                                                Chill
                                            </li>
                                            <li class="filter" data-filter=".culture">
                                                <img src="assets/images/tourisme.png" alt="">
                                                Tourisme
                                            </li>
                                            <li class="filter" data-filter=".tourisme">
                                                <img src="assets/images/menu-4.png" alt="">
                                                Culture
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu-list-row">
                            <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                                <!-- 1 -->
                                <!-- Activite sport -->
                                <?php foreach ($activitesports = getListeActivitesSport() as $activite) { ?>

                                    <?php
                                        // get the day of the week according to the date to the text format
                                        $dateString = $activite->getDateActivite();
                                        $date = new DateTime($dateString);
                                        
                                        $formatter= new IntlDateFormatter(
                                            'fr_FR',
                                            IntlDateFormatter::FULL,
                                            IntlDateFormatter::NONE,
                                            'Europe/Paris',
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE' // pour obtenir le jour complet de la semaine
                                        );

                                        // obtenir le jour de la semaine en francais
                                        $dayOfWeek = $formatter->format($date);
                                    ?>

                                    <div class="col-lg-4 col-sm-6 dish-box-wp sport" data-cat="sport">
                                        <div class="dish-box text-center">
                                            <div class="dist-img d-flex justify-content-center">
                                            <img id="img-activity" src="assets/images/activities_photos/<?= $activite->getPhoto1() ?>" width="260" height="260" alt="">
                                                <div id="desc-activity" class="description bg-dark rounded-circle d-none" style="width: 260px;height: 260px;">
                                                    <p>Description</p>
                                                </div>
                                            </div>
                                            <div class="">
                                                <p class="sec-sub-title-badge mb-3">Sport</p>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title"><?= $activite->getTitreActivite() ?></h3>
                                                <p class=""><span class="fa fa-location-dot"></span> <?= $activite->getLieuActivite() ?></p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p style="text-transform:uppercase"><?= $dayOfWeek ?></p>
                                                        <b><?= $activite->getDateActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span 
                                                                class="far fa-clock" 
                                                                style="color: #ce1111;
                                                                        font-size:large">
                                                            </span>
                                                        </p>
                                                        <b><?= $activite->getHeure() ?></b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b><?= $activite->getPrixActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <a href="views/description.php?id=<?= $activite->getIdActivite() ?>">Description</a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php } ?>

                                <!-- 2 -->
                                <!-- Activite Religion -->
                                <?php foreach ($activitereligions = getListeActivitesReligion() as $activite) { ?>

                                    <?php
                                        // get the day of the week according to the date to the text format
                                        $dateString = $activite->getDateActivite();
                                        $date = new DateTime($dateString);
                                        
                                        $formatter= new IntlDateFormatter(
                                            'fr_FR',
                                            IntlDateFormatter::FULL,
                                            IntlDateFormatter::NONE,
                                            'Europe/Paris',
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE' // pour obtenir le jour complet de la semaine
                                        );

                                        // obtenir le jour de la semaine en francais
                                        $dayOfWeek = $formatter->format($date);
                                    ?>
                                        
                                    <div class="col-lg-4 col-sm-6 dish-box-wp religion" data-cat="religion">
                                        <div class="dish-box text-center">
                                            <div class="dist-img d-flex justify-content-center">
                                                <img id="img-activity" src="assets/images/activities_photos/<?= $activite->getPhoto1() ?>" width="260" height="260" alt="">
                                                <div id="desc-activity" class="description bg-dark rounded-circle d-none" style="width: 260px;height: 260px;">
                                                    <p>Description</p>
                                                </div>
                                            </div>
                                            <div class="">
                                                <p class="sec-sub-title-badge mb-3">Religion</p>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title"><?= $activite->getTitreActivite() ?></h3>
                                                <p class=""><span class="fa fa-location-dot"></span> <?= $activite->getLieuActivite() ?></p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p style="text-transform:uppercase"><?= $dayOfWeek ?></p>
                                                        <b><?= $activite->getDateActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span 
                                                                class="far fa-clock" 
                                                                style="color: #ce1111;
                                                                        font-size:large">
                                                            </span>
                                                        </p>
                                                        <b><?= $activite->getHeure() ?></b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b><?= $activite->getPrixActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <a href="views/description.php?id=<?= $activite->getIdActivite() ?>">Description</a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php } ?>

                                <!-- 3 -->
                                <!-- Activite chill -->
                                <?php foreach ($activitechills = getListeActivitesChill() as $activite) { ?>

                                    <?php
                                        // get the day of the week according to the date to the text format
                                        $dateString = $activite->getDateActivite();
                                        $date = new DateTime($dateString);
                                        
                                        $formatter= new IntlDateFormatter(
                                            'fr_FR',
                                            IntlDateFormatter::FULL,
                                            IntlDateFormatter::NONE,
                                            'Europe/Paris',
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE' // pour obtenir le jour complet de la semaine
                                        );

                                        // obtenir le jour de la semaine en francais
                                        $dayOfWeek = $formatter->format($date);
                                    ?>
                                        
                                    <div class="col-lg-4 col-sm-6 dish-box-wp chill" data-cat="chill">
                                        <div class="dish-box text-center">
                                            <div class="dist-img d-flex justify-content-center">
                                                <img id="img-activity" src="assets/images/activities_photos/<?= $activite->getPhoto1() ?>" width="260" height="260" alt="">
                                                <div id="desc-activity" class="description bg-dark rounded-circle d-none" style="width: 260px;height: 260px;">
                                                    <p>Description</p>
                                                </div>
                                            </div>
                                            <div class="">
                                                <p class="sec-sub-title-badge mb-3">Chill</p>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title"><?= $activite->getTitreActivite() ?></h3>
                                                <p class=""><span class="fa fa-location-dot"></span> <?= $activite->getLieuActivite() ?></p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p style="text-transform:uppercase"><?= $dayOfWeek ?></p>
                                                        <b><?= $activite->getDateActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span 
                                                                class="far fa-clock" 
                                                                style="color: #ce1111;
                                                                        font-size:large">
                                                            </span>
                                                        </p>
                                                        <b><?= $activite->getHeure() ?></b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b><?= $activite->getPrixActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <a href="views/description.php?id=<?= $activite->getIdActivite() ?>">Description</a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php } ?>

                                <!-- 4 -->
                                <!-- Activite Tourisme -->
                                <?php foreach ($activitetourismes = getListeActivitesTourisme() as $activite) { ?>

                                    <?php
                                        // get the day of the week according to the date to the text format
                                        $dateString = $activite->getDateActivite();
                                        $date = new DateTime($dateString);
                                        
                                        $formatter= new IntlDateFormatter(
                                            'fr_FR',
                                            IntlDateFormatter::FULL,
                                            IntlDateFormatter::NONE,
                                            'Europe/Paris',
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE' // pour obtenir le jour complet de la semaine
                                        );

                                        // obtenir le jour de la semaine en francais
                                        $dayOfWeek = $formatter->format($date);
                                    ?>
                                        
                                    <div class="col-lg-4 col-sm-6 dish-box-wp tourisme" data-cat="tourisme">
                                        <div class="dish-box text-center">
                                            <div class="dist-img d-flex justify-content-center">
                                                <img id="img-activity" src="assets/images/activities_photos/<?= $activite->getPhoto1() ?>" width="260" height="260" alt="">
                                                <div id="desc-activity" class="description bg-dark rounded-circle d-none" style="width: 260px;height: 260px;">
                                                    <p>Description</p>
                                                </div>
                                            </div>
                                            <div class="">
                                                <p class="sec-sub-title-badge mb-3">Tourisme</p>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title"><?= $activite->getTitreActivite() ?></h3>
                                                <p class=""><span class="fa fa-location-dot"></span> <?= $activite->getLieuActivite() ?></p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p style="text-transform:uppercase"><?= $dayOfWeek ?></p>
                                                        <b><?= $activite->getDateActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span 
                                                                class="far fa-clock" 
                                                                style="color: #ce1111;
                                                                        font-size:large">
                                                            </span>
                                                        </p>
                                                        <b><?= $activite->getHeure() ?></b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b><?= $activite->getPrixActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <a href="views/description.php?id=<?= $activite->getIdActivite() ?>">Description</a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php } ?>

                                <!-- 5 -->
                                <!-- Activite Culture -->
                                <?php foreach ($activitereligions = getListeActivitesCulture() as $activite) { ?>

                                    <?php
                                        // get the day of the week according to the date to the text format
                                        $dateString = $activite->getDateActivite();
                                        $date = new DateTime($dateString);
                                        
                                        $formatter= new IntlDateFormatter(
                                            'fr_FR',
                                            IntlDateFormatter::FULL,
                                            IntlDateFormatter::NONE,
                                            'Europe/Paris',
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE' // pour obtenir le jour complet de la semaine
                                        );

                                        // obtenir le jour de la semaine en francais
                                        $dayOfWeek = $formatter->format($date);
                                    ?>
                                        
                                    <div class="col-lg-4 col-sm-6 dish-box-wp culture" data-cat="culture">
                                        <div class="dish-box text-center">
                                            <div class="dist-img d-flex justify-content-center">
                                                <img id="img-activity" src="assets/images/activities_photos/<?= $activite->getPhoto1() ?>" width="260" height="260" alt="">
                                                <div id="desc-activity" class="description bg-dark rounded-circle d-none" style="width: 260px;height: 260px;">
                                                    <p>Description</p>
                                                </div>
                                            </div>
                                            <div class="">
                                                <p class="sec-sub-title-badge mb-3">Culture</p>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title"><?= $activite->getTitreActivite() ?></h3>
                                                <p class=""><span class="fa fa-location-dot"></span> <?= $activite->getLieuActivite() ?></p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p style="text-transform:uppercase"><?= $dayOfWeek ?></p>
                                                        <b><?= $activite->getDateActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span 
                                                                class="far fa-clock" 
                                                                style="color: #ce1111;
                                                                        font-size:large">
                                                            </span>
                                                        </p>
                                                        <b><?= $activite->getHeure() ?></b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b><?= $activite->getPrixActivite() ?></b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <a href="views/description.php?id=<?= $activite->getIdActivite() ?>">Description</a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php } ?>                              

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section class="two-col-sec section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="sec-img mt-5">
                                <img src="assets/images/pizza.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="sec-text">
                                <h2 class="xxl-title">Chicken Pepperoni</h2>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet dolores
                                    eligendi earum eveniet soluta officiis asperiores repellat, eum praesentium nihil
                                    totam. Non ipsa expedita repellat atque mollitia praesentium assumenda quo
                                    distinctio excepturi nobis tenetur, cum ab vitae fugiat hic aspernatur? Quos
                                    laboriosam, repudiandae exercitationem atque a excepturi vel. Voluptas, ipsa.</p>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. At fugit laborum
                                    voluptas magnam sed ad illum? Minus officiis quod deserunt.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="two-col-sec section pt-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-1 order-2">
                            <div class="sec-text">
                                <h2 class="xxl-title">Chicken Pepperoni</h2>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet dolores
                                    eligendi earum eveniet soluta officiis asperiores repellat, eum praesentium nihil
                                    totam. Non ipsa expedita repellat atque mollitia praesentium assumenda quo
                                    distinctio excepturi nobis tenetur, cum ab vitae fugiat hic aspernatur? Quos
                                    laboriosam, repudiandae exercitationem atque a excepturi vel. Voluptas, ipsa.</p>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. At fugit laborum
                                    voluptas magnam sed ad illum? Minus officiis quod deserunt.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
                            <div class="sec-img">
                                <img src="assets/images/sushi.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

            <section class="book-table section bg-light">
                <div class="book-table-shape">
                    <!-- <img src="assets/images/table-leaves-shape.png" alt=""> -->
                </div>

                <div class="book-table-shape book-table-shape2">
                    <!-- <img src="assets/images/table-leaves-shape.png" alt=""> -->
                </div>

                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Top Activity</p>
                                    <h2 class="h2-title">Les activités ayant<span>les plus grandes empleurs</span></h2>
                                    <?php foreach ($activitesponsored = getActiviteSponsored() as $activite) { ?>
                                    <div class="sec-title-shape mb-4">
                                        <a href="">
                                            <img src="assets/images/activities_photos/<?= $activite->getAfficheActivite() ?>" alt="">
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="gallery">
                            <div class="col-lg-10 m-auto">
                                <div class="book-table-img-slider" id="icon">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($activitesponsored = getActivitesSponsored() as $activite) { ?>
                                            <a href="assets/images/activities_photos/<?= $activite->getAfficheActivite() ?>" data-fancybox="table-slider"
                                                class="book-table-img back-img swiper-slide"
                                                style="background-image: url(assets/images/activities_photos/<?= $activite->getAfficheActivite() ?>)">
                                            </a>
                                        <?php } ?>
                                    </div>

                                    <div class="swiper-button-wp">
                                        <div class="swiper-button-prev swiper-button">
                                            <i class="uil uil-angle-left"></i>
                                        </div>
                                        <div class="swiper-button-next swiper-button">
                                            <i class="uil uil-angle-right"></i>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </section>

            <!-- <section class="our-team section">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Our Team</p>
                                    <h2 class="h2-title">Meet our Chefs</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row team-slider">
                            <div class="swiper-wrapper">
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/c1.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Nilay Hirpara</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/c2.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Ravi Kumawat</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/c3.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Navnit Kumar</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/c4.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Pranav Badgal</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/c5.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Priyotosh Dey</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-wp">
                                <div class="swiper-button-prev swiper-button">
                                    <i class="uil uil-angle-left"></i>
                                </div>
                                <div class="swiper-button-next swiper-button">
                                    <i class="uil uil-angle-right"></i>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </section> -->

            <section class="testimonials section bg-light">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Ce qu'ils disent</p>
                                    <h2 class="h2-title">Ce ques nos utilisateurs <span>disent sur nous</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="testimonials-img">
                                    <img src="assets/images/ben.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t1.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:85%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Nilay Hirpara
                                                </h3>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                                    quisquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t2.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:80%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Ravi Kumawat
                                                </h3>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                                    quisquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t3.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:89%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Navnit Kumar
                                                </h3>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                                    quisquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t4.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:100%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Somyadeep Bhowmik
                                                </h3>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                                    quisquam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section class="faq-sec section-repeat-img" style="background-image: url(assets/images/faq-bg.png);">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">faqs</p>
                                    <h2 class="h2-title">Frequently <span>asked questions</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-row">
                            <div class="faq-box">
                                <h4 class="h4-title">What are the login hours?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">What do i get my refund?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">How long it will take food to arrive?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Does your restaurant has both veg and non veg?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Voluptates, distinctio?</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">What is cost of food delivery?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Nam officiis ducimus, cum enim repudiandae animi.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Who is eligible for pro membership?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. </p>
                            </div>
                        </div>

                    </div>
                </div>

            </section> -->


            <div class="bg-pattern bg-light repeat-img"
                style="background-image: url(assets/images/blog-pattern-bg.png);">
                <section class="blog-sec section" id="blog">
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sec-title text-center mb-5">
                                        <p class="sec-sub-title mb-3">Activités</p>
                                        <h2 class="h2-title">Nos activité recente</span></h2>
                                        <div class="sec-title-shape mb-4">
                                            <img src="assets/images/title-shape.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <?php foreach ($activiterecentes = getRecenteActivites() as $activite) { ?>

                                <div class="col-lg-4">
                                    <div class="blog-box">
                                        <div class="blog-img back-img"
                                            style="background-image: url(assets/images/activities_photos/<?= $activite->getPhoto1() ?>);"></div>
                                        <div class="blog-text">
                                            <p class="blog-date"><?= $activite->getDateActivite() ?></p>
                                            <a href="#" class="h4-title"><?= $activite->getTitreActivite() ?></a>
                                            <p><?= $activite->getDescriptionActivite() ?>
                                            </p>
                                            <a class="sec-btn" href="views/description.php?id=<?= $activite->getIdActivite() ?>">Voir Activite</a>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </section>

                <section class="newsletter-sec section pt-0">
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 m-auto">
                                    <div class="newsletter-box text-center back-img white-text"
                                        style="background-image: url(assets/images/news.jpg);">
                                        <div class="bg-overlay dark-overlay"></div>
                                        <div class="sec-wp">
                                            <div class="newsletter-box-text">
                                                <h2 class="h2-title">Souscrire a notre newsletter</h2>
                                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit ad
                                                    veritatis.</p>
                                            </div>
                                            <form action="#" class="newsletter-form">
                                                <input type="email" class="form-input"
                                                    placeholder="Enter votre email" required>
                                                <button type="submit" class="sec-btn primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- footer starts  -->
            <footer class="site-footer" id="contact">
                <div class="top-footer section">
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="footer-info">
                                        <div class="footer-logo">
                                            <a href="index.html">
                                                <img src="logo.png" alt="">
                                            </a>
                                        </div>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia, tenetur.
                                        </p>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-github-alt"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="footer-flex-box">
                                        <div class="footer-table-info">
                                            <h3 class="h3-title">open hours</h3>
                                            <ul>
                                                <li><i class="uil uil-clock"></i> Mon-Thurs : 9am - 22pm</li>
                                                <li><i class="uil uil-clock"></i> Fri-Sun : 11am - 22pm</li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu food-nav-menu">
                                            <h3 class="h3-title">Links</h3>
                                            <ul class="column-2">
                                                <li>
                                                    <a href="#home" class="footer-active-menu">Home</a>
                                                </li>
                                                <li><a href="#about">About</a></li>
                                                <li><a href="#menu">Menu</a></li>
                                                <li><a href="#gallery">Gallery</a></li>
                                                <li><a href="#blog">Blog</a></li>
                                                <li><a href="#contact">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu">
                                            <h3 class="h3-title">Company</h3>
                                            <ul>
                                                <li><a href="#">Terms & Conditions</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Cookie Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="copyright-text">
                                    <p>Copyright &copy; 2024 <span class="name">LoisirApp.</span>All Rights Reserved.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="scrolltop"><i class="uil uil-angle-up"></i></button>
                    </div>
                </div>
            </footer>



        </div>
    </div>





    <!-- jquery  -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- New bootstrap  -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

    <!-- fontawesome all.js  -->
    <script src="assets/js/all.js"></script>

    <!-- fontawesome  -->
    <script src="assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/rellax.min.js"></script> -->
    <!-- <script src="assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="assets/js/smooth-scroll.js"></script>

    <!-- custom js  -->
    <script src="assets/js/main.js"></script>

</body>

</html>