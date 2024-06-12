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

        #preview3 {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            display: none; /* Masque par defaut */
            height: 350px;
            width: 400px;
        }

        #preview4 {
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
                                    <p class="sec-sub-title mb-3">Activités</p>
                                    <h2 class="h2-title">Cree une activité</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="../assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Success alert-->
                        <?php if(isset($_GET['success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade-down show m-auto">
                                <strong>Félicition !</strong><br>
                                Ajout effectuée avec succé
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div><br>
                        <?php } ?>

                        
                    
                        <div class="createact-form">
                            <form action="../controllers/enregistrerActivite.php" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="" class="mb-3"><h3>Genre</h3></label>
                                    <div class="row">
                                        <div class="col-lg-12 m-auto">
                                            <div class="menu-tab text-cente">
                                                <ul class="filters">
                                                    <div class="filter-active"></div>
                                                    <!-- <li class="filter" data-filter=".tout, .sport, .religion, .chill, .culture, .tourisme">
                                                        <img src="../assets/images/trotti.png" alt="">
                                                        Tout
                                                    </li> -->
                                                    <li class="filter" data-filter=".sport">
                                                        
                                                        <label for="radio1" class="d-flex">
                                                            <img src="../assets/images/sport.png" alt="">
                                                            Sport
                                                        </label>
                                                        <input type="radio" name="domaine_activite" id="radio1" value="sport">
                                                    </li>
                                                    <li class="filter" data-filter=".religion">
                                                        
                                                        <label for="radio2" class="d-flex">
                                                            <img src="../assets/images/religion.png" alt="">
                                                            Religion
                                                        </label>
                                                        <input type="radio" name="domaine_activite" id="radio2" value="religion">
                                                    </li>
                                                    <li class="filter" data-filter=".chill">
                                                        
                                                        <label for="radio3" class="d-flex">
                                                            
                                                            <img src="../assets/images/chill.png" alt="">
                                                            Chill
                                                        </label>
                                                        <input type="radio" name="domaine_activite" id="radio3" value="chill">
                                                    </li>
                                                    <li class="filter" data-filter=".culture">
                                                        
                                                        <label for="radio4" class="d-flex">
                                                            <img src="../assets/images/tourisme.png" alt="">
                                                            Tourisme
                                                        </label>
                                                        <input type="radio" name="domaine_activite" id="radio4" value="tourisme">
                                                    </li>
                                                    <li class="filter" data-filter=".tourisme">
                                                        
                                                        <label for="radio5" class="d-flex">
                                                            <img src="../assets/images/menu-4.png" alt="">
                                                            Culture
                                                        </label>
                                                        <input type="radio" name="domaine_activite" id="radio5" value="culture">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="titre_activite" class="mb-3 mt-4"><h3>Titre</h3></label>
                                    <input type="text" placeholder="Titre Activité ..." name="titre_activite" required>
                                </div>
                                <div>
                                    <label for="lieu_activite" class="mb-3 mt-4"><h3>Lieu</h3></label>
                                    <input type="text" placeholder="Lieu ..." name="lieu_activite" required>
                                </div>
                                <div>
                                    <label for="date_activite" class="mb-3 mt-4"><h3>Date</h3></label>
                                    <input type="date"  name="date_activite" required>
                                </div>
                                <div>
                                    <label for="heure" class="mb-3 mt-4"><h3>Heure</h3></label>
                                    <input type="time"  name="heure" required>
                                </div>
                                <div>
                                    <label for="prix_activite" class="mb-3 mt-4"><h3>Prix</h3></label>
                                    <input type="text"  name="prix_activite" required>
                                </div>
                                <div>
                                    <label for="affiche_activite" class="mb-3 mt-4"><h3>Affiche</h3></label>
                                    <input type="file" accept="image/*" id="affiche_activite"  name="affiche_activite" onchange="previewImage1(event)" required>
                                    <img id="preview1" alt="">
                                </div>
                                <div>
                                    <label for="photo1" class="mb-3 mt-4"><h3>Photo1</h3></label>
                                    <input type="file"  name="photo1" id="photo1" onchange="previewImage2(event)" required>
                                    <img id="preview2" alt="">
                                </div>
                                <div>
                                    <label for="photo2" class="mb-3 mt-4"><h3>Photo2</h3></label>
                                    <input type="file"  name="photo2" id="photo2" onchange="previewImage3(event)" required>
                                    <img id="preview3" alt="">
                                </div>
                                <div>
                                    <label for="photo3" class="mb-3 mt-4"><h3>Photo3</h3></label>
                                    <input type="file"  name="photo3" id="photo3" onchange="previewImage4(event)" required>
                                    <img id="preview4" alt="">
                                </div>
                                <div>
                                    <label for="description_activite" class="mb-3 mt-4"><h3>Description</h3></label>
                                    <textarea name="description_activite" id="" cols="30" rows="10" placeholder="Write Message Here..." required></textarea>
                                </div>
                                
                                
                                <input type="submit" name="submit" value="Ajouter Activité" class="send-btn" >
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
        function previewImage1(event) {
            const fileInput = event.target;
            const file = event.target.files[0];
            if(file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview1 = document.getElementById("preview1");
                    preview1.src = e.target.result;
                    preview1.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert("Veillez selectioner un fichier image.");
                fileInput.value = ""; // reinitialiser le champ input
                const preview1 = document.getElementById("preview1");
                preview1.style.display = 'none'; //cache l'image de previsualisation
            }
        }

        function previewImage2(event) {
            const fileInput = event.target;
            const file = event.target.files[0];
            if(file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview1 = document.getElementById("preview2");
                    preview2.src = e.target.result;
                    preview2.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert("Veillez selectinoner un fichier image.");
                fileInput.value = ""; // reinitialiser le champ input
                const preview2 = document.getElementById("preview2");
                preview2.style.display = 'none'; //cache l'image de previsualisation
            }
        }

        function previewImage3(event) {
            const fileInput = event.target;
            const file = event.target.files[0];
            if(file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview3 = document.getElementById("preview3");
                    preview3.src = e.target.result;
                    preview3.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert("Veillez selectinoner un fichier image.");
                fileInput.value = ""; // reinitialiser le champ input
                const preview = document.getElementById("preview3");
                preview3.style.display = 'none'; //cache l'image de previsualisation
            }
        }

        function previewImage4(event) {
            const fileInput = event.target;
            const file = event.target.files[0];
            if(file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview1 = document.getElementById("preview4");
                    preview4.src = e.target.result;
                    preview4.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert("Veillez selectinoner un fichier image.");
                fileInput.value = ""; // reinitialiser le champ input
                const preview4 = document.getElementById("preview4");
                preview4.style.display = 'none'; //cache l'image de previsualisation
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const fileInput1 = document.getElementById('affiche_activite');
            if (fileInput1.files.length > 0) {
                previewImage1({target: fileInput1});
            }

            const fileInput2 = document.getElementById('photo1');
            if (fileInput2.files.length > 0) {
                previewImage2({target: fileInput2});
            }

            const fileInput3 = document.getElementById('photo2');
            if (fileInput3.files.length > 0) {
                previewImage3({target: fileInput3});
            }

            const fileInput4 = document.getElementById('photo3');
            if (fileInput4.files.length > 0) {
                previewImage4({target: fileInput4});
            }

        });
        document.getElementById('affiche_activite').addEventListener('change', previewImage1)
        document.getElementById('photo1').addEventListener('change', previewImage2)
        document.getElementById('photo2').addEventListener('change', previewImage3)
        document.getElementById('photo3').addEventListener('change', previewImage4)


    </script>

</body>

</html>