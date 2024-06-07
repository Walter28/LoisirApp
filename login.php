<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoisirApp</title>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- font-awesome css  -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- login css file -->
    <link rel="stylesheet" href="assets/css/login.css">
    
</head>

<body>

     <!--Success alert-->
    <?php if(isset($_GET['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade-down show m-auto">
            <strong>Félicition !</strong><br>
            Compe Cree Avec Success
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div><br>
    <?php } ?>
    <?php if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade-down show m-auto">
            Une erreur a ete survenu lors de la creation du compte
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div><br>
    <?php } ?>
    
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="controllers/userEnregistrementTraitement.php" method="post" enctype="multipart/form-data">
                <h1>Cree Un Compte</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fa fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin-in"></i></a>
                </div>
                <span>ou utilise ton email pour l'enregistrement</span> -->
                <input type="text" name="nom_utilisateur" placeholder="Nom" required />
                <input type="text" name="prenom_utilisateur" placeholder="Prenom" required />
                <input type="email" name="email_utilisateur" placeholder="Email" required />
                <input type="text" name="phone_utilisateur" placeholder="Ex. +243 985856481" required />
                <input type="file" name="profil_utilisateur" id="" required>
                <input type="password" name="pwd_utilisateur" placeholder="Mot de passe" required />
                <button type="submit">Cree</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="controllers/verificationLogin.php" method="post">
                <h1>Se Connecter</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>ou utilise ton compte</span>
                <input type="email" name="email_utilisateur" placeholder="Email" />
                <input type="password" name="pwd_utilisateur" placeholder="Mot de passe" />
                <a href="#">Mot de passe oublie ?</a>
                <button type="submit">Se Connecter</button>
                <!-- <input type="submit" value="Se Connecter"> -->
                <?php if(isset($_GET['erreur']) && $_GET['erreur']==1) { ?>
                    <p style="color:red;">User or Password Incorrect</p>
                <?php } ?>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenu !</h1>
                    <p>Pour profiter pleinement de notre appli connecte toi avec tes identifiants</p>
                    <button class="ghost" id="signIn">Se Connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bonjour, Amis!</h1>
                    <p>Entre tes informations personnel et commencer votre sejour avec nous</p>
                    <button class="ghost" id="signUp">Cree Un Compte</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fas fa-heart"></i> by
            <a target="_blank" href="#">Bejamin mugangu</a>
        </p>
    </footer>

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
    <!-- login js  -->
    <script src="assets/js/login.js"></script>

</body>

</html>