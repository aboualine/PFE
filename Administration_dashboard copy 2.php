<?php
        session_name("admin");
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
            <li class="navbar-item flexbox-left" id="search-item">
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
    
    <?php
        if(isset($_SESSION['user_id'])){
            $sqlname = "SELECT Nom FROM Adminstration
                        WHERE Id_Administration = '{$_SESSION['user_id']}'";
            $resname = mysqli_query($conn, $sqlname);
            $row = mysqli_fetch_assoc($resname);
            if ($row) {
                $_SESSION['role'] = 'Adminstration';
                $adminName = $row['Nom'];
                echo "<h1>Bonjour $adminName</h1>";
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

    <section class="services-page">
        <h1 id="titreservices">why we need MEDNISS</h1>
        <div class="row pt-lg-5">
            <div class="col-lg-6 col-12">
            <div class="services-thumb">
                <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                <h3 class="mb-0">Websites</h3>

                <div class="services-price-wrap ms-auto">
                    <p class="services-price-text mb-0">$2,400</p>
                    <div class="services-price-overlay"></div>
                </div>
                </div>

                <p>You may want to explore Too CSS for great collection of free HTML CSS templates.</p>

                <a href="#" class="custom-btn custom-border-btn btn mt-3">Discover More</a>

                <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-user" id="services-icon"></i>
                </div>
            </div>
            </div>

            <div class="col-lg-6 col-12">
            <div class="services-thumb services-thumb-up">
                <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                <h3 class="mb-0">Branding</h3>

                <div class="services-price-wrap ms-auto">
                    <p class="services-price-text mb-0">$1,200</p>
                    <div class="services-price-overlay"></div>
                </div>
                </div>

                <p>You can explore more CSS templates on TemplateMo website by browsing through different tags.</p>

                <a href="#" class="custom-btn custom-border-btn btn mt-3">Discover More</a>

                <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-user" id="services-icon"></i>
                </div>
            </div>
            </div>

            <div class="col-lg-6 col-12" id="rdcarddiv">
            <div class="services-thumb">
                <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                <h3 class="mb-0">Ecommerce</h3>

                <div class="services-price-wrap ms-auto">
                    <p class="services-price-text mb-0">$3,600</p>
                    <div class="services-price-overlay"></div>
                </div>
                </div>

                <p>If you need a customized ecommerce website for your business, feel free to discuss with me.</p>

                <a href="#" class="custom-btn custom-border-btn btn mt-3">Discover More</a>

                <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-user" id="services-icon"></i>
                </div>
            </div>
            </div>

            <div class="col-lg-6 col-12">
            <div class="services-thumb services-thumb-up">
                <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                <h3 class="mb-0">SEO</h3>

                <div class="services-price-wrap ms-auto">
                    <p class="services-price-text mb-0">$1,450</p>
                    <div class="services-price-overlay"></div>
                </div>
                </div>

                <p>To list your website first on any search engine, we will work together. First Portfolio is one-page CSS Template for free download.</p>

                <a href="#" class="custom-btn custom-border-btn btn mt-3">Discover More</a>

                <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-user" id="services-icon"></i>
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
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">ayoublgtifi</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">whale</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">dolphin</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">fish</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">tropical fish</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">blowfish</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">shark</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">octopus</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
                <div class="carousel__item">
                    <div class="carousel__item-head"><img src="images/MK.jpeg" alt=""></div>
                    <div class="carousel__item-body">
                        <p class="title">spiral shell</p>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur.</p>
                        <p class="Unicode">Unicode: U+1F433</p>
                    </div>
                </div>
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