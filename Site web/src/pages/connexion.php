<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleMain.css" />
    <link rel="stylesheet" href="../css/styleMenu.css">
    <link rel="stylesheet" href="./css/styleAsset.css">
    <link rel="stylesheet" href="../css/styleConnexion.css" />
    <title>Stephi Place-Connexion</title>
</head>

<body>
    <header>
        <div class="contenu-header">
            <div class="header-img">
                <a href="../index.php"><img src="../img/Logo100x100sans_fond.png" alt="StephiPlace_logo"></a>
            </div>
            <div class="body">
                <div class="contenu contenu-btn-menu">
                    <div>
                        <a href="../pages/inscription.php">S'inscrire</a>
                    </div>
                </div>
                <div class="contenu-menu">
                    <nav>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Biens immobiliers</a></li>
                            <li><a href="../pages/agence.php">Agence</a></li>
                            <!-- <li></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <form action="../php/traitement.php" method="POST">
        <label for="user">Nom d'utilisateur: </label><input type="text" name="user" id="user"><br>
        <label for="password">mot de passe: </label><input type="password" name="password" id="password"><br>
        <input type="submit" value="Se connecter" name="connexion"><br>
    </form>
    <footer>
        <div class="contenu">
            <div class="contenu-footer copyright">
                <p class="copyright">©all right reserved</p>
            </div>
            <div class="contenu-btn">
                <a href="" class="btn">Nous contacter</a>
                <a href="" class="btn">Réseaux</a>
            </div>
        </div>
    </footer>
</body>

</html>