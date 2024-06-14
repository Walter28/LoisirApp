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

    <!-- new bootstrap -->
    <!-- i<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <scrpt src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Profile required css -->

    <link rel="stylesheet" type="text/css" href="../assets/css/profile.css">

    <!-- box icons link -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- remix icons link -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
    />

    <!-- goole fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2? family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel=" stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
</head>

<body class="body-fixed">
    
    <?php include_once("../controllers/getListeUtilisateurs.php") ?>
    <?php include_once("../controllers/getAdditional.php") ?>
    <?php include_once("../controllers/getAllActivites.php") ?>
    <?php
        if(!isset($_SESSION['userid'])) {
            header("Location:../index.php");
        }
    ?>
    <?php
        $additional = getAdditional($_SESSION['userid']);
        if ($additional == 0 or $additional =="") {
            header("Location:../views/update_account.php");
        }
    ?>

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

            <!--Success alert-->
            <?php if(isset($_GET['updt_msg'])) { ?>
                <div class="alert alert-success alert-dismissible fade-down show m-auto">
                    <strong>Error !!!</strong><br>
                    La mise a jour compte se terminer avec succé
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div><br>
            <?php } ?>


            <?php $utilisateur = getUtilisateurById($_SESSION['userid']) ?>
            <section class="hero main-banne mt-5" id="home">
                <div class="main-content" data-aos="fade-in">
                    <h4>Hey, salut</h4>
                    <h1>Je suis <span><?= $utilisateur->getNomUtilisateur().' '.$utilisateur->getPrenomUtilisateur()?></span></h1>
                    <p>
                        <?= $utilisateur->getDescriptionUtilisateur() ?>
                    </p>
                    <div class="social">
                        <a href="<?= $utilisateur->getLinkFb() ?>"><i class="ri-facebook-fill"></i></a>
                        <a href="<?= $utilisateur->getLinkInsta() ?>"><i class="ri-instagram-fill"></i></a>
                        <a href="<?= $utilisateur->getLinkX() ?>"><i class="ri-twitter-fill"></i></a>
                        <a href="<?= $utilisateur->getLinkYout() ?>"><i class="ri-youtube-fill"></i></a>
                    </div>
        
                    <!-- <div class="main-btn">
                        <a href="#contact" class="btn">Me contacter</a>
                        <a href="#Services" class="btn btn2">Voir activite</a>
                        
                    </div> -->
                </div>
            </section>
        
            <!-- about -->
        
        
            <section class="about row" id="about">
                <div class="about-img col-lg-6" data-aos="zoom-in-down">
                    <img src="../assets/images/profiles_users/<?= $utilisateur->getProfilUtilisateur() ?>" alt="">
                </div>
            
            
                <div class="about-text col-lg-6" data-aos="zoom-in-up">
                    <h2>Je suis <span><?= $utilisateur->getJobUtilisateur() ?></span> <br>
                    </h2>
                    <div class="exp-area">
                        <p class="exp">
                            Experience:
                            <span><?= $utilisateur->getYearXperiaUtilisateur() ?></span>
                        </p>
            
                        <p class="exp">
                            Specialty:
                            <span> - </span>
                        </p>
            
                        <p class="exp">
                            Addresse:
                            <span><?= $utilisateur->getAddressUtilisateur() ?></span>
                        </p>
            
                        <p class="exp">
                            Email:
                            <span><?= $utilisateur->getEmailUtilisateur() ?></span>
                        </p>
            
                        <p class="exp">
                            Phone
                            <span><?= $utilisateur->getPhoneUtilisateur() ?></span>
                        </p>
            
                        <p class="exp">
                            Freelance
                            <span>Avalaible</span>
                        </p>
            
                        <div>
                            <!-- <a href="#" class="btn">View All Projects</a> -->
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- Services -->
        
            <section class="Services" id="Services">
                <div class="center-text" data-aos="fade-down">
                    <h2>My <span>Services</span></h2>
                </div>
        
                <div class="services-content" data-aos="zoom-in-up">

                    <!-- <div class="box">
                        <img src="../assets/images/icone3.jpg" class="icone" alt="">
                        <h3>UI/UX Design</h3>
                        <p>Lorem ipsum dolorsit amet consectetur adipisicing elit. Aperiam doloribus
                             saepe error amet excepturi dolorum atque adipisci,
                             maiores animi consequuntur veniam eveniet tempore is
                             te ducimus minus laboriosam sit aliquam. Voluptas.</p>
                             <a href="#">
                                VOIR L'ACTIVITE
                                <i class="ri-arrow-right-line"></i>
                             </a>
                    </div> -->

                    <div class="row">

                        <?php foreach ($activites = getListeActivites() as $activite) { ?>

                        <div class="col-lg-4">
                            <div class="blog-box">
                                <div class="blog-img back-img"
                                    style="background-image: url(../assets/images/activities_photos/<?= $activite->getPhoto1() ?>);"></div>
                                <div class="blog-text">
                                    <p class="blog-date"><?= $activite->getDateActivite() ?></p>
                                    <a href="#" class="h4-title"><?= $activite->getTitreActivite() ?></a>
                                    <p><?= $activite->getDescriptionActivite() ?>
                                    </p>
                                    <a class="sec-btn-profil" href="views/description.php?id=<?= $activite->getIdActivite() ?>">Voir Activite</a>
                                    <a class="sec-btn-profil delete bg-danger" href="views/description.php?id=<?= $activite->getIdActivite() ?>">Effacer Activite</a>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>

                </div>
            </section>
        
            <!-- portofolio -->
            <!-- <section class="portofolio" id="portofolio">
                <div class="center-text"data-aos="fade-down">
                    <h2>My <span>Services</span></h2>
                </div>
        
                <div class="Portofolio-content" data-aos="zoom-in-up">
                    <div class="row">
                        <img src="../assets/images/serena1.jpg" alt="">
                        <div class="main-row">
                            <div class="row-text">
                                <h5>Website Design</h5>
                            </div>
                            <div class="row-icon">
                                <i class="ri-github-fill"></i>
                            </div>
                        </div>
                        <h4>Website Development For Dark X</h4>
                    </div>
        
                    <div class="row">
                        <img src="../assets/images/serena1.jpg" alt="">
                        <div class="main-row">
                            <div class="row-text">
                                <h5>Website Design</h5>
                            </div>
                            <div class="row-icon">
                                <i class="ri-github-fill"></i>
                            </div>
                        </div>
                        <h4>Website Development For Dark X</h4>
                    </div>
        
                    <div class="row">
                        <img src="../assets/images/serena1.jpg" alt="">
                        <div class="main-row">
                            <div class="row-text">
                                <h5>Website Design</h5>
                            </div>
                            <div class="row-icon">
                                <i class="ri-github-fill"></i>
                            </div>
                        </div>
                        <h4>Website Development For Dark X</h4>
                    </div>
        
                    <div class="row">
                        <img src="../assets/images/serena1.jpg" alt="">
                        <div class="main-row">
                            <div class="row-text">
                                <h5>Website Design</h5>
                            </div>
                            <div class="row-icon">
                                <i class="ri-github-fill"></i>
                            </div>
                        </div>
                        <h4>Website Development For Dark X</h4>
                    </div>
        
                     <div class="row">
                        <img src="../assets/images/serena1.jpg" alt="">
                        <div class="main-row">
                            <div class="row-text">
                                <h5>Website Design</h5>
                            </div>
                            <div class="row-icon">
                                <i class="ri-github-fill"></i>
                            </div>
                        </div>
                        <h4>Website Development For Dark X</h4>
                    </div>
                </div>
        
            </section> -->
        
            <!-- contacts -->
        
            <section class="contact" id="contact">
                <div class="center-text" data-aos="fade-down">
                    <h2 class="mb-4">Contact <span>Admin</span></h2>
                </div>
        
                <div class="contact-form">
                    <form action="">
                        <input type="text" placeholder="Your name" required>
                        <input type="email" placeholder="Email Address" required>
                    
                    <textarea name="" id="" cols="30" rows="10" placeholder="Write Message Here..." required></textarea>
                    <input type="submit" name="" value="Send Message" class="send-btn" >
                    </form>
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
                                            <a href="../index.html">
                                                <img src="../logo.png" alt="">
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
     <!-- js link -->
     <script src="../assets/js/profile.js"></script>

     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>
       AOS.init({
         offset: 300,
         duration: 1400,
       });
     </script>
</body>

</html>