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
            <a href="agent_dashboard2.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-house"></i>
                </div>
                <span class="link-text">Home</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Agent_Enregistrements.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-folder-open"></i>
                </div>
                <span class="link-text">Enregistrements</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Agent_Statisics.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-chart-simple"></i>
                </div>
                <span class="link-text">Statistics</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Agent_Team.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-user"></i>
                </div>
                <span class="link-text">Team</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Agent_Contact.php" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-comments"></i>
                </div>
                <span class="link-text">Contact</span>
            </a>
            </li>
            <li class="navbar-item flexbox-left">
            <a href="Agent_Setting.php" class="navbar-item-inner flexbox-left">
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