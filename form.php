<?php
$servername = "localhost";
$username = "root";
$password = "0689102695mohamedaboualinedimaraja";
$database = "gestdechcomloc";
$conn = new mysqli($servername, $username, $password, $database);
?>
<!DOCTYPE html>
<html>
<head>
    <title>formulaire citoyens</title>
    <link rel="stylesheet" href="css/signincitoyen.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <label for="cin">CIN:</label><br>
        <input type="text" id="cin" name="cin"  required><br>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prenom:</label><br>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="tel">Tel:</label><br>
        <input type="text" id="tel" name="tel" required><br>

        <label for="mot_de_passe">Mot de Passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <input type="submit" name="submit" id="but" value="Submit">
    </form>
</body>
</html>
<?php
    // error_reporting(0);
    // ini_set('display_errors', 0);
    session_name("citoyen");
    session_start();
        if(isset($_POST['submit'])){
            $cin = $_POST['cin'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $sql = "INSERT INTO Citoyens (CIN, Nom, Prenom, Email, Tel, Date_Inscription, Mot_de_Passe) 
                    VALUES ('$cin', '$nom', '$prenom', '$email', '$tel', now(), '$mot_de_passe')";
            $res = mysqli_query($conn,$sql);
            $_SESSION['role'] = 'citoyen';
            $_SESSION['user_id'] = $cin ;
            header('Location:citoyens_dashboard/citoyens_dash connected.php');
            exit();
        }
?>

<!-- $sqlname = "SELECT * FROM Citoyens WHERE CIN = '$cin'";
            $resname = mysqli_query($conn,$sqlname);
            $userC = mysqli_fetch_assoc($resname);
            session_name("citoyen");
            session_start();
            $_SESSION['role'] = 'citoyen';
            $_SESSION['user_id'] = $userC['CIN'];
            header('Location:citoyens_dashboard/citoyens_dash connected.php');
            exit(); -->