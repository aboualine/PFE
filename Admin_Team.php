<?php
    session_name("admin");
    session_start();
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
    <link rel="stylesheet" href="css/styleadminenregistrement.css">
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

    <h2>Agents</h2>
    <table>
        <tr>
            <td>Id Post</td>
            <td>Nom</td>
            <td>Prenom</td>
            <!-- <th>Departement</th> -->
            <td>Post</td>
            <td>Email</td>
            <td>Tel</td>
            <td>Mot de Passe</td>
            <td>Action</td>
        </tr>
        <?php
            $sqlpost = "SELECT * FROM gestdechcomloc.agent";
            $resultpost = mysqli_query($conn,$sqlpost);
            if (mysqli_num_rows($resultpost)) {
                while($rowa = mysqli_fetch_assoc($resultpost)) {
                    echo "<tr>";
                    echo "<td>" . $rowa["Id_Agent"] . "</td>";
                    echo "<td>" . $rowa["Nom"] . "</td>";
                    echo "<td>" . $rowa["Prenom"] . "</td>";
                    // echo "<td>" . $rowa["Departement"] . "</td>";
                    echo "<td>" . $rowa["Poste"] . "</td>";
                    echo "<td>" . $rowa["Email"] . "</td>";
                    echo "<td>" . $rowa["Tel"] . "</td>";
                    echo "<td>" . $rowa["Mot_de_Passe"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='idagenthidd' value='" . $rowa["Id_Agent"] . "'>";
                    echo "<button type='submit' name='deleteagent'>Supprimer</button>";
                    echo "<button type='submit' name='updatagent'>Modifier</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
            }
            if (isset($_POST['deleteagent'])) {
                if (isset($_POST['idagenthidd']) && !empty($_POST['idagenthidd'])) {
                    $idagentdelet = mysqli_real_escape_string($conn, $_POST['idagenthidd']);                    
                    $sqlagentdelet = "DELETE FROM Agent WHERE Id_Agent = '$idagentdelet'";
                    if (mysqli_query($conn, $sqlagentdelet)) {
                        echo "Record deleted successfully";
                    }
                }
            }
        ?>
    </table>

    <h2>Liste des Equipements :</h2>
    <?php
        $sqlfetchequip = "SELECT Id_equipement, Nom , Descriptionn FROM Equipement";
        $resultfetchequip = mysqli_query($conn, $sqlfetchequip);
        if (mysqli_num_rows($resultfetchequip)) {
            echo "<table>
                    <tr>
                        <th>Id equipement</th>
                        <th>Nom d'equipement</th>
                        <th>Description</th>
                    </tr>";
            while ($rowfetchequip = mysqli_fetch_assoc($resultfetchequip)) {
                echo "<tr>";
                echo "<td>" . $rowfetchequip["Id_equipement"] . "</td>";
                echo "<td>" . $rowfetchequip["Nom"] . "</td>";
                echo "<td>" . $rowfetchequip["Descriptionn"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <h2>Liste des Agents existe sur les equipements :</h2>
    <?php
        $sqlfetchequipmentsagents = "SELECT Equipement.Nom AS Equipement_Nom, Agent_Equipement.Agent_Name 
                                     FROM Equipement 
                                     INNER JOIN Agent_Equipement ON Equipement.Id_equipement = Agent_Equipement.Id_Equipement";
        $resultfetchequipmentsagents = mysqli_query($conn, $sqlfetchequipmentsagents);
        $rowspanCounts = array();
        $prevEquipementNom = null;
        if (mysqli_num_rows($resultfetchequipmentsagents)) {
            echo "<table>";
            while ($rowfetchresultfetchequipmentsagents = mysqli_fetch_assoc($resultfetchequipmentsagents)) {
                if ($rowfetchresultfetchequipmentsagents["Equipement_Nom"] != $prevEquipementNom) {
                    $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] = 1;
                    $prevEquipementNom = $rowfetchresultfetchequipmentsagents["Equipement_Nom"];
                } else {
                    $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]]++;
                }
                echo "<tr>";
                if ($rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] > 0) {
                    echo "<td rowspan='" . $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] . "'>" . $rowfetchresultfetchequipmentsagents["Equipement_Nom"] . "</td>";
                    $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] = 0;
                }
                echo "<td>" . $rowfetchresultfetchequipmentsagents["Agent_Name"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <h2>Liste des véhicules</h2>
    <?php
        $sqlListeVehicules = "SELECT * FROM Vehicule";
        $resultatListeVehicules = mysqli_query($conn, $sqlListeVehicules);
        if (mysqli_num_rows($resultatListeVehicules) > 0) {
            echo "<table>";
            echo "<tr><th>ID Véhicule</th><th>Marque</th><th>Modèle</th><th>Année</th><th>Statut</th></tr>";
            while ($ligne = mysqli_fetch_assoc($resultatListeVehicules)) {
                echo "<tr>";
                echo "<td>" . $ligne["Id_Vehicule"] . "</td>";
                echo "<td>" . $ligne["Marque"] . "</td>";
                echo "<td>" . $ligne["Modele"] . "</td>";
                echo "<td>" . $ligne["Annee"] . "</td>";
                echo "<td>" . ($ligne["Statut"] ? "Actif" : "Inactif") . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun véhicule trouvé.";
        }
    ?>

<footer>
        <div class="footdivs fdwl">
            <div>
                <div class="foottitle">Title</div>
                <div class="horizline"></div>
            </div>
            <div class="footdivcont">
                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum fugiat eos dicta, odit eveniet quisquam!
                </div>
                <div>
                    <a href="authentification.php"><i class="fa-solid fa-user"></i></a>
                    <a href="authentification.php"><i class="fa-solid fa-user"></i></a>
                    <a href="authentification.php"><i class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
        <div class="footdivs fdwl">
            <div>
                <div class="foottitle">Latest News</div>
                <div class="horizline"></div>
            </div>
            <div class="footdivcont">
                <div class="footevent">
                    <?php
                        $sqlannonce = "SELECT Annonce.Titre, Annonce.Date_de_Publication, CONCAT(Agent.Nom, ' ', Agent.Prenom) AS Full_name
                                        FROM 
                                            Annonce
                                        JOIN 
                                            Agent ON Annonce.Id_Agent = Agent.Id_Agent
                                        WHERE 
                                            Annonce.Date_de_Publication = (SELECT MAX(Date_de_Publication) FROM Annonce)";
                        $resannonce = mysqli_query($conn,$sqlannonce);
                        if(mysqli_num_rows($resannonce)){
                            $rowannonce = mysqli_fetch_assoc($resannonce);
                        }
                    
                    echo "<div class='footeventtext'>".$rowannonce['Titre']."</div>";
                    echo "<div class='footeventdate'>".$rowannonce['Date_de_Publication']." de ".$rowannonce['Full_name']."</div>";
                echo "</div>";
                ?>
                <div class="footevent">
                    <?php
                            $sqlannonce = "SELECT Annonce.Titre, Annonce.Date_de_Publication, CONCAT(Agent.Nom, ' ', Agent.Prenom) AS Full_name
                                            FROM 
                                                Annonce
                                            JOIN 
                                                Agent ON Annonce.Id_Agent = Agent.Id_Agent
                                            WHERE 
                                                Annonce.Date_de_Publication = (SELECT MAX(Date_de_Publication) FROM Annonce)";
                            $resannonce = mysqli_query($conn,$sqlannonce);
                            if(mysqli_num_rows($resannonce)){
                                $rowannonce = mysqli_fetch_assoc($resannonce);
                            }
                        
                        echo "<div class='footeventtext'>".$rowannonce['Titre']."</div>";
                        echo "<div class='footeventdate'>".$rowannonce['Date_de_Publication']." de ".$rowannonce['Full_name']."</div>";
                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
        <div class="footdivs fdwl">
            <div>
                <div class="foottitle">Quick Links</div>
                <div class="horizline"></div> 
            </div>
            <!-- <div class="footdivcont"> -->
                <ul class="footdivcont">
                    <li>
                    <a href="Administration_dashboard copy 2.php" >
                        <div>
                        Home 
                        </div>
                    </a>
                    </li>
                    <li>
                    <a href="Admin_Enregistrements.php">
                        <div>
                        Enregistrements
                        </div>
                    </a>
                    </li>
                    <li>
                    <a href="Admin_Statisics.php">
                        <div>
                        Statistics
                        </div>
                    </a>
                    </li>
                    <li >
                    <a href="Admin_Team.php">
                        <div>
                        Team
                        </div>
                    </a>
                    </li>
                    <li>
                    <a href="Admin_Contact.php">
                        <div>
                        Contact
                        </div>
                    </a>
                    </li>
                    <li>
                    <a href="Admin_Setting.php">
                        <div>
                        Settings
                        </div>
                    </a>
                    </li>
                </ul>
            <!-- </div> -->
        </div>
        <div class="footdivs fdwl">
            <div>
                <div class="foottitle">Have a Questions?</div>
                <div class="horizline"></div>
            </div>
            <div class="footdivcont">
                    <?php
                        $sqladmin = "SELECT * FROM Adminstration 
                                     WHERE Id_Administration = '{$_SESSION['user_id']}' ";
                        $resadmin = mysqli_query($conn,$sqladmin);
                        if(mysqli_num_rows($resadmin)){
                            $rowadmin = mysqli_fetch_assoc($resadmin);
                            echo "<div class='footcontact'>";
                                echo "<i class='fa-solid fa-magnifying-glass'></i>";
                                echo "<div><a href='#'>".$rowadmin['Email']."</a></div>";
                            echo "</div>";
                            echo "<div class='footcontact'>";
                                echo "<i class='fa-solid fa-magnifying-glass'></i>";
                                echo "<div><a href='#'>".$rowadmin['Tel']."</a></div>";
                            echo "</div>";
                            echo "<div class='footcontact'>";
                                echo "<i class='fa-solid fa-magnifying-glass'></i>";
                                echo "<div>".$rowadmin['Adresse']."</div>";                            
                            echo "</div>";
                        }
                    ?>
            </div>
        </div>
        <div id="footcopyright">
            <div id="footcopyline"></div>
            <div>
                &copy;Copyright <?php 
                    $sql = 'SELECT Nom, GitHubURL FROM Adminstration';
                    $res = mysqli_query($conn, $sql);
                    $names = [];                                                              
                    while ($row = mysqli_fetch_assoc($res)) {
                        $names[] = [
                            'name' => $row['Nom'],
                            'url' => $row['GitHubURL']
                        ];
                    }
            
                    $namesCount = count($names);
                    $namesList = '';
                    
                    foreach ($names as $index => $person) {
                        $namesList .= "<a href='{$person['url']}' class='textbold' target='_blank'>{$person['name']}</a>";
                        if ($index < $namesCount - 2) {
                            $namesList .= ', ';
                        } elseif ($index == $namesCount - 2) {
                            $namesList .= ' and ';
                        }
                    }
            
                    echo "<span class='textbold'>" . date("Y") . "</span> All rights reserved | This website is made by {$namesList}";
                ?>
            </div>

        </div>
    </footer>
</body>
</html>