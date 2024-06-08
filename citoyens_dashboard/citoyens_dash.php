<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "0689102695mohamedaboualinedimaraja";
    $database = "gestdechcomloc";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (isset($_SESSION['role'])) {
        switch ($_SESSION['role']) {
            case 'Adminstration':
                header("Location: Administration_dashboard.php");
                exit();
            case 'Agent':
                header("Location: Agent_dashboard.php");
                exit();
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="TemplateMo">

        <title>First Portfolio Bootstrap 5 Theme</title>

        <!-- CSS FILES -->

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/magnific-popup.css" rel="stylesheet">

        <link href="css/templatemo-first-portfolio-style.css?v=1.0" rel="stylesheet">

        <script src="https://kit.fontawesome.com/9963be157d.js" crossorigin="anonymous"></script>

        
<!--
*
*
*
*
*
*
-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="spinner-rotate"></span>    
            </div>
        </section>

        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="#section_2" class="navbar-brand mx-auto mx-lg-0"><img src="../images/logofinal.png" alt="" id="navlogo"></a>

                <div class="d-flex align-items-center d-lg-none">
                    <i class="navbar-icon bi-telephone-plus me-3"></i>
                    <a class="custom-btn btn" href="#section_5">
                        120-240-9600
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Evenments</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Ressources éducatives</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Contact</a>
                        </li>
                    </ul>
                    <?php
                    // Check if user is authenticated as a citizen
                    if (isset($_SESSION['role']) && $_SESSION['role'] === 'citoyen') {
                        // Fetch citizen's name from the database
                        $userId = $_SESSION['user_id'];
                        $query = "SELECT Nom FROM Citoyens WHERE CIN = '$userId'";
                        $result = mysqli_query($conn, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                            $citoyen = mysqli_fetch_assoc($result);
                            $citoyenName = $citoyen['Nom'];
                            echo "<div class='d-lg-flex align-items-center d-none ms-auto' id='div'>";
                            echo $citoyenName;
                            echo "</div>";
                        }
                    } else{
                        echo '<div class="d-lg-flex align-items-center d-none ms-auto" id="div">';
                        echo '    <button onclick="setTimeout(() => { window.location.href=\'../form.php\'; }, 400)" id="signInButton">Sign in</button>';
                        echo '    <button onclick="setTimeout(() => { window.location.href=\'../authentification.php\'; }, 400)" id="logInButton">Loge in</button>';
                        echo '    <div id="buttonBackground"></div>';
                        echo '</div>';

                    }
                    ?>
                    <!-- <div class="d-lg-flex align-items-center d-none ms-auto" id="div">
                        <button onclick="setTimeout(() => { window.location.href='../form.php'; }, 400)" id="signInButton">Sign in</button>
                        <button onclick="setTimeout(() => { window.location.href='../authentification.php'; }, 400)" id="logInButton">Loge in</button>
                        <div id="buttonBackground"></div>
                    </div> -->
                </div>

            </div>
        </nav>

        <main>

            <section class="hero d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7 col-12">
                            <div class="hero-text">
                                <div class="mb-4" id="texthome">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus suscipit id repellat omnis deleniti aliquam excepturi deserunt Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat eaque esse odit impedit veniam quidem iusto delectus et iste nihil.suscipit id repellat omnis deleniti aliquam excepturi deserunt dolorum autem ex voluptatum aliquid nostrum corrupti voluptates, ipsam perferendis ullam quod explicabo accusamus quidem. Id enim commodi voluptates porro, voluptas quisquam doloribus reiciendis minus, voluptate sint, eius accusamus dolore amet voluptatem veniam? Odit nesciunt ipsum velit provident quam mollitia officia atque temporibus eos, cupiditate vitae, voluptatum nemo aliquid minima aperiam corporis quas, exercitationem quidem quod quis? Ratione voluptatem id hic repellendus mollitia a aspernatur, aperiam vero fugit voluptatibus! Aliquam sapiente beatae ab esse! Enim id voluptatibus earum unde provident quidem accusamus praesentium</div>
                                <p class="mb-4"><a class="custom-btn btn custom-link" href="#section_2">Allez</a></p>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 position-relative">
                            <img src="../images/MK.jpeg" id="image1" alt="">
                            <img src="../images/logo4.jpg" id="image2" alt="">
                        </div>

                    </div>
                </div>

            </section>


            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <img src="images/children-cleaning-the-environment-from-garbage-cartoon-vector.jpg" class="about-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <div class="about-thumb">

                                <div class="section-title-wrap d-flex justify-content-end align-items-center mb-4">
                                    <h2 class="text-white me-4 mb-0">About Us</h2>
                                </div>

                                <h3 class="pt-2 mb-3">Pourqoui MedNiss ?</h3>

                                <p>C'est une plateforme pratique et collaborative creer par <a href="https://github.com/aboualine">ABOUALINE MOHAMED</a> et <a href="https://github.com/Nissrineelghammouri">EL GHAMMOURI NISSRINE</a>. pour améliorer la gestion des déchets au niveau local. En combinant des fonctionnalités informatives, participatives et éducatives, ce site aspire à encourager des pratiques durables au sein de la communauté. </p>

                                <p>Si vous rencontrez des problèmes lors de l'utilisation du site web MedNiss, veuillez nous <a href="https://templatemo.com/contact" target="_blank">contacter</a> pour plus d'informations.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="content">
            <h3 class="pt-2 mb-3">Rencontrez notre équipe</h3>
            <div class="cards">
              <div class="card">
                <div class="card__side card__side--front card__side--front-1">
                  <div class="card__description">
                    <p><img class="img-fluid" src="../images/photo.jpg" alt=""></p>
                    <h4 class="card-title">Aboualine Mohamed</h4>
                    <p class="card-text">Developpeur web</p>
                  </div>
                </div>
                <div class="card__side card__side--back card__side--back-1">
                    <div class="card__description">
                        <div class="card-body text-center mt-4">
                            <h4 class="card-title">Aboualine Mohamed</h4>
                            <p class="card-text">This is basic card with image on top, title, description and button.</p>
                            <ul class="list-inline text-center">
                                <li class="list-inline-item">
                                    <a class="social-icon text-xs-center" href="https://github.com/aboualine">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-icon text-xs-center" href="mailto:mohamedaboualine@gmail.com">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-icon text-xs-center" href="https://www.instagram.com/aboualinemohamed/">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card__side card__side--front card__side--front-2">
                  <div class="card__description">
                    <p><img class="img-fluid" src="../images/photo2.jpg" alt=""></p>
                    <h4 class="card-title">El Ghammouri Nissrine</h4>
                    <p class="card-text">Developpeur web</p>
                  </div>
                </div>
                <div class="card__side card__side--back card__side--back-2">
                  <div class="card__description">
                    <div class="card-body text-center mt-4">
                        <h4 class="card-title">El Ghammouri Nissrine</h4>
                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" href="https://github.com/aboualine">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" href="mailto:mohamedaboualine@gmail.com">
                                    <i class="fa fa-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" href="https://www.instagram.com/aboualinemohamed/">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

            <section class="featured section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="profile-thumb">
                                <div class="profile-title">
                                    <h4 class="mb-0">Informations</h4>
                                </div>

                                <div class="profile-body">
                                    <p>
                                        <span class="profile-small-title">Nom</span> 
                                        <span>MedNiss</span>
                                    </p>

                                    <p>
                                        <span class="profile-small-title">Adresse</span> 
                                        <span>Chichaoua, Marrakech-Safi , 40000 ,Maroc</span>
                                    </p>

                                    <p>
                                        <span class="profile-small-title">Tele</span> 
                                         <span><a href="tel: 305-240-9671">+212 628-579626</a></span>
                                    </p>

                                    <p>
                                        <span class="profile-small-title">Email</span> 
                                        <span><a href="mailto:hello@josh.design">mohamedaboualine@gmail.com</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <div class="about-thumb">
                                <div class="row">
                                    <div class="col-lg-6 col-6 featured-border-bottom py-2">
                                        <?php
                                            $sqlpc = "SELECT count(Id_PointCollecte) AS totalpc FROM PointCollecte";
                                            $respc = mysqli_query($conn,$sqlpc);
                                            if(mysqli_num_rows($respc)){
                                                $rowpc = mysqli_fetch_assoc($respc);
                                            }
                                            echo"<strong class='featured-numbers'>".$rowpc['totalpc']."+</strong>";
                                            echo "<p class='featured-text'>Points de collect</p>";
                                            // echo "<div class='counter'>";
                                            //     echo "<h1 class='count' data-target='".$rowpc['totalpc']."'></h1>";
                                            //     echo "<p>Points de collect</p>";
                                            // echo "</div>";
                                        ?>
                                    </div>

                                    <div class="col-lg-6 col-6 featured-border-start featured-border-bottom ps-5 py-2">
                                        <?php
                                            $sqltra = "SELECT count(Id_Trajectoire) AS totaltra FROM Trajectoire";
                                            $restra = mysqli_query($conn,$sqltra);
                                            if(mysqli_num_rows($restra)){
                                                $rowtra = mysqli_fetch_assoc($restra);
                                            }
                                            echo"<strong class='featured-numbers'>".$rowtra['totaltra']."+</strong>";
                                            echo"<p class='featured-text'>Trajectoires</p>";
                                            // echo "<div class='counter'>";
                                            //     echo "<h1 class='count' data-target='".$rowtra['totaltra']."'></h1>";
                                            //     echo "<p>Trajectoires</p>";
                                            // echo "</div>";
                                        ?>

                                    </div>

                                    <div class="col-lg-6 col-6 pt-4">
                                        <?php
                                            $sqlram = "SELECT count(Id_Agent) AS totalram FROM Agent WHERE Poste = 'Agent de nettoyage'";
                                            $resram = mysqli_query($conn,$sqlram);
                                            if(mysqli_num_rows($resram)){
                                                $rowram = mysqli_fetch_assoc($resram);
                                            }
                                            echo"<strong class='featured-numbers'>".$rowram['totalram']."+</strong>";
                                            echo"<p class='featured-text'>Ramaceurs</p>";
                                            // echo "<div class='counter'>";
                                            //     echo "<h1 class='count' data-target='".$rowram['totalram']."'></h1>";
                                            //     echo "<p>Ramaceurs</p>";
                                            // echo "</div>";
                                        ?>
                                        
                                    </div>

                                    <div class="col-lg-6 col-6 featured-border-start ps-5 pt-4">
                                        <?php
                                            $sqlveh = "SELECT count(Id_Vehicule) AS totalveh FROM Vehicule ";
                                            $resveh = mysqli_query($conn,$sqlveh);
                                            if(mysqli_num_rows($resveh)){
                                                $rowveh = mysqli_fetch_assoc($resveh);
                                            }
                                            echo"<strong class='featured-numbers'>".$rowveh['totalveh']."+</strong>";
                                            echo"<p class='featured-text'>Véhicules</p>";
                                            // echo "<div class='counter'>";
                                            //     echo "<h1 class='count' data-target='".$rowveh['totalveh']."'></h1>";
                                            //     echo "<p>Véhicules</p>";
                                            // echo "</div>";
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="clients section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <h3 class="text-center mb-5">Institutions Affiliées</h3>
                        </div>

                        <div class="col-lg-2 col-4 ms-auto clients-item-height">
                            <img src="images/clients/Ministere-De-LEducation-Maroc-2022-Logo-Vector.svg-.png" class="clients-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-2 col-4 clients-item-height">
                            <img src="images/clients/bts.png" class="clients-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-2 col-4 clients-item-height">
                            <img src="images/clients/ltc.jpeg" class="clients-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-2 col-4 clients-item-height">
                            <img src="images/clients/province-chichaoua-ministère-de-lintérieur-logo.png" class="clients-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-2 col-4 me-auto clients-item-height">
                            <img src="images/clients/chichaoua.png" class="clients-image img-fluid" alt="">
                        </div>

                    </div>
                </div>
            </section>


            <section class="services section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                                <h2 class="text-white ms-4 mb-0">Evenements</h2>
                            </div>

                            <!-- <div class="row pt-lg-5">
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
                                            <i class="services-icon bi-globe"></i>
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
                                            <i class="services-icon bi-lightbulb"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
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
                                            <i class="services-icon bi-phone"></i>
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
                                            <i class="services-icon bi-google"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="seclanding">
                            <div id="seclanimgs">
                                <div id="imgplace1" class="imgplace"></div>
                                <div id="imgplace2" class="imgplace"></div>
                                <div id="imgplace3" class="imgplace"></div>
                                <div id="backcolor"></div>
                            </div>
                            <div id="seclantext">
                                <div id="texteventchanging"></div>
                                <button class="form-control" id="btneventvue">voir</button>
                            </div>
                        </div>

                        <!-- liste des fetes -->

                        <div class="col-lg-6 col-12" id="tablefetes">
                            <div class="profile-thumb" id="profile-thumb">
                                <div class="profile-title">
                                    <h4 class="mb-0">Liste des fetes </h4>
                                </div>
                                <div class="profile-body">
                                <?php
                                    $sqlFete = "SELECT NomFete, DATEDIFF(DateFin, DateDebut) + 1 AS NombreJours FROM gestdechcomloc.Fetes";
                                    $resultFete = mysqli_query($conn, $sqlFete);
                                    if (mysqli_num_rows($resultFete) > 0) {
                                        while ($rowFete = mysqli_fetch_assoc($resultFete)) {
                                            echo "<p>";
                                            echo "<span class='profile-small-title'>" . $rowFete["NomFete"] . "</span>";
                                            echo "<span>" . $rowFete["NombreJours"] . "</span>";
                                            echo "</p>";
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>


            <section class="projects section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-md-8 col-12 ms-auto">
                            <div class="section-title-wrap d-flex justify-content-center align-items-center mb-4">
                                <h2 class="text-white ms-4 mb-0">Service</h2>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <!-- <div class="col-lg-4 col-md-6 col-12">
                            <div class="projects-thumb">
                                <div class="projects-info">
                                    <small class="projects-tag">Branding</small>

                                    <h3 class="projects-title">Zoik agency</h3>
                                </div>

                                <a href="images/projects/nikhil-KO4io-eCAXA-unsplash.jpg" class="popup-image">
                                    <img src="images/projects/nikhil-KO4io-eCAXA-unsplash.jpg" class="projects-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="projects-thumb">
                                <div class="projects-info">
                                    <small class="projects-tag">Photography</small>

                                    <h3 class="projects-title">The Watch</h3>
                                </div>

                                <a href="images/projects/the-5th-IQYR7N67dhM-unsplash.jpg" class="popup-image">
                                    <img src="images/projects/the-5th-IQYR7N67dhM-unsplash.jpg" class="projects-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="projects-thumb">
                                <div class="projects-info">
                                    <small class="projects-tag">Website</small>

                                    <h3 class="projects-title">Polo</h3>
                                </div>

                                <a href="images/projects/true-agency-9Bjog5FZ-oc-unsplash.jpg" class="popup-image">
                                    <img src="images/projects/true-agency-9Bjog5FZ-oc-unsplash.jpg" class="projects-image img-fluid" alt="">
                                </a>
                            </div>
                        </div> -->

                        <div class="col-lg-12 col-12">
                            <h3 class="text-center mb-5">Calendrier de Travail</h3>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12" id="CalendrierdeTravail">
                            <!-- <div class="profile-thumb">
                                <div class="profile-body"> -->
                                    
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Equipement</th>
                                                <th>Véhicule</th>
                                                <th>Trajectoire</th>
                                                <th>Quart de travail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>Aucune donnée disponible</td></tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                <!-- </div>
                            </div> -->
                        </div>
                        <pre></pre>
                        <pre></pre>
                        <pre></pre>
                        <pre></pre>
                        <div class="col-lg-12 col-12">
                            <h3 class="text-center mb-5">Map des points de collects et trajectoires available</h3>
                        </div>
                        <pre></pre>
                        <pre></pre>
                        <div id="contmap">
                        <div id="divmap">
                            <?php
                            
                                // Fetch points
                                $sql_points = "SELECT Emplacement, Typee, latitude, longitude FROM PointCollecte";
                                $result_points = $conn->query($sql_points);

                                // Fetch trajectories
                                $sql_trajectories = "SELECT pc.latitude as start_lat, pc.longitude as start_lng, pc2.latitude as end_lat, pc2.longitude as end_lng
                                                    FROM Trajectoire t
                                                    JOIN PointCollecte pc ON t.Id_Trajectoire = pc.Id_Trajectoire
                                                    JOIN PointCollecte pc2 ON t.Id_Trajectoire = pc2.Id_Trajectoire
                                                    WHERE pc.Id_PointCollecte < pc2.Id_PointCollecte";
                                $result_trajectories = $conn->query($sql_trajectories);

                                $points = array();
                                $trajectories = array();

                                if ($result_points->num_rows > 0) {
                                    while ($row = $result_points->fetch_assoc()) {
                                        $points[] = $row;
                                    }
                                }

                                if ($result_trajectories->num_rows > 0) {
                                    while ($row = $result_trajectories->fetch_assoc()) {
                                        $trajectories[] = $row;
                                    }
                                }

                            
                            ?>

                            <div id="map"></div>
                        </div>
                        </div>


                    </div>
                </div>
            </section>

            <section class="services section-padding" id="section_5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                                <h2 class="text-white ms-4 mb-0">Ressources éducatives</h2>
                            </div>

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
                        </div>
                    </div>
                </div>
            </section>

            <section class="clients section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <h3 class="text-center mb-5">Mellieur Commentaires</h3>
                        </div>

                    </div>
                    <div class="wrapper">
                            <div class="carousel">
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
                        </div>
                </div>
            </section>

            <section class="contact section-padding" id="section_6">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                                    <h2 class="text-white ms-4 mb-0">Nous contacter</h2>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-lg-3 col-md-6 col-12 pe-lg-0">
                                <div class="contact-info contact-info-border-start d-flex flex-column">
                                    <strong class="site-footer-title d-block mb-3">Services</strong>

                                    <ul class="footer-menu">
                                        <li class="footer-menu-item"><a href="#CalendrierdeTravail" class="footer-menu-link">Calendrier de Travail</a></li>

                                        <li class="footer-menu-item"><a href="#map" class="footer-menu-link">Map</a></li>
                                    </ul>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Suivez-nous</strong>

                                    <ul class="social-icon">
                                        <li class="social-icon-item"><a href="https://twitter.com/minthu" class="social-icon-link bi-twitter"></a></li>

                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-instagram"></a></li>

                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>

                                        <li class="social-icon-item"><a href="https://www.youtube.com/templatemo" class="social-icon-link bi-youtube"></a></li>
                                    </ul>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Sauvez votre environnement</strong>

                                    <p class="mb-0">Chaque geste compte pour préserver notre ville. Recyclez, réduisez les déchets et utilisez des produits durables.</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12 ps-lg-0">
                                <div class="contact-info d-flex flex-column">
                                    <strong class="site-footer-title d-block mb-3">About</strong>

                                    <p class="mb-2">
                                        plateforme pratique et collaborative creer par ABOUALINE MOHAMED et EL GHAMMOURI NISSRINE. pour améliorer la gestion des déchets au niveau local.
                                    </p>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Email</strong>

                                    <p>
                                        <a href="mailto:mohamedaboualine@gmail.com">
                                            mohamedaboualine@gmail.com
                                        </a>
                                    </p>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Appel</strong>

                                    <p class="mb-0">
                                        <a href="tel: +212 628-579626">
                                            +212 628-579626
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                                <form action="#" method="get" class="custom-form contact-form" role="form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                                                
                                                <label for="floatingInput">Nom</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-floating">
                                                <input type="text" name="cin" id="cin" class="form-control" placeholder="CIN" required="">
                                                
                                                <label for="floatingInput">CIN</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12"> 
                                            <div class="form-floating">
                                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                                
                                                <label for="floatingInput">Email</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-floating">
                                                <input type="text" name="titre" id="titre" class="form-control" placeholder="Titre" required="">
                                                
                                                <label for="floatingInput">Titre</label>
                                            </div>
                                        </div>



                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline">
                                                <input name="Reclamation" type="checkbox" class="form-check-input" id="inlineCheckbox1" value="Reclamation">

                                                <label class="form-check-label" for="inlineCheckbox1">
                                                    <i class="bi-globe form-check-icon"></i>
                                                    <span class="form-check-label-text">Reclamation</span>
                                                </label>
                                          </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline">
                                                <input name="Commentaire" type="checkbox" class="form-check-input" id="inlineCheckbox2" value="Commentaire">

                                                <label class="form-check-label" for="inlineCheckbox2">
                                                    <i class="bi-lightbulb form-check-icon"></i>
                                                    <span class="form-check-label-text">Commentaire</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline">
                                                <input name="Question" type="checkbox" class="form-check-input" id="inlineCheckbox3" value="Question">

                                                <label class="form-check-label" for="inlineCheckbox3">
                                                    <i class="bi-phone form-check-icon"></i>
                                                    <span class="form-check-label-text">Question</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline me-0">
                                                <input name="Suggestion" type="checkbox" class="form-check-input" id="inlineCheckbox4" value="Suggestion">

                                                <label class="form-check-label" for="inlineCheckbox4">
                                                    <i class="bi-google form-check-icon"></i>
                                                    <span class="form-check-label-text">Suggestion</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>
                                                
                                                <label for="floatingTextarea">Parlez-nous de ce à quoi vous pensez</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-12 ms-auto">
                                            <button type="submit" name="subrec" class="form-control">Envoier</button>
                                        </div>

                                    </div>
                                </form>
                                <?php
                                    if(isset($_GET['subrec'])) {
                                        // Retrieve form data
                                        $name = $_GET['name'];
                                        $cin = $_GET['cin'];
                                        $email = $_GET['email'];
                                        $titre = $_GET['titre'];
                                        $message = $_GET['message'];
                                        
                                        // Concatenate selected reclamation types into a comma-separated string
                                        $reclamationTypes = isset($_GET['Reclamation']) ? $_GET['Reclamation'] : array();
                                        $reclamationTypeStr = implode(',', $reclamationTypes);
                                        
                                        // Automatically generate Id_Reclamation (auto-incremented) and Date_de_Publication (current date)
                                        $sql = "INSERT INTO Reclamation (Titre, Descriptionn, CIN, Type_Reclamation)
                                                VALUES ('$titre', '$message', '$cin', '$reclamationTypeStr')";
                                        $res = mysqli_query($conn,$sql);
                                        
                                    }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <!-- <div class="container">
                <div class="row"> -->

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
                                <a href="#section_1" >
                                    <div>
                                    Home 
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="#section_2">
                                    <div>
                                    About
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="#section_3">
                                    <div>
                                    Evenements
                                    </div>
                                </a>
                                </li>
                                <li >
                                <a href="#section_4">
                                    <div>
                                    Services
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="#section_5">
                                    <div>
                                    Ressources educatives
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="#section_6">
                                    <div>
                                    Contacte
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
                                    $sqladmin = "SELECT * FROM Adminstration";
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

                <!-- </div>
            </div> -->
        </footer>

        <!-- JAVASCRIPT FICHIERS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            // Data from PHP
            var points = <?php echo json_encode($points); ?>;
            var trajectories = <?php echo json_encode($trajectories); ?>;

            // Initialize map
            var map = L.map('map').setView([0, 0], 2);

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            // Add points to map
            points.forEach(function(point) {
                L.marker([point.latitude, point.longitude]).addTo(map)
                    .bindPopup(point.Emplacement + " (" + point.Typee + ")");
            });

            // Add trajectories to map
            trajectories.forEach(function(traj) {
                var start = [traj.start_lat, traj.start_lng];
                var end = [traj.end_lat, traj.end_lng];
                L.polyline([start, end], {color: 'blue'}).addTo(map);
            });
        </script>
        <!-- <script src="js/script.js"></script> -->
        <!-- <script src="script.js"></script> -->
    </body>
</html>