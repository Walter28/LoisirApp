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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- font-awesome css  -->
    <link rel="stylesheet" href="../assets/css/all.css">

    <!-- Description data -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/description.css">

    <!-- new bootstrap -->
    <!-- i<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <scrpt src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    
</head>

<body class="body-fixed">
    <?php include("../controllers/getActiviteById.php") ?>
    <?php include("../controllers/getlisteCommentaires.php") ?>

    <!-- start of header  -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="../index.php">
                            <img src="../logo.png" width="160" height="36" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="../index.php">Acceuil</a></li>
                                <li><a href="../index.php#menu">Activités</a></li>
                                <!-- <li><a href="#gallery"></a></li> -->
                                <li><a href="../index.php#blog">Recent</a></li>
                                <?php if(isset($_SESSION['userid'])) { ?>
                                    <li><a href="../views/create_activity.php">Cree Activité</a></li>
                                <?php } ?>
                                <li><a href="../views/terms-cond.php">Terms & Conditions </a></li>
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
                                            <a href="../views/profile.php" class="dropdown-item">
                                                <i class="mdi mdi-account-circle me-1"></i>
                                                <span>Mon Compte</span>
                                            </a>
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
                                    <a href="../login.php" style="margin-left:20px">Login</a>
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
            

            <section class="section-service main-banner">

                <?php $activite = getActiviteById($_GET['id']) ?>
                <div class="container flex">
                    <div class="left">
                      <div class="main_image">
                        <img src="../assets/images/activities_photos/<?= $activite->getAfficheActivite() ?>" class="slide">
                      </div>
                      <div class="option flex">
                        <img src="../assets/images/activities_photos/<?= $activite->getAfficheActivite() ?>" onclick="img('../assets/images/activities_photos/<?= $activite->getAfficheActivite() ?>')">
                        <img src="../assets/images/activities_photos/<?= $activite->getPhoto1() ?>" onclick="img('../assets/images/activities_photos/<?= $activite->getPhoto1() ?>')">
                        <img src="../assets/images/activities_photos/<?= $activite->getPhoto2() ?>" onclick="img('../assets/images/activities_photos/<?= $activite->getPhoto2() ?>')">
                        <img src="../assets/images/activities_photos/<?= $activite->getPhoto3() ?>" onclick="img('../assets/images/activities_photos/<?= $activite->getPhoto3() ?>')">
                      </div>
                    </div>
                    <div class="right">

                      <!--Success alert-->
                        <?php if(isset($_SESSION['reserv']) && $_SESSION['reserv'] == 200) { ?>
                            <div class="alert alert-success alert-dismissible fade-down show m-auto">
                                <strong>Félicition !</strong><br>
                                Votre reservation a effectuée avec succé
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div><br>
                            <?php unset($_SESSION['reserv']); ?>
                        <?php } ?>
                        
                        <!--Error alert-->
                        <?php if(isset($_SESSION['reserv']) && $_SESSION['reserv'] == 101) { ?>
                            <div class="alert alert-danger alert-dismissible fade-down show m-auto">
                                <strong>Erreur !!!</strong><br>
                                Il ya eu un probleme lors de la reservation
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div><br>
                            <?php unset($_SESSION['reserv']); ?>
                        <?php } ?> 

                      <h1 class="activity-name"><?= $activite->getTitreActivite() ?></h1>
                      <h4>Description</h4>
                      <p>
                        <?= $activite->getDescriptionActivite() ?>
                      </p>
                      
                      <div class="activity-infos mb-5">
                        <!-- <div class="activity-infos-key">

                        </div>
                        <div class="activity-infos-value">

                        </div> -->
                        <table class="activity-detail w-100 mb-5">
                            <tr>
                                <th>Prix</th>
                                <td> <?= $activite->getPrixActivite() ?></td>
                            </tr>
                            <tr>
                                <th>Bonus</th>
                                <td> -</td>
                            </tr>
                            <tr>
                                <th>Lieu</th>
                                <td> <?= $activite->getLieuActivite() ?></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td> <?= $activite->getDateActivite() ?></td>
                            </tr>
                        </table>

                        <h4>Partager</h4>
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
                      <form action="../controllers/makeReservation.php" method="post">
                        <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['userid'] ?>">
                        <input type="hidden" name="id_activite" value="<?= $_GET['id'] ?>">
                        <button type="submit">Reserver</button>
                      </form>
                    </div>
                </div>

                <div class="container w-" >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sec-title text-center mb-5">
                                        <p class="sec-sub-title mb-3">Ce qu'ils disent</p>
                                        <h4 class="h2-title">Commentaires</h4>
                                        <div class="sec-title-shape mb-4">
                                            <img src="../assets/images/title-shape.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <?php foreach ($commentaires = getListeCommentaires() as $commentaire) { ?>
                                <?php $commentateur = getInfoCommentateur($commentaire->getIdUtilisateur()) ?>
                                <div class="col-sm-6">
                                    <div class="testimonials-box-cmt">
                                        <div class="testimonial-box-top">
                                            <div class="testimonials-box-img back-img"
                                                style="background-image: url(../assets/images/profiles_users/<?= $commentateur->getProfilUtilisateur() ?>);">
                                            </div>
                                            <div class="star-rating-wp">
                                                <div class="star-rating">
                                                    <?php
                                                        $percent = ($commentaire->getNote() * 100) / 5
                                                    ?>
                                                    <span class="star-rating__fill" style="width:<?=$percent?>%"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="testimonials-box-text">
                                            <h3 class="h3-title">
                                                <?= $commentateur->getNomUtilisateur() ?> <?= $commentateur->getPrenomUtilisateur() ?>
                                            </h3>
                                            <p>
                                                <?= $commentaire->getContenu() ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 px-5">
                                            <div class="sec-title text-center mb-5">
                                                <p class="sec-sub-title mb-3">AVis</p>
                                                <h4 class="h2-title">Ajouter un commentaire</h4>
                                                <div class="sec-title-shape mb-4">
                                                    <!-- <img src="../assets/images/title-shape.svg" alt=""> -->
                                                </div>
                                                <!--Success alert-->
                                                <?php if(isset($_SESSION['comment']) && $_SESSION['comment'] == 200) { ?>
                                                    <div class="alert alert-success alert-dismissible fade-down show m-auto">
                                                        <strong>Félicition !</strong><br>
                                                        Votre commentaire a effectuée avec succé
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    </div><br>
                                                    <?php unset($_SESSION['comment']); ?>
                                                <?php } ?>
                                                
                                                <!--Error alert-->
                                                <?php if(isset($_SESSION['comment']) && $_SESSION['comment'] == 101) { ?>
                                                    <div class="alert alert-danger alert-dismissible fade-down show m-auto">
                                                        <strong>Erreur !!!</strong><br>
                                                        Votre commentaire ne se pas effectué
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    </div><br>
                                                    <?php unset($_SESSION['comment']); ?>
                                                <?php } ?> 
                                            </div>

                                            <form action="../controllers/enregistrerCommentaire.php" method="post" class="votre-avis">
                                                <div class="mb-4 textarea">
                                                    <h5 class="mb-4">Votre commentaire</h5>
                                                    <textarea class="form-input form-control"
                                                                name="contenu"
                                                                id="">
                                                    </textarea>
                                                </div>
                                                <div class="mb-5">
                                                    <h5>Note</h5>
                                                    <select name="note" id="" class="form-input">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['userid'] ?>">
                                                <input type="hidden" name="id_activite" value="<?= $_GET['id'] ?>">
                                                <div class="bouton">
                                                    <!-- <span>-</span>
                                                    <label>1</label>
                                                    <span>+</span> -->
                                                    <input type="submit" class="form-input" value="Commenter">
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>

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
                                    <p>Copyright &copy; 2021 <span class="name">TechieCoder.</span>All Rights Reserved.
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
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- New bootstrap  -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

    <!-- fontawesome all.js  -->
    <script src="../assets/js/all.js"></script>

    <!-- fontawesome  -->
    <script src="../assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="../assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="../assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="../assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="../assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="../assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="../assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="../assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="../assets/js/rellax.min.js"></script> -->
    <!-- <script src="../assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="../assets/js/smooth-scroll.js"></script>

    <!-- custom js  -->
    <script src="../assets/js/main.js"></script>
    <script>
        function img(anything) {
          document.querySelector('.slide').src = anything;
        }
    
        function change(change) {
          const line = document.querySelector('.home');
          line.style.background = change;
        }
    </script>

</body>

</html>