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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

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

                <a href="index.html" class="navbar-brand mx-auto mx-lg-0"><img src="../images/logofinal.png" alt="" id="navlogo"></a>

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
                            <a class="nav-link click-scroll" href="#section_3">Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Projects</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Contact</a>
                        </li>
                    </ul>

                    <div class="d-lg-flex align-items-center d-none ms-auto" id="div">
                        <button onclick="setTimeout(() => { window.location.href='../form.php'; }, 400)" id="signInButton">Sign in</button>
                        <button onclick="setTimeout(() => { window.location.href='../authentification.php'; }, 400)" id="logInButton">Loge in</button>
                        <div id="buttonBackground"></div>
                    </div>
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
                                <img src="images/handshake-man-woman-after-signing-business-contract-closeup.jpg" class="avatar-image img-fluid" alt="">

                                <h2 class="text-white ms-4 mb-0">Services</h2>
                            </div>

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
                                <img src="images/white-desk-work-study-aesthetics.jpg" class="avatar-image img-fluid" alt="">

                                <h2 class="text-white ms-4 mb-0">Projects</h2>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-4 col-md-6 col-12">
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
                        </div>

                    </div>
                </div>
            </section>

            <section class="contact section-padding" id="section_5">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                                    <img src="images/aerial-view-man-using-computer-laptop-wooden-table.jpg" class="avatar-image img-fluid" alt="">

                                    <h2 class="text-white ms-4 mb-0">Say Hi</h2>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-lg-3 col-md-6 col-12 pe-lg-0">
                                <div class="contact-info contact-info-border-start d-flex flex-column">
                                    <strong class="site-footer-title d-block mb-3">Services</strong>

                                    <ul class="footer-menu">
                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Websites</a></li>

                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Branding</a></li>

                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Ecommerce</a></li>

                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">SEO</a></li>
                                    </ul>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Stay connected</strong>

                                    <ul class="social-icon">
                                        <li class="social-icon-item"><a href="https://twitter.com/minthu" class="social-icon-link bi-twitter"></a></li>

                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-instagram"></a></li>

                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>

                                        <li class="social-icon-item"><a href="https://www.youtube.com/templatemo" class="social-icon-link bi-youtube"></a></li>
                                    </ul>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Start a project</strong>

                                    <p class="mb-0">I’m available for freelance projects</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12 ps-lg-0">
                                <div class="contact-info d-flex flex-column">
                                    <strong class="site-footer-title d-block mb-3">About</strong>

                                    <p class="mb-2">
                                        Joshua is a professional web developer. Feel free to get in touch with me.
                              </p>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Email</strong>

                                    <p>
                                        <a href="mailto:hello@josh.design">
                                            hello@josh.design
                                        </a>
                                    </p>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Call</strong>

                                    <p class="mb-0">
                                        <a href="tel: 120-240-9600">
                                            120-240-9600
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
                                                
                                                <label for="floatingInput">Name</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12"> 
                                            <div class="form-floating">
                                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                                
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline">
                                                <input name="website" type="checkbox" class="form-check-input" id="inlineCheckbox1" value="1">

                                                <label class="form-check-label" for="inlineCheckbox1">
                                                    <i class="bi-globe form-check-icon"></i>
                                                    <span class="form-check-label-text">Websites</span>
                                                </label>
                                          </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline">
                                                <input name="branding" type="checkbox" class="form-check-input" id="inlineCheckbox2" value="1">

                                                <label class="form-check-label" for="inlineCheckbox2">
                                                    <i class="bi-lightbulb form-check-icon"></i>
                                                    <span class="form-check-label-text">Branding</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline">
                                                <input name="ecommerce" type="checkbox" class="form-check-input" id="inlineCheckbox3" value="1">

                                                <label class="form-check-label" for="inlineCheckbox3">
                                                    <i class="bi-phone form-check-icon"></i>
                                                    <span class="form-check-label-text">Ecommerce</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-check form-check-inline me-0">
                                                <input name="seo" type="checkbox" class="form-check-input" id="inlineCheckbox4" value="1">

                                                <label class="form-check-label" for="inlineCheckbox4">
                                                    <i class="bi-google form-check-icon"></i>
                                                    <span class="form-check-label-text">SEO</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>
                                                
                                                <label for="floatingTextarea">Tell me about the project</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-12 ms-auto">
                                            <button type="submit" class="form-control">Send</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="copyright-text-wrap">
                            <p class="mb-0">
                                <span class="copyright-text">Copyright © 2036 <a href="#">First Portfolio</a> Company. All rights reserved.</span>
                                Design: 
                                <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
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

    </body>
</html>