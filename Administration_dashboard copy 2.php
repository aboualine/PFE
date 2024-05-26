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
    <link rel="stylesheet" href="css/styleadmin.css">
    <link rel="stylesheet" href="cssfooter/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
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


    <footer class="footer-01">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Colorlib</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Latest News</h2>
						<div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Oct. 16, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Oct. 16, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
					</div>
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Home</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Works</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon ion-ios-pin"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon ion-ios-call"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon ion-ios-send"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-12 text-center">

            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
			</div>
		</footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="script.js"></script>
</body>
</html>