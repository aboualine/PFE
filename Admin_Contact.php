<?php
    $servername = "localhost";
    $username = "root";
    $password = "0689102695mohamedaboualinedimaraja";
    $database = "gestdechcomloc";
    $conn = new mysqli($servername, $username, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9963be157d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleadmin.css">
</head>
<body>
    <!-- Navbar -->
    <nav id="navbar">
        <ul class="navbar-items flexbox-col">
            <li class="navbar-logo flexbox-left">
            <a class="navbar-item-inner flexbox">
                <img src="images/logofinal.png" alt="">
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="#" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <span class="link-text">Search</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Administration_dashboard copy 2.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-house"></i>
                </div>
                <span class="link-text">Home</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Admin_Enregistrements.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-folder-open"></i>
                </div>
                <span class="link-text">Enregistrements</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Admin_Statisics.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-chart-simple"></i>
                </div>
                <span class="link-text">Statistics</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Admin_Team.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-user"></i>
                </div>
                <span class="link-text">Team</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Admin_Contact.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-comments"></i>
                </div>
                <span class="link-text">Contact</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Admin_Setting.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-gear"></i>
                </div>
                <span class="link-text">Settings</span>
            </a>
            </li>
        </ul>
    </nav>

    <h2>Liste des Problèmes Signalés</h2>
    <table>
        <tr>
            <td>ID Problème</td>
            <td>Description du Problème</td>
            <td>Date de Signalement</td>
            <td>Statut</td>
        </tr>
        <?php
            $sql_problemes = "SELECT Id_Probleme, Descriptionn, Date_de_Signal, Statut
            FROM Probleme";

            $result_problemes = mysqli_query($conn, $sql_problemes);

            if ($result_problemes && mysqli_num_rows($result_problemes) > 0) {
                while ($row = mysqli_fetch_assoc($result_problemes)) {
                    echo "<tr>";
                    echo "<td>" . $row['Id_Probleme'] . "</td>";
                    echo "<td>" . $row['Descriptionn'] . "</td>";
                    echo "<td>" . $row['Date_de_Signal'] . "</td>";
                    echo "<td>" . $row['Statut'] . "</td>";
                    echo "</tr>";
                }
            } else {
            echo "Aucun Probleme Signaler.";
            }
        ?>
    </table>

    <h2> Liste de reclamations </h2>
    <?php
        $sql_complaints = "SELECT * FROM Reclamation";
        $result_complaints = mysqli_query($conn, $sql_complaints);

        if (mysqli_num_rows($result_complaints) ) {
            echo "<table>
                        <tr>
                            <th>ID Reclamation</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de Publication</th>
                        </tr>";
                while ($row = mysqli_fetch_assoc($result_complaints)) {
                    echo "<tr>";
                    echo "<td>" . $row['Id_Reclamation'] . "</td>";
                    echo "<td>" . $row['Titre'] . "</td>";
                    echo "<td>" . $row['Descriptionn'] . "</td>";
                    echo "<td>" . $row['Date_de_Publication'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
        } else {
                echo "Aucune réclamation n'a été signalée.";
        }
    ?>


</body>
</html>