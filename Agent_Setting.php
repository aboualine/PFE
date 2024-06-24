<?php
    session_name("agent");
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9963be157d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleadminsetting.css">
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

    <h6>Demander un congé : </h6>
    <fieldset>
        <legend>Congé</legend>
        <form action="" method="post">
            <label for="holiday_name">Nom de la vacance:</label>
            <input type="text" id="holiday_name" name="holiday_name" required><br>
            <label for="holiday_debut">Date debut de la vacance:</label>
            <input type="date" id="holiday_debut" name="holiday_debut" required><br>
            <label for="holiday_fin">Date fin de la vacance:</label>
            <input type="date" id="holiday_fin" name="holiday_fin" required><br>
            <label for="agent_id">ID de l'agent (optionnel):</label>
            <input type="number" id="agent_id" name="agent_id"><br>
            <button type="submit" name="subvacance">Ajouter</button>
        </form>
    </fieldset>

    <?php
        $user_id = $_SESSION['user_id'];
    ?>

    <h6>Ajouter les Problèmes : </h6>

    <fieldset>
    <legend>Signaler un Problème</legend>
        <form action="" method="post">
            <label for="equipement">Équipement :</label><br>
            <select id="equipement" name="equipement" required>
                <?php
                $sql_equipement = "SELECT e.Id_equipement, e.Nom 
                               FROM Equipement e
                               INNER JOIN Agent_Equipement ae ON e.Id_equipement = ae.Id_Equipement
                               WHERE ae.Id_Agent = $user_id";
                $result_equipement = mysqli_query($conn, $sql_equipement);

                if ($result_equipement && mysqli_num_rows($result_equipement) > 0) {
                    while ($row_equipement = mysqli_fetch_assoc($result_equipement)) {
                        echo "<option value='" . $row_equipement['Id_equipement'] . "'>" . $row_equipement['Nom'] . "</option>";
                    }
                } else {
                    echo "<option disabled selected>Aucun équipement disponible</option>";
                }
                ?>
            </select><br>

            <label for="description">Description du Problème :</label><br>
            <textarea id="description" name="description" rows="4" required></textarea><br>

            <label for="date_signal">Date de Signalement :</label><br>
            <input type="date" id="date_signal" name="date_signal" required><br>

            <input type="submit" name="signaler_probleme" value="Signaler">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['signaler_probleme'])) {
            $equipement_id = $_POST['equipement'];
            $description = $_POST['description'];
            $date_signal = $_POST['date_signal'];
        
            // Inserting the reported problem into the database
            $sql_insert_problem = "INSERT INTO Probleme (Descriptionn, Date_de_Signal, Statut, Id_Equipement) 
                                   VALUES ('$description', '$date_signal', 0, '$equipement_id')";
            
            if (mysqli_query($conn, $sql_insert_problem)) {
                echo "Le problème a été signalé avec succès.";
            } else {
                echo "Erreur lors du signalement du problème : " . mysqli_error($conn);
            }
        }
    ?>
    
    <?php
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['submit_demande'])) {
        $type_document = $_POST['type_document'];
        $description = $_POST['description'];
        $date_demande = date('Y-m-d'); // Current date
        $id_administration = 1; // Replace with the appropriate administration ID handling requests
    
        // Inserting the document request into the database
        $sql_insert_demande = "INSERT INTO DemandeDocument (Id_Agent, Type_Document, Date_Demande, Statut, Description, Id_Administration) 
                               VALUES ('$user_id', '$type_document', '$date_demande', 'En attente', '$description', '$id_administration')";
        
        if (mysqli_query($conn, $sql_insert_demande)) {
            echo "La demande de document a été soumise avec succès.";
        } else {
            echo "Erreur lors de la soumission de la demande de document : " . mysqli_error($conn);
        }
    }
    ?>
    <h6>Demander des documents : </h6>

    <fieldset>
        <legend>Document</legend>
        <form action="" method="post">
            <label for="type_document">Type de Document :</label><br>
            <input type="text" id="type_document" name="type_document" required><br>
    
            <label for="description">Description de la demande :</label><br>
            <textarea id="description" name="description" rows="4" required></textarea><br>
    
            <input type="submit" name="submit_demande" value="Soumettre la Demande">
        </form>
    </fieldset>
    
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
                &copy;Copyright 
                <?php 
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

    <script>
        $(document).ready(function(){
            var departement = document.getElementById("depaSelect");
            $(departement).change(function(){
                var Stdib = $('#depaSelect').val();
                $.ajax({
                    type: 'POST',
                    url: 'fetch.php',
                    data: {id:Stdib},
                    success: function(data){
                        $('#postaSelect').html(data);
                    }
                });
            });
        });
    </script>
    <script src="script.js"></script>
</body>
</html>