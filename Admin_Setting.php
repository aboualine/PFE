<?php
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
    <link rel="stylesheet" href="css/styleadmin.css">
</head>
<body>
    <!-- Navbar -->


    <!-- <nav id="navbar">
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
    </nav> -->



    <fieldset>
        <legend>Departement</legend>
        <form action="" method="post">
            <label for="nomdep">Nom Departement : </label><br>
            <input type="text" id="nom" name="nomdep" required><br>
            <input type="submit" name="submitD" id="but" value="Submit">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['submitD'])){
            $departement = $_POST['nomdep'];
            $sqld = "INSERT INTO Departement (Nom) 
                     VALUES ('$departement')";
            $resd = mysqli_query($conn,$sqld);
        }
    ?>

    <form action="" method="post">
        <fieldset>
            <legend>Post</legend>
            <label for="nompost">Nom Post : </label><br>
            <input type="text" id="nom" name="nompost" required><br>
            <label for="iddep">Id Departement : </label><br>
            <input type="text" id="idd" name="iddep" required><br>
            <input type="submit" name="submitP" id="but" value="Submit">
        </fieldset>
    </form>
    <?php
        if(isset($_POST['submitP'])){
            $post = $_POST['nompost'];
            $iddepart = $_POST['iddep'];
            $sqlp = "INSERT INTO Post (Nom,Id_Departement) 
                     VALUES ('$post',$iddepart)";
            $resp = mysqli_query($conn,$sqlp);
        }
    ?>

    <fieldset>
        <legend>Ajouter Agent</legend>
        <form action="" method="post" id="departmentForm">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Prenom:</label><br>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="depa">Departement:</label><br>
            <select name = "depa" id="depaSelect" >
                <option value="">Selectionner une departement</option>
                <?php 
                    $sqldd = "SELECT Id_Departement, Nom FROM Departement";
                    $resdd = mysqli_query($conn,$sqldd);
                    if(mysqli_num_rows($resdd)){
                        while($lignedep = mysqli_fetch_assoc($resdd)){
                            echo "<option value='".$lignedep['Id_Departement']."'>".$lignedep['Nom']."</option>";
                        }
                    }
                ?>
                </select><br>
            <label for="posta">Post:</label><br>
            <select name = "posta" id="postaSelect">
            </select><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="tel">Tel:</label><br>
            <input type="text" id="tel" name="tel" required><br>
            <label for="mot_de_passe">Mot de Passe:</label><br>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
            <input type="submit" name="submitA" id="but" value="Submit">
        </form>
    </fieldset>
    <?php
        //autre ajout
        if(isset($_POST['submitA'])){
  
            if(null !==($depa = $_POST['depa'])){
                $sqldepdep = "SELECT Nom FROM Departement WHERE Id_Departement = $depa ";
                $resdepdep = mysqli_query($conn,$sqldepdep);
                $rowdepdep = mysqli_fetch_assoc($resdepdep);  
                        $noma = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        // $departementname = $rowdepdep["Nom"];
                        $postname = $_POST['posta'];

                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $motpass = $_POST['mot_de_passe'];
            
                        $sqla = "INSERT INTO Agent (Nom ,Prenom  ,Poste ,Email ,Tel ,Mot_de_Passe) 
                                VALUES ('$noma' ,'$prenom' ,'$postname' ,'$email' ,'$tel' ,'$motpass')";
                         
                        $resa = mysqli_query($conn,$sqla);
                    

                }
        }
    ?>

    <fieldset>
        <legend>gestion des horaires</legend>
        <form action="" method="post">
            <label for="equipementname">Equipe :</label>
            <select name="equipementname" id="equipementname">
                <?php
                    $sqleq = "SELECT Id_equipement, Nom FROM Equipement";
                    $reseq = mysqli_query($conn, $sqleq);
                    if(mysqli_num_rows($reseq)){
                        while($ligneequipement = mysqli_fetch_assoc($reseq)){
                            echo "<option value='".$ligneequipement['Id_equipement']."'>".$ligneequipement['Nom']."</option>";
                        }
                    }
                ?>
            </select><br>

            <label for="quart">Quart de travail:</label>
            <select name="quart" id="quart">
                <option value="matin">matin</option>
                <option value="apres-midi">soir</option>
                <option value="soir">nuit</option>
            </select><br>

            <input type="submit" name="subtraithor" value="Valider">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['subtraithor'])){
            $equipementname = $_POST['equipementname'];
            $quart = $_POST['quart'];
            switch($quart) {
                case "matin":
                    $heure_travail = "08:00 - 12:00";
                    $pause = "12:00 - 13:00";
                    break;
                case "soir":
                    $heure_travail = "13:00 - 17:00";
                    $pause = "17:00 - 18:00";
                    break;
                case "nuit":
                    $heure_travail = "18:00 - 22:00";
                    $pause = "22:00 - 23:00";
                    break;
                default:
                    break;
            }
            $sqltraithor = "INSERT INTO HorairesTravail (Id_Equipement, Quart_de_travail, Heure_travail, Pausee) 
                            VALUES ('$equipementname', '$quart', '$heure_travail', '$pause')";
            
            if (mysqli_query($conn, $sqltraithor)) {
                echo "Horaire de travail ajouté avec succès.";
            }
        }
    ?>

    <fieldset>
        <legend>Ajouter des vacances </legend>
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
        if (isset($_POST['subvacance'])) {
            $holidayName = $_POST['holiday_name'];
            $holidayStartDate = $_POST['holiday_debut'];
            $holidayEndDate = $_POST['holiday_fin'];
            $agentId = isset($_POST['agent_id']) ? $_POST['agent_id'] : null;
            $startDate = strtotime($holidayStartDate);
            $endDate = strtotime($holidayEndDate);
            $duration = ($endDate - $startDate) / (60 * 60 * 24);
            if ($duration >= 1 && $duration <= 3) {
                $sqlvacance = "INSERT INTO Vacances (NomVacance, DateDebutVacance, DateFinVacance, Id_Agent)
                               VALUES ('$holidayName', '$holidayStartDate', '$holidayEndDate', '$agentId')";
                $resvacance = mysqli_query($conn,$sqlvacance);
                if ($resvacance) {
                    echo "La vacance a été ajoutée avec succès.";
                }
            }
            else {
                echo "La durée des vacances doit être entre 1 et 3 jours.";
            }
        }
    ?>

    <fieldset>
        <legend>Ajouter des Fêtes </legend>
        <form action="" method="post" enctype="Multipart/form-data">
            <label for="Fete_name">Nom de Fête:</label>
            <input type="text" id="Fete_name" name="Fete_name" required><br>
            <label for="Fete_debut">Date debut de la Fête:</label>
            <input type="date" id="Fete_debut" name="Fete_debut" required><br>
            <label for="Fete_fin">Date fin de la Fête:</label>
            <input type="date" id="Fete_fin" name="Fete_fin" required><br>
            <button type="submit" name="subFete">Ajouter</button>
        </form>
    </fieldset>
    <?php
        if (isset($_POST['subFete'])) {
            $feteName = $_POST['Fete_name'];
            $feteStartDate = $_POST['Fete_debut'];
            $feteEndDate = $_POST['Fete_fin'];
            $feteImg = $_POST['Fete_img'];
            $sqlFete = "INSERT INTO gestdechcomloc.Fetes (NomFete, DateDebut, DateFin)
                        VALUES ('$feteName', '$feteStartDate', '$feteEndDate','$feteImg')";
            $resFete = mysqli_query($conn, $sqlFete);
        }
    ?>

    <fieldset>
        <legend>Ajouter des Equipements </legend>
        <form action="" method="post">
            <label for="NomEquipement">Nom d'equipement:</label>
            <input type="text" id="NomEquipement" name="NomEquipement" required><br>
            <label for="Descriptionnequip">Descriptionn (optionnel):</label>
            <input type="text" id="Descriptionnequip" name="Descriptionnequip"><br>
            <button type="submit" name="subEquipement">Ajouter</button>
        </form>
    </fieldset>
    <?php
        if (isset($_POST['subEquipement'])) {
            $NomEquipement = $_POST['NomEquipement'];
            $Descriptionnequip = isset($_POST['Descriptionnequip']) ? $_POST['Descriptionnequip'] : null;;
            $sqlAjoutEquip = "INSERT INTO Equipement (Nom, Descriptionn)
                              VALUES ('$NomEquipement', '$Descriptionnequip')";
            $resAjoutEquip = mysqli_query($conn, $sqlAjoutEquip);
        }
    ?>

    <fieldset>
        <legend>Ajoutes les ramaceurs a des equipment </legend>
        <form method="post" action="">
            <label for="agentfullname">Agent:</label>
            <select name="agentfullname" id="agentfullname">
                <option value="">Selectionner un Agent</option>
                <?php
                    $sqlfullagent = "SELECT Id_Agent, CONCAT(Nom, ' ', Prenom) AS AgentFullName FROM Agent WHERE Poste = 'Agent de nettoyage'";
                    $resultfullagent = mysqli_query($conn, $sqlfullagent);
                    if(mysqli_num_rows($resultfullagent)){
                        while ($rowfull = mysqli_fetch_assoc($resultfullagent)) {
                            echo "<option value='{$rowfull['Id_Agent']}'>{$rowfull['AgentFullName']}</option>";
                        }
                    }
                ?>
            </select><br>
            <label for="equipment">Selectionner un Equipment:</label>
            <select name="equipment" id="equipment">
            <option value="">Selectionner une Equip</option>
                <?php
                    $sqlequipement = "SELECT Id_equipement, Nom FROM Equipement";
                    $resultequipement = mysqli_query($conn,$sqlequipement);
                    while ($rowequipement = mysqli_fetch_assoc($resultequipement)) {
                        echo "<option value='{$rowequipement['Id_equipement']}'>{$rowequipement['Nom']}</option>";
                    }
                ?>
            </select><br>
            <input type="submit" name="subagenttoequi" value="Assign Agent to Equipment">
        </form>
    </fieldset>
    <?php
        if (isset($_POST['subagenttoequi'])) {
            $agentId = $_POST['agentfullname'];
            $equipmentId = $_POST['equipment'];

            $sqlfullagent = "SELECT Id_Agent, CONCAT(Nom, ' ', Prenom) AS AgentFullName FROM Agent WHERE Poste = 'Agent de nettoyage'";
            $resultfullagent = mysqli_query($conn, $sqlfullagent);
            $rowfull = mysqli_fetch_assoc($resultfullagent);

            $nomagentequip = $rowfull['AgentFullName'];

            $sqlCheckExisting = "SELECT Id_Equipement FROM Agent_Equipement WHERE Id_Agent = $agentId";
            $resultCheckExisting = mysqli_query($conn, $sqlCheckExisting);
            if (mysqli_num_rows($resultCheckExisting)) {
                echo "L'agent est déjà associé à un équipement. Veuillez le retirer de l'équipement existant avant de le réaffecter.";
            }
            else{
            $sqlAjoutagentEquip = "INSERT INTO Agent_Equipement (Id_Agent, Id_Equipement, Agent_Name)
                                   VALUES ('$agentId', '$equipmentId', '$nomagentequip')";
            
            $resAjoutagentEquip = mysqli_query($conn, $sqlAjoutagentEquip);
            if ($resAjoutagentEquip) {
                echo "L'agent' a été ajoutée a l'equipement avec succès.";
            }
            }
        }
    ?>

    <fieldset>
        <legend>véhicules</legend>
        <form action="" method="post">
            <label for="marque">Marque :</label><br>
            <input type="text" id="marque" name="marque" required><br>
            
            <label for="modele">Modèle :</label><br>
            <input type="text" id="modele" name="modele" required><br>
            
            <label for="annee">Année :</label><br>
            <input type="date" id="annee" name="annee"><br>
            
            <label for="statut">Statut :</label><br>
            <select id="statut" name="statut">
                <option value="1">Actif</option>
                <option value="0">Inactif</option>
            </select><br>
            
            <input type="submit" name="ajoutervehicule" value="Soumettre">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['ajoutervehicule'])) {
            // Récupérer les valeurs du formulaire
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            $statut = $_POST['statut'];
        
            // Préparer la requête SQL d'insertion
            $sqlvehicule = "INSERT INTO Vehicule (Marque, Modele, Annee, Statut) 
                    VALUES ('$marque', '$modele', '$annee', '$statut')";
            $resvehicule = mysqli_query($conn, $sqlvehicule);
            if ($resvehicule) {
                echo "Véhicule ajouté avec succès.";
            }
        }
    ?>

    <fieldset>
    <legend>Ajouter Trajectoire</legend>
        <form action="" method="post">
            <label for="debut">Début :</label><br>
            <input type="text" id="debut" name="debut" required><br>
            
            <label for="fin">Fin :</label><br>
            <input type="text" id="fin" name="fin" required><br>
            
            <label for="description">Description :</label><br>
            <input type="text" id="description" name="description"><br>
            
            <input type="submit" name="ajouter_trajectoire" value="Ajouter Trajectoire">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['ajouter_trajectoire'])) {
            // Récupérer les valeurs du formulaire
            $debut = $_POST['debut'];
            $fin = $_POST['fin'];
            $description = $_POST['description'];
        
            // Préparer la requête SQL d'insertion
            $sqltrajectoire = "INSERT INTO Trajectoire (Debut, Fin, Descriptionn) 
                    VALUES ('$debut', '$fin', '$description')";
            $restrajectoire = mysqli_query($conn ,$sqltrajectoire);
            if ($restrajectoire) {
                echo "Trajectoire ajoutée avec succès.";
            }
        }
    ?>

    <fieldset>
    <legend>Ajouter Point de Collecte</legend>
        <form action="" method="post">
            <label for="emplacement">Emplacement :</label><br>
            <input type="text" id="emplacement" name="emplacement" required><br>
            
            <label for="typepoint">Type :</label><br>
            <select name="typepoint" id="typepoint">
                <option value="Petite">Petite</option>
                <option value="Moyenne">Moyenne</option>
                <option value="Grande">Grande</option>
                <option value="Non ordinaire">Non ordinaire</option>
            </select><br>
            
            <label for="capacite">Capacité :</label><br>
            <input type="number" id="capacite" name="capacite" required><br>
            
            <label for="id_trajectoire">ID Trajectoire :</label><br>
            <input type="number" id="id_trajectoire" name="id_trajectoire" required><br>
            
            <input type="submit" name="ajouter_point_collecte" value="Ajouter Point de Collecte">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['ajouter_point_collecte'])) {
            $emplacement = $_POST['emplacement'];
            $type = $_POST['typepoint'];
            $capacite = $_POST['capacite'];
            $id_trajectoire = $_POST['id_trajectoire'];
        
            $sqlpoint = "INSERT INTO PointCollecte (Emplacement, Typee, Capacite, Id_Trajectoire) 
                    VALUES ('$emplacement', '$type', '$capacite', '$id_trajectoire')";
        
            $respoint = mysqli_query($conn ,$sqlpoint);
            if ($respoint) {
                echo "Point de collecte ajouté avec succès.";
            }
        }
    ?>

    <fieldset>
        <legend>Ajouter Calendrier de Travail</legend>
        <form action="" method="post">
            <label for="equipementchoix">Équipement :</label><br>
            <select id="equipementchoix" name="equipementchoix" required>
                <?php
                $sql_equipement = "SELECT Id_equipement, Nom FROM Equipement";
                $result_equipement = mysqli_query($conn, $sql_equipement);

                while ($row_equipement = mysqli_fetch_assoc($result_equipement)) {
                    echo "<option value='" . $row_equipement['Id_equipement'] . "'>" . $row_equipement['Nom'] . "</option>";
                }
                ?>
            </select><br>

            <label for="vehiculechoix">Véhicule associé :</label><br>
            <select id="vehiculechoix" name="vehiculechoix" required>
                <?php
                $sql_vehicle = "SELECT Id_Vehicule, CONCAT(Marque, ' ', Modele) AS VehiculeName FROM Vehicule";
                $result_vehicle = mysqli_query($conn, $sql_vehicle);

                while ($row_vehicle = mysqli_fetch_assoc($result_vehicle)) {
                    echo "<option value='" . $row_vehicle['Id_Vehicule'] . "'>" . $row_vehicle['VehiculeName'] . "</option>";
                }
                ?>
            </select><br>

            <label for="trajectoirechoix">Trajectoire associée :</label><br>
            <select id="trajectoirechoix" name="trajectoirechoix" required>
                <?php
                $sql_trajectory = "SELECT Id_Trajectoire, CONCAT(Debut, ' - ', Fin) AS TrajectoireName FROM Trajectoire";
                $result_trajectory = mysqli_query($conn, $sql_trajectory);

                while ($row_trajectory = mysqli_fetch_assoc($result_trajectory)) {
                    echo "<option value='" . $row_trajectory['Id_Trajectoire'] . "'>" . $row_trajectory['TrajectoireName'] . "</option>";
                }
                ?>
            </select><br>

            <label for="horaireschoix">Horaires de Travail :</label><br>
            <select id="horaireschoix" name="horaireschoix" required>
                <?php
                $sql_horaires = "SELECT Id_Horaire, CONCAT(Quart_de_travail, ' - ', Heure_travail) AS HoraireName FROM HorairesTravail";
                $result_horaires = mysqli_query($conn, $sql_horaires);

                while ($row_horaires = mysqli_fetch_assoc($result_horaires)) {
                    echo "<option value='" . $row_horaires['Id_Horaire'] . "'>" . $row_horaires['HoraireName'] . "</option>";
                }
                ?>
            </select><br>

            <label for="date_debut">Date de début :</label><br>
            <input type="date" id="date_debut" name="date_debut" required><br>

            <input type="submit" name="ajouter_calendrier" value="Ajouter Calendrier">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['ajouter_calendrier'])) {
            $equipement_id = $_POST['equipementchoix'];
            $vehicule_id = $_POST['vehiculechoix']; 
            $trajectoire_id = $_POST['trajectoirechoix']; 
            $horaire_id = $_POST['horaireschoix']; 
            $date_debut = $_POST['date_debut']; 

            $equipement_nom = "";
            $vehicule_marque = "";
            $vehicule_modele = "";
            $quart_de_travail = "";

            $sql_equipement = "SELECT Nom FROM Equipement WHERE Id_equipement = $equipement_id";
            $result_equipement = mysqli_query($conn, $sql_equipement);
            if ($result_equipement && mysqli_num_rows($result_equipement) > 0) {
                $row_equipement = mysqli_fetch_assoc($result_equipement);
                $equipement_nom = $row_equipement['Nom'];
            }

            $sql_vehicule = "SELECT Marque, Modele FROM Vehicule WHERE Id_Vehicule = $vehicule_id";
            $result_vehicule = mysqli_query($conn, $sql_vehicule);
            if ($result_vehicule && mysqli_num_rows($result_vehicule) > 0) {
                $row_vehicule = mysqli_fetch_assoc($result_vehicule);
                $vehicule_marque = $row_vehicule['Marque'];
                $vehicule_modele = $row_vehicule['Modele'];
            }

            $sql_horaires = "SELECT Quart_de_travail FROM HorairesTravail WHERE Id_Horaire = $horaire_id";
            $result_horaires = mysqli_query($conn, $sql_horaires);
            if ($result_horaires && mysqli_num_rows($result_horaires) > 0) {
                $row_horaires = mysqli_fetch_assoc($result_horaires);
                $quart_de_travail = $row_horaires['Quart_de_travail'];
            }

            $sql = "INSERT INTO CalendrieDeTravail (Equipement_Nom, Vehicule_Marque, Vehicule_Modele, Quart_de_travail, Id_Equipement, Id_Vehicule, Id_Trajectoire, Id_Horaire, Date_debut) 
                    VALUES ('$equipement_nom', '$vehicule_marque', '$vehicule_modele', '$quart_de_travail', '$equipement_id', '$vehicule_id', '$trajectoire_id', '$horaire_id', '$date_debut')";
            
            if (mysqli_query($conn, $sql)) {
                echo "Les données ont été insérées avec succès.";
            } else {
                echo "Erreur: " . mysqli_error($conn);
            }
        }
    ?>

    <fieldset>
        <legend>reclamation reponse</legend>
        <form action="" method="post">
            <label for="titrereponse">Titre :</label><br>
            <input type="text" name="titrereponse">
            <label for="admin_response">Description :</label><br>
            <textarea id="admin_response" name="admin_response" rows="4" required></textarea><br>

            <input type="hidden" name="agent_id" value="<?php echo $agent_id; ?>">
            <input type="file" accept="image/*" id="Annonce_img" name="Annonce_img" required><br>
            <input type="submit" name="submit_response" value="Submit Response">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['submit_response'])) {
            $titre = $_POST['titrereponse'];
            $response = $_POST['admin_response'];
            $annonce_date = date('Y-m-d');
            $agent_id = "5";
            $annonce_img = $_POST['Annonce_img'];
            $sqlreprec = "INSERT INTO Annonce (Titre, Descriptionn, Date_de_Publication, Id_Agent) 
                          VALUES ('$titre', '$response', '$annonce_date', $agent_id ,'$annonce_img')";
            $resreprec = mysqli_query($conn, $sqlreprec);
            if($resreprec) {
                echo "Response added successfully.";
            }
            $companyName = 'MedNiss';
            $logoPath = 'images/logofinal.png'; 
        
            generatePDF($response, $companyName, $logoPath);
        }
    ?>

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
</body>
</html>