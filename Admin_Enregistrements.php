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


    <div id="search-overlay" class="search-overlay">
        <div class="search-box">
            <input type="text" placeholder="Search...">
        </div>
    </div>
    

    <h2>Departement</h2>
    <table>
        <tr>
            <th>ID DEPARTEMENT</th>
            <th>Nom</th>
        </tr>
        <?php
            $sqldep = "SELECT * FROM Departement";
            $resultdep = mysqli_query($conn,$sqldep);
            if (mysqli_num_rows($resultdep)) {
                while($rowd = mysqli_fetch_assoc($resultdep)) {
                    echo "<tr>";
                    echo "<td>" . $rowd["Id_Departement"] . "</td>";
                    echo "<td>" . $rowd["Nom"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='iddephidd' value='" . $rowd["Id_Departement"] . "'>";
                    echo "<button type='submit' name='deletedepartement'>Supprimer</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
            }
            if (isset($_POST['deletedepartement'])) {
                if (isset($_POST['iddephidd']) && !empty($_POST['iddephidd'])) {
                    $iddepdelete = mysqli_real_escape_string($conn, $_POST['iddephidd']);                    
                    $sqldepartdelet = "DELETE FROM Departement WHERE Id_Departement = '$iddepdelete'";
                    if (mysqli_query($conn, $sqldepartdelet)) {
                        echo "Record deleted successfully";
                    }
                }
            }
        ?>
    </table>

    <h2>Post</h2>
    <table>
        <tr>
            <th>ID POST</th>
            <th>Nom</th>
        </tr>
        <?php
            $sqlpost = "SELECT * FROM Post";
            $resultpost = mysqli_query($conn,$sqlpost);
            if (mysqli_num_rows($resultpost)) {
                while($rowp = mysqli_fetch_assoc($resultpost)) {
                    echo "<tr>";
                    echo "<td>" . $rowp["Id_Post"] . "</td>";
                    echo "<td>" . $rowp["Id_Departement"] . "</td>";
                    echo "<td>" . $rowp["Nom"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='idposthidd' value='" . $rowp["Id_Post"] . "'>";
                    echo "<button type='submit' name='deletepost'>Supprimer</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
            }
            if (isset($_POST['deletepost'])) {
                if (isset($_POST['idposthidd']) && !empty($_POST['idposthidd'])) {
                    $idpostdelet = mysqli_real_escape_string($conn, $_POST['idposthidd']);                    
                    $sqlpostdelet = "DELETE FROM Post WHERE Id_Post = '$idpostdelet'";
                    if (mysqli_query($conn, $sqlpostdelet)) {
                        echo "Record deleted successfully";
                    }
                }
            }
        ?>
    </table>

    <h2>Liste des horaires de travail :</h2>
    <table>
        <tr>
            <td>Id Horaire</td>
            <td>Id Equipement</td>
            <td>Quart de travail</td>
            <td>Heure de travail</td>
            <td>Pause</td>
        </tr>
            <?php
                $sqltime = "SELECT * FROM HorairesTravail";
                $sqltimeres = mysqli_query($conn, $sqltime);
                if (mysqli_num_rows($sqltimeres)) {
                    while ($lignetime = mysqli_fetch_assoc($sqltimeres)) {
                        echo "<tr>";
                        echo "<td>" . $lignetime["Id_Horaire"] . "</td>";
                        echo "<td>" . $lignetime["Id_Equipement"] . "</td>";
                        echo "<td>" . $lignetime["Quart_de_travail"] . "</td>";
                        echo "<td>" . $lignetime["Heure_travail"] . "</td>";
                        echo "<td>" . $lignetime["Pausee"] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
    </table>

    <h2>Liste des vacances :</h2>
    <table>
        <tr>
            <td>Id Vacance</td>
            <td>Vacance</td>
            <td>Duree de la vacance</td>
            <td>Id Agent</td>
            <td>Action</td>
        </tr>
        <?php
            $sqlvacance = "SELECT * FROM Vacances";
            $resultvacance = mysqli_query($conn,$sqlvacance);
            if(mysqli_num_rows($resultvacance)){
                while($lignevacance = mysqli_fetch_assoc($resultvacance)){
                    $startDate = strtotime($lignevacance["DateDebutVacance"]);
                    $endDate = strtotime($lignevacance["DateFinVacance"]);
                    $duration = ($endDate - $startDate) / (60 * 60 * 24);
                    echo "<tr>";
                    echo "<td>" . $lignevacance["Id_Vacance"] . "</td>";
                    echo "<td>" . $lignevacance["NomVacance"] . "</td>";
                    echo "<td>" . $duration . " jours</td>"; 
                    echo "<td>" . $lignevacance["Id_Agent"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='idvacancehidd' value='" . $lignevacance["Id_Vacance"] . "'>";
                    echo "<button type='submit' name='deletevacance'>Supprimer</button>";
                    echo "<button type='submit' name='updatvacance'>Modifier</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            if (isset($_POST['deletevacance'])) {
                if (isset($_POST['idvacancehidd']) && !empty($_POST['idvacancehidd'])) {
                    $idvacancedelet = mysqli_real_escape_string($conn, $_POST['idvacancehidd']);                    
                    $sqlvacancedelet = "DELETE * FROM Vacances WHERE Id_Vacance = '$idvacancedelet'";
                    if (mysqli_query($conn, $sqlvacancedelet)) {
                        echo "Record deleted successfully";
                    }
                }
            }
        ?>
    </table>

    <h2>Liste des Fetes :</h2>
    <?php
        $sqlFete = "SELECT NomFete, DATEDIFF(DateFin, DateDebut) + 1 AS NombreJours FROM gestdechcomloc.Fetes";
        $resultFete = mysqli_query($conn, $sqlFete);
        if (mysqli_num_rows($resultFete) > 0) {
            echo "<table>
                    <tr>
                        <th>Fête</th>
                        <th>Nombre des jours</th>
                    </tr>";
            while ($rowFete = mysqli_fetch_assoc($resultFete)) {
                echo "<tr>";
                echo "<td>" . $rowFete["NomFete"] . "</td>";
                echo "<td>" . $rowFete["NombreJours"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <h2>Liste des Trajectoires</h2>
    <?php
        $sqlfetchtraj = "SELECT * FROM Trajectoire";
        $resultfetchtraj = mysqli_query($conn, $sqlfetchtraj);

        if (mysqli_num_rows($resultfetchtraj)) {
            echo "<table>";
            echo "<tr><th>ID Trajectoire</th><th>Début</th><th>Fin</th><th>Description</th></tr>";
            while ($row = mysqli_fetch_assoc($resultfetchtraj)) {
                echo "<tr>";
                echo "<td>" . $row["Id_Trajectoire"] . "</td>";
                echo "<td>" . $row["Debut"] . "</td>";
                echo "<td>" . $row["Fin"] . "</td>";
                echo "<td>" . $row["Descriptionn"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucune trajectoire trouvée.";
        }
    ?>

    <h2>Liste des Points de Collecte</h2>
    <?php
        $sqlfetchpoints = "SELECT * FROM PointCollecte";
        $resultfetchpoints = mysqli_query($conn, $sqlfetchpoints);

        if (mysqli_num_rows($resultfetchpoints)) {
            echo "<table>";
            echo "<tr><th>ID PointCollecte</th><th>Emplacement</th><th>Type</th><th>Capacité</th><th>ID Trajectoire</th></tr>";
            while ($row = mysqli_fetch_assoc($resultfetchpoints)) {
                echo "<tr>";
                echo "<td>" . $row["Id_PointCollecte"] . "</td>";
                echo "<td>" . $row["Emplacement"] . "</td>";
                echo "<td>" . $row["Typee"] . "</td>";
                echo "<td>" . $row["Capacite"] . "</td>";
                echo "<td>" . $row["Id_Trajectoire"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun point de collecte trouvé.";
        }
    ?>

    <h2>List des Citoyens</h2>
    <table>
        <tr>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Date Inscription</th>
            <th>Mot de Passe</th>
            <th>Actions</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "0689102695mohamedaboualinedimaraja";
        $database = "gestdechcomloc";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM Citoyens";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["CIN"] . "</td>";
                echo "<td>" . $row["Nom"] . "</td>";
                echo "<td>" . $row["Prenom"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Tel"] . "</td>";
                echo "<td>" . $row["Date_Inscription"] . "</td>";
                echo "<td>" . $row["Mot_de_Passe"] . "</td>";
                echo "<td>";
                echo "<button onclick=\"location.href='Admin_Setting.php?action=modifier&id=" . $row["CIN"] . "'\">Modifier</button>";
                echo "<button onclick=\"location.href='Admin_Setting.php?action=supprimer&id=" . $row["CIN"] . "'\">Supprimer</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "aucun resultat";
        }
        ?>
    </table>

    <h2>List des Admins</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>ADRESSE</th>
            <th>Email</th>
            <th>Tel</th>
            <th>GitHub</th>
            <th>Mot de Passe</th>
            <th>Actions</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "0689102695mohamedaboualinedimaraja";
        $database = "gestdechcomloc";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM Adminstration";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Id_Administration"] . "</td>";
                echo "<td>" . $row["Nom"] . "</td>";
                echo "<td>" . $row["Adresse"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Tel"] . "</td>";
                echo "<td>" . $row["GitHubURL"] . "</td>";
                echo "<td>" . $row["Mot_de_Passe"] . "</td>";
                echo "<td>";
                $id_encoded = urlencode($row['Id_Administration']);
                echo "<button onclick=\"location.href='Admin_modifications.php?action=modifier&id=$id_encoded#admininfs'\">Modifier</button>";
                echo "<button onclick=\"location.href='Admin_Setting.php?action=supprimer&id=$id_encoded#admininfs'\">Supprimer</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "aucun resultat";
        }
        ?>
    </table>

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
    <script src="script.js"></script>
</body>
</html>