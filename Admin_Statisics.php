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

    <h2>Calendrier de Travail</h2>
    <table>
        <tr>
            <th>Equipement</th>
            <th>Véhicule</th>
            <th>Trajectoire</th>
            <th>Quart de travail</th>
            <th>Date de début</th>
        </tr>
        <?php
            $sql_calendrier = "SELECT c.Equipement_Nom, c.Vehicule_Marque, c.Vehicule_Modele, t.Debut AS Trajectoire_Debut, t.Fin AS Trajectoire_Fin, c.Quart_de_travail, c.Date_debut
                            FROM CalendrieDeTravail c
                            INNER JOIN Trajectoire t ON c.Id_Trajectoire = t.Id_Trajectoire";
            $result_calendrier = mysqli_query($conn, $sql_calendrier);

            if (mysqli_num_rows($result_calendrier) > 0) {
                while ($row_calendrier = mysqli_fetch_assoc($result_calendrier)) {
                    echo "<tr>";
                    echo "<td>" . $row_calendrier['Equipement_Nom'] . "</td>";
                    echo "<td>" . $row_calendrier['Vehicule_Marque'] . " " . $row_calendrier['Vehicule_Modele'] . "</td>";
                    echo "<td>" . $row_calendrier['Trajectoire_Debut'] . " - " . $row_calendrier['Trajectoire_Fin'] . "</td>";
                    echo "<td>" . $row_calendrier['Quart_de_travail'] . "</td>";
                    echo "<td>" . $row_calendrier['Date_debut'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucune donnée disponible</td></tr>";
            }
        ?>
    </table>


</body>
</html>