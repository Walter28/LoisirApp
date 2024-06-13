<?php
    session_start();

    unset($_SESSION['fac']);

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
    <link rel="stylesheet" href="../assets/css/style_create.css">
    <!-- font-awesome css  -->
    <link rel="stylesheet" href="../assets/css/all.css">

    <!-- new bootstrap -->
    <!-- i<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <scrpt src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <style>
        #preview1 {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            display: none; /* Masque par defaut */
            height: 450px;
            width: 500px;
        }

        #preview2 {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            display: none; /* Masque par defaut */
            height: 350px;
            width: 400px;
        }
    </style>
</head>

<body class="body-fixed">
    <?php include_once("../controllers/getListeUtilisateurs.php") ?>
    <?php
        if(!isset($_SESSION['userid'])) {
            header("Location:../index.php");
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
                                            <a href="profile.php" class="dropdown-item">
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

            <section class="main-banner" id="home" style="background-image: url(../assets/images/menu-bg.png);"
                class="our-menu section bg-light repeat-img" id="menu">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Compte</p>
                                    <h2 class="h2-title">Mis a jour du compte</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="../assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Error alert-->
                        <?php if(isset($_GET['updt_msg'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade-down show m-auto">
                                <strong>Error !!!</strong><br>
                                La mise a jour compte ne se pas terminer avec succé
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div><br>
                        <?php } ?>

                        
                    
                        <div class="createact-form">
                            <?php $utilisateur = getUtilisateurById($_SESSION['userid']) ?>
                            <form action="../controllers/updateUtilisateur.php" method="post" enctype="multipart/form-data">
                                <!-- By default this need to be full filled -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="nom_utilisateur" class="mb-3 mt-"><h3>Nom</h3></label>
                                        <input type="text" name="nom_utilisateur" value="<?= $utilisateur->getNomUtilisateur() ?>" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="prenom_utilisateur" class="mb-3 mt-"><h3>Prenom</h3></label>
                                        <input type="text" name="prenom_utilisateur" value="<?= $utilisateur->getPrenomUtilisateur() ?>" required>
                                    </div>
                                </div>
                                <div >
                                    <label for="profil_utilisateur" class="mb-3 mt-4"><h3>Profile</h3></label>
                                    <input type="file"  name="profil_utilisateur" id="profil_utilisateur" onchange="previewImage(event)">
                                    <input type="hidden"  name="profil_utilisateur_old" value="<?= $utilisateur->getProfilUtilisateur() ?>">
                                    <img src="../assets/images/profiles_users/<?= $utilisateur->getProfilUtilisateur() ?>" width="200" height="auto" id="preview" class="img-thumbnail" alt="" srcset="">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="email_utilisateur" class="mb-3 mt-4"><h3>Email</h3></label>
                                        <input type="email"  name="email_utilisateur" value="<?= $utilisateur->getEmailUtilisateur() ?>" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="phone_utilisateur" class="mb-3 mt-4"><h3>Telephone</h3></label>
                                        <input type="text"  name="phone_utilisateur" value="<?= $utilisateur->getPhoneUtilisateur() ?>" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="pwd_utilisateur" class="mb-3 mt-4"><h3>Nouveau Mot de passe</h3></label>
                                    <input type="password" name="pwd_utilisateur" placeholder="Leave blank to keep old password ...">
                                    <input type="hidden" name="pwd_utilisateur_old" value="<?= $utilisateur->getPwdUtilisateur() ?>">
                                </div>
                                

                                <!-- And this need to be filled by the proprio user -->
                                <input type="hidden" name="additional" value="True">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="link_fb" class="mb-3 mt-4"><h3>Lien profile Facebook</h3></label>
                                        <input type="text"  name="link_fb" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="link_insta" class="mb-3 mt-4"><h3>Lien profile Instagram</h3></label>
                                        <input type="text"  name="link_insta" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="link_x" class="mb-3 mt-4"><h3>Lien profile X</h3></label>
                                        <input type="text"  name="link_x" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="link_yout" class="mb-3 mt-4"><h3>Lien profile Youtube</h3></label>
                                        <input type="text"  name="link_yout" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="job_utilisateur" class="mb-3 mt-4"><h3>Job</h3></label>
                                        <input type="text"  name="job_utilisateur" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="year_xperia_utilisateur" class="mb-3 mt-4"><h3>Annee d'experience</h3></label>
                                        <input type="text"  name="year_xperia_utilisateur" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="address_utilisateur" class="mb-3 mt-4"><h3>Adresse</h3></label>
                                    <input type="text"  name="address_utilisateur" required>
                                </div>
                                <div>
                                    <label for="description_utilisateur" class="mb-3 mt-4"><h3>Description</h3></label>
                                    <textarea name="description_utilisateur" id="" cols="30" rows="10" placeholder="Ecrit quelques choses qui te decrit le mieu..." required></textarea>
                                </div>
                                
                                
                                <input type="submit" name="submit" value="Mis a jour" class="send-btn" >
                            </form>
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
                                            <a href="../index.php">
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
        function previewImage(event) {
            const fileInput = event.target;
            const file = event.target.files[0];
            if(file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById("preview");
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert("Veillez selectioner un fichier image.");
                fileInput.value = ""; // reinitialiser le champ input
                const preview = document.getElementById("preview");
                preview.style.display = 'none'; //cache l'image de previsualisation
            }
        }


        document.addEventListener('DOMContentLoaded', function() {
            const fileInput1 = document.getElementById('profil_utilisateur');
            if (fileInput1.files.length > 0) {
                previewImage({target: fileInput1});
            }

        });
        document.getElementById('profil_utilisateur').addEventListener('change', previewImage)


    </script>

</body>

</html>