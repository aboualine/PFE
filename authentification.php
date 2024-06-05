<?php
    $servername = "localhost";
    $username = "root";
    $password = "0689102695mohamedaboualinedimaraja";
    $database = "gestdechcomloc";
    $conn = new mysqli($servername, $username, $password, $database);
?>
<?php
    if(isset($_POST['submit'])){
        $em = $_POST['email'];
        $pass = $_POST['password'];
        $queryC = "SELECT * FROM Citoyens WHERE Email = '$em' AND Mot_de_Passe ='$pass'"; 
        $resultC = mysqli_query($conn, $queryC);
        $queryA = "SELECT * FROM Adminstration WHERE Email = '$em' AND Mot_de_Passe ='$pass'";
        $resultA = mysqli_query($conn, $queryA);
        $queryJ = "SELECT * FROM Agent WHERE Email = '$em' AND Mot_de_Passe ='$pass'";
        $resultJ = mysqli_query($conn, $queryJ);
        if (mysqli_num_rows($resultC)) {
            $userC = mysqli_fetch_assoc($resultC);
           
            if (isset($pass) && $pass == TRUE) {
                session_name("citoyen");
                session_start();
                $_SESSION['role'] = 'citoyen';
                $_SESSION['user_id'] = $userC['CIN'];
                header('Location:GestDechComLoc.php');
                exit();
            }
            else{
            }
        } elseif (mysqli_num_rows($resultA)) {
                $userA = mysqli_fetch_assoc($resultA);
                if (isset($pass) && $pass == TRUE) {
                    session_name("admin");
                    session_start();
                    $_SESSION['role'] = 'Adminstration';
                    $_SESSION['user_id'] = $userA['Id_Administration'];
                    header('Location:Administration_dashboard copy 2.php');
                    exit();
                }
        
        } elseif (mysqli_num_rows($resultJ)) {
                $userJ = mysqli_fetch_assoc($resultJ);
                if (isset($pass) && $pass == TRUE) {
                    session_name("agent");
                    session_start();
                    $_SESSION['role'] = 'Agent';
                    $_SESSION['user_id'] = $userJ['Id_Agent'];
                    header('Location: Agent_dashboard.php');
                    exit();
                }
        } else {
            // Authentication failed, show an error message or redirect back to login
            header('Location: authentification.php?error=invalid_credentials');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="css/authentstyle.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="entrer votr email..." required><br><br>
        <label for="password">Mot de Passe:</label>
        <input type="password" id="password" name="password"  placeholder="entrer votr mot de passe..." required><br><br>
        <input type="submit" id="sbt" name="submit" value="Se connecter">
    </form>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials') {
            echo '<p style="color:red;">Invalid email or password. Please try again.</p>';
        }
    ?>
</body>
</html>