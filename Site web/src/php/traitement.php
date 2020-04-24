<?php 
session_start();
if (empty($_SESSION['userName']) || $_SESSION['userName'] === null){
    $btn = <<<html
    <div>
    <a href="./pages/inscription.php">S'inscrire</a>
    </div>
    <div>
        <a href="./pages/connexion.php">Se connecter</a>
    </div>
    html;
}elseif($_SESSION['userName']){
    $name = $_SESSION['userName'];
    $btn = <<< html
    <div>
        <p>Bonjour $name</p>
    </div>
    html;
}
$utilisateur = 'root';
$mdp = '';

try{
    $cnx = new PDO('mysql:host=localhost;dbname=stephiplace_data;port=3308',$utilisateur,$mdp);
}catch(Exception $e) {
    print($e->getMessage());
    exit;
}

if(!isset($_POST['iscription']) || empty($_POST['iscription'])){
}elseif ($_POST['iscription']){
    $user = $_POST['identifiant'];
    $mdp = $_POST['mdp'];
    $mdpConfirm = $_POST['confirm_mdp'];
    $prenom = $_POST['nom'];
    $nom = $_POST['prenom'];
    $mail = $_POST['email'];
    $age = $_POST['age'];
    $civilite = $_POST['civilite'];
    if($mdp === $mdpConfirm && !empty($_POST['identifiant']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['condition']) || $_POST['condition'] === 'on'){
        $password = password_hash($mdp,PASSWORD_DEFAULT);
        $rqt = "INSERT INTO users 
        (user_name,user_firstName,user_mail,user_pseudo,user_password,user_age,user_genre)
        VALUE (:userName, :firstName, :mail, :pseudo, :password, :age, :genre)";
        $stmt = $cnx->prepare($rqt);
        $stmt->bindParam(':userName',$nom,PDO::PARAM_STR);
        $stmt->bindParam(':firstName',$prenom,PDO::PARAM_STR);
        $stmt->bindParam(':mail',$mail,PDO::PARAM_STR);
        $stmt->bindParam(':pseudo',$user,PDO::PARAM_STR);
        $stmt->bindParam(':password',$password,PDO::PARAM_STR);
        $stmt->bindParam(':age',$age,PDO::PARAM_INT);
        $stmt->bindParam(':genre',$civilite,PDO::PARAM_STR);
        $stmt->execute();
        echo "<p>vos données on été enregistrer</p>";
        header('Refresh: 2, url=../index.php');
    }else{
        echo "<p>Veuillez respecter les conditions</p>";
        header("HTTP/1.0 404 Not Found");
    }
}

if (!isset($_POST['connexion']) || empty($_POST['connexion'])){

}elseif (isset($_POST['connexion'])) {
    $utilisateur = $_POST['user'];
    $passwd = $_POST['password'];
    $rqt = "SELECT user_pseudo, user_password FROM users WHERE user_pseudo = :utilisateur";
    $stmt = $cnx->prepare($rqt);
    $stmt->bindParam(':utilisateur',$utilisateur, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($passwd, $data['user_password'])){
        $_SESSION['userName'] = $data['user_pseudo'];
        echo "<p>Vous etes bien connecter ".$_SESSION['userName']."</p>";
        header('Refresh: 3; url=../index.php');
    }else{
        echo "Une erreur est arrivée ! Verifiez vos données retour ...";
        header('Refresh: 2; url=connexion.php');
    }
}
?>