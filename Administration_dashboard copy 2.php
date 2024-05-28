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
    <title>Administration dashboard</title> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9963be157d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleadmin.css?v=1.0">
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
    <?php
        if(isset($_SESSION['user_id'])){
            $sqlname = "SELECT Nom FROM Adminstration
                        WHERE Id_Administration = '{$_SESSION['user_id']}'";
            $resname = mysqli_query($conn, $sqlname);
            $row = mysqli_fetch_assoc($resname);
            if ($row) {
                $_SESSION['role'] = 'Adminstration';
                $adminName = $row['Nom'];
                echo "<h1>HELLO $adminName</h1>";
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
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus suscipit id repellat omnis deleniti aliquam excepturi deserunt dolorum autem ex voluptatum aliquid nostrum corrupti voluptates, ipsam perferendis ullam quod explicabo accusamus quidem. Id enim commodi voluptates porro, voluptas quisquam doloribus reiciendis minus, voluptate sint, eius accusamus dolore amet voluptatem veniam? Odit nesciunt ipsum velit provident quam mollitia officia atque temporibus eos, cupiditate vitae, voluptatum nemo aliquid minima aperiam corporis quas, exercitationem quidem quod quis? Ratione voluptatem id hic repellendus mollitia a aspernatur, aperiam vero fugit voluptatibus! Aliquam sapiente beatae ab esse! Enim id voluptatibus earum unde provident quidem accusamus praesentium!</p>
                <button class="button-36" role="button">allez</button>
            </div>
            <div id="imageslanding">
                <img src="images/MK.jpeg" id="image1" alt="">
                <img src="images/logo4.jpg" id="image2" alt="">
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
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>             
                </div>
                <div class="whitebar"></div>
                <div class="infslan" id="inf2">
                    <i class="fa-solid fa-user"></i>
                    <div class="textinfs">
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
                <div class="whitebar"></div>
                <div class="infslan" id="inf3">
                    <i class="fa-solid fa-user"></i>
                    <div class="textinfs">
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
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


    <footer>
        <div class="footdivs">
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
        <div class="footdivs">
            <div>
                <div class="foottitle">Latest News</div>
                <div class="horizline"></div>
            </div>
            <div class="footdivcont">
                <div class="footevent">
                    <?php
                        $sqlannonce = "SELECT Annonce.Image, Annonce.Titre, Annonce.Date_de_Publication, CONCAT(Agent.Nom, ' ', Agent.Prenom) AS Full_name
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
                    
                    echo "<img src='".$rowannonce['Image']."' alt='' class='footeventimg'>";
                    echo "<div class='footeventtext'>".$rowannonce['Titre']."</div>";
                    echo "<div class='footeventdate'>".$rowannonce['Date_de_Publication']." de ".$rowannonce['Full_name']."</div>";
                echo "</div>";
                ?>
                <div class="footevent">
                    <?php
                            $sqlannonce = "SELECT Annonce.Image, Annonce.Titre, Annonce.Date_de_Publication, CONCAT(Agent.Nom, ' ', Agent.Prenom) AS Full_name
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
                        
                        echo "<img src='".$rowannonce['Image']."' alt='' class='footeventimg'>";
                        echo "<div class='footeventtext'>".$rowannonce['Titre']."</div>";
                        echo "<div class='footeventdate'>".$rowannonce['Date_de_Publication']." de ".$rowannonce['Full_name']."</div>";
                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
        <div class="footdivs">
            <div>
                <div class="foottitle">Quick Links</div>
                <div class="horizline"></div> 
            </div>
            <div class="footdivcont">
                <ul class="navbar-items flexbox-col">
                    <li class="navbar-item flexbox-left">
                    <a href="Administration_dashboard copy 2.php" class="navbar-item-inner flexbox-left">
                        <div class="navbar-item-inner-icon-wrapper flexbox">
                        Home 
                        </div>
                    </a>
                    </li>
                    <li class="navbar-item flexbox-left">
                    <a href="Admin_Enregistrements.php" class="navbar-item-inner flexbox-left">
                        <div class="navbar-item-inner-icon-wrapper flexbox">
                        Enregistrements
                        </div>
                    </a>
                    </li>
                    <li class="navbar-item flexbox-left">
                    <a href="Admin_Statisics.php" class="navbar-item-inner flexbox-left">
                        <div class="navbar-item-inner-icon-wrapper flexbox">
                        Statistics
                        </div>
                    </a>
                    </li>
                    <li class="navbar-item flexbox-left">
                    <a href="Admin_Team.php" class="navbar-item-inner flexbox-left">
                        <div class="navbar-item-inner-icon-wrapper flexbox">
                        Team
                        </div>
                    </a>
                    </li>
                    <li class="navbar-item flexbox-left">
                    <a href="Admin_Contact.php" class="navbar-item-inner flexbox-left">
                        <div class="navbar-item-inner-icon-wrapper flexbox">
                        Contact
                        </div>
                    </a>
                    </li>
                    <li class="navbar-item flexbox-left">
                    <a href="Admin_Setting.php" class="navbar-item-inner flexbox-left">
                        <div class="navbar-item-inner-icon-wrapper flexbox">
                        Settings
                        </div>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footdivs">
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
    </footer>
    <script src="script.js"></script>
</body>
</html>