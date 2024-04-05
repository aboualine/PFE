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
    <title>formulaire Admins</title>
    <style>
        h2{
            position: relative;
            top:20px;
            left:150px;
        }
        form{
            display: block;
            position:absolute;
            left:37%;
            top:15%;
        }
        input{
            height:5vh;
            width:50vh;
            font-size:x-large;
        }
        #but{
            position:relative;
            top:20px;
        }
    </style>
</head>
<body>
    <h2>Administration</h2>
    <form action="" method="post">
        <label for="id">Id:</label><br>
        <input type="text" id="cin" name="id"  required><br>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>

        <label for="adresse">Adresse:</label><br>
        <input type="text" id="prenom" name="adresse" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="tel">Tel:</label><br>
        <input type="text" id="tel" name="tel" required><br>

        <!-- <label for="date_inscription">Date Inscription:</label><br>
        <input type="date" id="date_inscription" name="date_inscription"><br> -->

        <label for="mot_de_passe">Mot de Passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <input type="submit" name="submit" id="but" value="Submit">
    </form>
</body>
</html>
<?php
    // error_reporting(0);
    // ini_set('display_errors', 0);
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $sql = "INSERT INTO Adminstration (Id_Administration, Nom, Adresse, Email, Tel, Mot_de_Passe) 
                    VALUES ('$id', '$nom', '$adresse', '$email', '$tel', '$mot_de_passe')";
            $res = mysqli_query($conn,$sql);
        }
?>