<?php
        session_name("agent");
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "0689102695mohamedaboualinedimaraja";
        $database = "gestdechcomloc";
        $conn = mysqli_connect($servername, $username, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent dashboard</title> 
    <link rel="shortcut icon" type="x-icon" href="images/logofinal.png">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9963be157d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleadmin.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
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
            <li class="navbar-item flexbox-left" id="search-item">
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
            <?php
                if (isset($_GET['view_reclamation'])) {
                    // Mark notifications as viewed
                    $query_update = "UPDATE Reclamation SET viewed = TRUE WHERE viewed = FALSE";
                    mysqli_query($conn, $query_update);
                }
                
                // Count the number of new comments
                $query = "SELECT COUNT(*) as new_comments FROM Reclamation WHERE viewed = FALSE";
                $result = mysqli_query($conn, $query);
                $new_comments = 0;
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $new_comments = $row['new_comments'];
                }
            ?>
            <li class="navbar-item flexbox-left">
            <a href="Agent_Contact.php?view_reclamation=true" class="navbar-item-inner flexbox-left">
                <div class="navbar-item-inner-icon-wrapper flexbox">
                <i class="fa-solid fa-comments"></i>
                </div>
                <span class="link-text">Contact</span>
                <div class="notification">
                    <span class="badge">
                        <?php echo $new_comments; ?>
                    </span>
                </div>
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

    <div id="search-overlay" class="search-overlay">
        <div class="search-box">
            <input type="text" placeholder="Search...">
        </div>
    </div>
    
    <?php
        if(isset($_SESSION['user_id'])){
            $sqlname = "SELECT Nom FROM Agent
                        WHERE Id_Agent = '{$_SESSION['user_id']}'";
            $resname = mysqli_query($conn, $sqlname);
            $row = mysqli_fetch_assoc($resname);
            if ($row) {
                $_SESSION['role'] = 'Agent';
                $agentName = $row['Nom'];
                echo "<h1>Bonjour $agentName</h1>";
            } else {
                header("Location: authentification.php");
            }
        }
        else {
            header("Location: authentification.php");
        }
    ?>
    <section>
        <div class="firstlanding">
            <div id="textlanding">
                <p>Bienvenue sur notre plateforme de gestion des déchets, une initiative collaborative de Mohamed Aboualine et Nissrine El Ghammouri. Notre mission est d'améliorer la gestion des déchets au niveau local grâce à un site web engageant et éducatif. Vous y trouverez un tableau de bord communautaire pour rester informé des statistiques et des annonces importantes sur la gestion des déchets, un calendrier de collecte pour suivre et planifier les jours de collecte, et un système de suivi des déchets pour surveiller les types, quantités et destinations de vos déchets.
                    L'espace communautaire permet de partager des conseils et des idées dans notre forum de discussion, tandis que les ressources éducatives offrent des informations sur le tri des déchets et les pratiques durables. En vous inscrivant, vous pouvez créer des profils personnalisés pour participer activement. Recevez des notifications en temps réel pour les jours de collecte et les événements communautaires, et utilisez notre carte interactive pour localiser les points de collecte et les installations de recyclage. Notre guide interactif vous aide à trier correctement les déchets et vous pouvez gagner des badges écologiques virtuels pour vos actions positives.
                    Rejoignez-nous pour promouvoir une approche responsable et durable de la gestion des déchets dans notre communauté.
                </p>
                <button class="button-36" role="button">allez</button>
            </div>
            <div id="imageslanding">
                <img src="images/MK.jpeg" id="image1" alt="">
                <img src="images/logo7.jpg" id="image2" alt="">
            </div>
        </div>
        
        <div class="secondlanding">
            <div id="seclanimgs">
                <div id="imgplace1" class="imgplace"></div>
                <div id="imgplace2" class="imgplace"></div>
                <div id="imgplace3" class="imgplace"></div>
                <div id="backcolor"></div>
            </div>
            <div id="seclantext">
                <div id="texteventchanging"></div>
                <button id="btneventvue">voir</button>
            </div>
            <div id="seclaninfs">
                <div class="infslan" id="inf1">
                    <i class="fa-solid fa-user"></i>
                    <div class="textinfs">
                        <p>Enregistrement des Utilisateurs</p>
                        <p>Notifications en Temps Réel </p>
                        <p>Repense au reclamations</p>
                        <p>Organization des Calendriers de Collecte</p>
                    </div>             
                </div>
                <div class="whitebar"></div>
                <div class="infslan" id="inf2">
                    <i class="fa-solid fa-recycle"></i>
                    <div class="textinfs">
                        <p>Système de suivi des déchets</p>
                        <p>Planification des equipements</p>
                        <p>Creation des annonces </p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
                <div class="whitebar"></div>
                <div class="infslan" id="inf3">
                    <i class="fa-solid fa-leaf"></i>
                    <div class="textinfs">
                        <p>Cartographie Interactive</p>
                        <p>Ressources Éducatives </p>
                        <p>Espace Communautaire</p>
                        <p>Système de Badges Écologiques</p>
                    </div>
                </div>
            </div>
            <div id="seclanstats">
                <?php
                    $sqlpc = "SELECT count(Id_PointCollecte) AS totalpc FROM PointCollecte";
                    $respc = mysqli_query($conn,$sqlpc);
                    if(mysqli_num_rows($respc)){
                        $rowpc = mysqli_fetch_assoc($respc);
                    }
                
                echo "<div class='counter'>";
                    echo "<h1 class='count' data-target='".$rowpc['totalpc']."'></h1>";
                    echo "<p>Points de collect</p>";
                echo "</div>";
                ?>
                <?php
                    $sqltra = "SELECT count(Id_Trajectoire) AS totaltra FROM Trajectoire";
                    $restra = mysqli_query($conn,$sqltra);
                    if(mysqli_num_rows($restra)){
                        $rowtra = mysqli_fetch_assoc($restra);
                    }
                    echo "<div class='counter'>";
                        echo "<h1 class='count' data-target='".$rowtra['totaltra']."'></h1>";
                        echo "<p>Trajectoires</p>";
                    echo "</div>";
                ?>
                <?php
                    $sqlram = "SELECT count(Id_Agent) AS totalram FROM Agent WHERE Poste = 'Agent de nettoyage'";
                    $resram = mysqli_query($conn,$sqlram);
                    if(mysqli_num_rows($resram)){
                        $rowram = mysqli_fetch_assoc($resram);
                    }
                    echo "<div class='counter'>";
                        echo "<h1 class='count' data-target='".$rowram['totalram']."'></h1>";
                        echo "<p>Ramaceurs</p>";
                    echo "</div>";
                ?>
                <?php
                    $sqlveh = "SELECT count(Id_Vehicule) AS totalveh FROM Vehicule ";
                    $resveh = mysqli_query($conn,$sqlveh);
                    if(mysqli_num_rows($resveh)){
                        $rowveh = mysqli_fetch_assoc($resveh);
                    }
                    echo "<div class='counter'>";
                        echo "<h1 class='count' data-target='".$rowveh['totalveh']."'></h1>";
                        echo "<p>Véhicules</p>";
                    echo "</div>";
                ?>
            </div>
        </div>
    </section>

    <section class="services-page">
        <h1 id="titreservices">why we need MEDNISS</h1>
        <div class="row pt-lg-5">
                                <div class="col-lg-6 col-12">
                                    <div class="services-thumb">
                                        <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                                            <h3 class="mb-0">Guide du Recyclage</h3>
                                        </div>

                                        <p>Apprenez les bases du recyclage, y compris les matériaux recyclables, comment trier vos recyclables et pourquoi le recyclage est important pour l'environnement.</p>

                                        <a href="https://www.ecoconso.be/" class="custom-btn custom-border-btn btn mt-3">Découvrir Plus</a>

                                        <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                                            <i class="services-icon bi-recycle"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="services-thumb services-thumb-up">
                                        <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                                            <h3 class="mb-0">le Compostage</h3>
                                        </div>

                                        <p>Découvrez comment composter les déchets organiques à la maison, quels matériaux peuvent être compostés et les avantages du compostage pour votre jardin et l'environnement.</p>

                                        <a href="https://www.ademe.fr/" class="custom-btn custom-border-btn btn mt-3">Découvrir Plus</a>

                                        <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                                            <i class="services-icon bi-tree"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="services-thumb">
                                        <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                                            <h3 class="mb-0">Réduction des Déchets</h3>
                                        </div>

                                        <p>Apprenez des conseils pratiques pour réduire les déchets dans votre vie quotidienne, y compris comment éviter les plastiques à usage unique, acheter en vrac et d'autres stratégies de réduction des déchets.</p>

                                        <a href="https://www.citeo.com/" class="custom-btn custom-border-btn btn mt-3">Découvrir Plus</a>

                                        <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                                            <i class="services-icon bi-bag-check"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="services-thumb services-thumb-up">
                                        <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                                            <h3 class="mb-0">Élimination des Déchets Dangereux</h3>
                                        </div>

                                        <p>Comprenez comment éliminer correctement les déchets dangereux tels que les piles, les appareils électroniques et les produits chimiques pour protéger l'environnement et la santé humaine.</p>

                                        <a href="https://www.geodair.fr/" class="custom-btn custom-border-btn btn mt-3">Découvrir Plus</a>

                                        <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                                            <i class="services-icon bi-exclamation-triangle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </section>

    <section class="latestevents">
        <h1>Latest Events</h1>
        <div class="eventscards">
            <div class="eventscardsimgs">
                <img src="images/MK.jpeg" alt="">
            </div>
            <div class="eventscardstext">
                <div id="eventstitle">Name</div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius culpa dolorum dolores explicabo animi incidunt libero ex excepturi facere enim!</div>
                <div id="eventdate">Date12345</div>
            </div>
        </div>
        <div class="eventscards ecr">
            <div class="eventscardsimgs">
                <img src="images/MK.jpeg" alt="">
            </div>
            <div class="eventscardstext">
                <div id="eventstitle">Name</div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius culpa dolorum dolores explicabo animi incidunt libero ex excepturi facere enim!</div>
                <div id="eventdate">Date12345</div>
            </div>
        </div>
        <div class="eventscards">
            <div class="eventscardsimgs">
                <img src="images/MK.jpeg" alt="">
            </div>
            <div class="eventscardstext">
                <div id="eventstitle">Name</div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius culpa dolorum dolores explicabo animi incidunt libero ex excepturi facere enim!</div>
                <div id="eventdate">Date12345</div>
            </div>
        </div>
        <div class="eventscards ecr">
            <div class="eventscardsimgs">
                <img src="images/MK.jpeg" alt="">
            </div>
            <div class="eventscardstext">
                <div id="eventstitle">Name</div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius culpa dolorum dolores explicabo animi incidunt libero ex excepturi facere enim!</div>
                <div id="eventdate">Date12345</div>
            </div>
        </div>
    </section>

    <section class="wrapper">
            <div class="carousel">
                <h1>Commentaires</h1>
                <!-- <div class="wrapper">
                            <div class="carousel"> -->
                                <?php
                                    $query = "
                                    SELECT R.Titre, R.Descriptionn, C.Nom 
                                    FROM Reclamation R
                                    JOIN Citoyens C ON R.CIN = C.CIN
                                ";
                                $result = mysqli_query($conn, $query);
                                $reclamations = [];
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $reclamations[] = $row;
                                        foreach ($reclamations as $index => $reclamation) {
                                            echo '<div class="carousel__item">';
                                            echo '    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>';
                                            echo '    <div class="carousel__item-body">';
                                            echo '        <p class="title">' . htmlspecialchars($reclamation['Titre']) . '</p>';
                                            echo '        <p class="lorem">' . htmlspecialchars($reclamation['Descriptionn']) . '</p>';
                                            echo '        <p class="Unicode">' . htmlspecialchars($reclamation['Nom']) . '</p>';
                                            echo '    </div>';
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>
                            <!-- </div>
                        </div> -->
            </div>
    </section>

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