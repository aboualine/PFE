<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration dashboard</title>
    <style>
        h1{
            font-size: 200px;
            text-align: center;
        }
        table{
            border:1px solid black;
            text-align: center;
        }
        td{
            border:1px solid black;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "0689102695mohamedaboualinedimaraja";
        $database = "gestdechcomloc";
        $conn = new mysqli($servername, $username, $password, $database);
    ?>
    <h1>HELLO ADMIN</h1>
    <fieldset>
        <legend>Departement</legend>
        <form action="" method="post">
            <label for="nomdep">Nom Departement : </label><br>
            <input type="text" id="nom" name="nomdep" required><br>
            <input type="submit" name="submitD" id="but" value="Submit">
        </form>
    </fieldset>

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
        if(isset($_POST['submitD'])){
            $departement = $_POST['nomdep'];
            $sqld = "INSERT INTO Departement (Nom) 
                     VALUES ('$departement')";
            $resd = mysqli_query($conn,$sqld);
        }
        //autre ajout
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
    <h3>Post</h3>
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
    <h4>Agents</h4>
    <table>
        <tr>
            <td>Id Post</td>
            <td>Nom</td>
            <td>Prenom</td>
            <!-- <th>Departement</th> -->
            <td>Post</td>
            <td>Email</td>
            <td>Tel</td>
            <td>Mot de Passe</td>
            <td>Action</td>
        </tr>

        <?php
            $sqlpost = "SELECT * FROM gestdechcomloc.agent";
            $resultpost = mysqli_query($conn,$sqlpost);
            if (mysqli_num_rows($resultpost)) {
                while($rowa = mysqli_fetch_assoc($resultpost)) {
                    echo "<tr>";
                    echo "<td>" . $rowa["Id_Agent"] . "</td>";
                    echo "<td>" . $rowa["Nom"] . "</td>";
                    echo "<td>" . $rowa["Prenom"] . "</td>";
                    // echo "<td>" . $rowa["Departement"] . "</td>";
                    echo "<td>" . $rowa["Poste"] . "</td>";
                    echo "<td>" . $rowa["Email"] . "</td>";
                    echo "<td>" . $rowa["Tel"] . "</td>";
                    echo "<td>" . $rowa["Mot_de_Passe"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='idagenthidd' value='" . $rowa["Id_Agent"] . "'>";
                    echo "<button type='submit' name='deleteagent'>Supprimer</button>";
                    echo "<button type='submit' name='updatagent'>Modifier</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
            }
            if (isset($_POST['deleteagent'])) {
                if (isset($_POST['idagenthidd']) && !empty($_POST['idagenthidd'])) {
                    $idagentdelet = mysqli_real_escape_string($conn, $_POST['idagenthidd']);                    
                    $sqlagentdelet = "DELETE FROM Agent WHERE Id_Agent = '$idagentdelet'";
                    if (mysqli_query($conn, $sqlagentdelet)) {
                        echo "Record deleted successfully";
                    }
                }
            }
        ?>
    </table>
    <fieldset>
        <legend>gestion des horaires</legend>
        <form action="" method="post">
            <label for="agentname">Agent:</label>
            <select name="agentnames" id="agentname">
                <?php
                    $sqlag = "SELECT Id_Agent, Nom FROM Agent";
                    $resag = mysqli_query($conn,$sqlag);
                    if(mysqli_num_rows($resag)){
                        while($ligneagent = mysqli_fetch_assoc($resag)){
                            echo "<option value='".$ligneagent['Id_Agent']."'>".$ligneagent['Nom']."</option>";
                        }
                    }
                ?>
            </select><br>

            <label for="jour">Jour de la semaine:</label>
            <select name="jour" id="jour">
                <option value="lundi">Lundi</option>
                <option value="mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
                <option value="Samedi">Samedi</option>
                <option value="Dimanche">Dimanche</option>
            </select><br>

            <label for="quart">Quart de travail:</label>
            <select name="quart" id="quart">
                <option value="matin">Matin</option>
                <option value="apres-midi">Après-midi</option>
                <option value="soir">Soir</option>
            </select><br>

            <label for="date_debut">Date de début:</label>
            <input type="date" id="date_debut" name="date_debut"><br>

            <label for="date_fin">Date de fin:</label>
            <input type="date" id="date_fin" name="date_fin"><br>

            <input type="submit" name="subtraithor" value="Valider">
        </form>
    </fieldset>
    
    <?php
        if(isset($_POST['subtraithor'])){
            $agentnames = $_POST['agentnames'];
            $jour = $_POST['jour'];
            $quart = $_POST['quart'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];        
            $sqltraithor = "INSERT INTO HorairesTravail (Id_Agent, Jour_semaine, Quart_de_travail, Date_debut, Date_fin) 
                            VALUES ('$agentnames', '$jour', '$quart', '$date_debut', '$date_fin')";
            
            if (mysqli_query($conn, $sqltraithor)) {
                echo "Horaire de travail ajouté avec succès.";
            }
        }
    ?>
    <h4>Liste des horaires de travail :</h4>
    <table>
        <tr>
            <td>Id Horaire</td>
            <td>Id Agent</td>
            <td>Jour de la semaine</td>
            <td>Quart de travail</td>
            <td>Date de début</td>
            <td>Date de fin</td>
        </tr>
    <?php
        $sqltime = "SELECT * FROM HorairesTravail";
        $sqltimeres = mysqli_query($conn,$sqltime);
        if(mysqli_num_rows($sqltimeres)){
            while($lignetime = mysqli_fetch_assoc($sqltimeres)){
                echo "<tr>";
                echo "<td>" . $lignetime["Id_Horaire"] . "</td>";
                echo "<td>" . $lignetime["Id_Agent"] . "</td>";
                echo "<td>" . $lignetime["Jour_semaine"] . "</td>";
                echo "<td>" . $lignetime["Quart_de_travail"] . "</td>";
                echo "<td>" . $lignetime["Date_debut"] . "</td>";
                echo "<td>" . $lignetime["Date_fin"] . "</td>";
                echo "</tr>";
            }
        }
    ?>
    </table>
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

    <h4>Liste des vacances :</h4>

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
    <fieldset>
        <legend>Ajouter des Fêtes </legend>
        <form action="" method="post">
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
            $sqlFete = "INSERT INTO gestdechcomloc.Fetes (NomFete, DateDebut, DateFin)
                        VALUES ('$feteName', '$feteStartDate', '$feteEndDate')";
            $resFete = mysqli_query($conn, $sqlFete);
        }
    ?>
    <h4>Liste des Fetes :</h4>
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
    <h4>Liste des Equipements :</h4>
    <?php
        $sqlfetchequip = "SELECT Id_equipement, Nom , Descriptionn FROM Equipement";
        $resultfetchequip = mysqli_query($conn, $sqlfetchequip);
        if (mysqli_num_rows($resultfetchequip)) {
            echo "<table>
                    <tr>
                        <th>Id equipement</th>
                        <th>Nom d'equipement</th>
                        <th>Description</th>
                    </tr>";
            while ($rowfetchequip = mysqli_fetch_assoc($resultfetchequip)) {
                echo "<tr>";
                echo "<td>" . $rowfetchequip["Id_equipement"] . "</td>";
                echo "<td>" . $rowfetchequip["Nom"] . "</td>";
                echo "<td>" . $rowfetchequip["Descriptionn"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
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
        <h4>Liste des Agents existe sur les equipements :</h4>
    <?php
        $sqlfetchequipmentsagents = "SELECT Equipement.Nom AS Equipement_Nom, Agent_Equipement.Agent_Name 
                                     FROM Equipement 
                                     INNER JOIN Agent_Equipement ON Equipement.Id_equipement = Agent_Equipement.Id_Equipement";
        $resultfetchequipmentsagents = mysqli_query($conn, $sqlfetchequipmentsagents);
        $rowspanCounts = array();
        $prevEquipementNom = null;
        if (mysqli_num_rows($resultfetchequipmentsagents)) {
            echo "<table>";
            while ($rowfetchresultfetchequipmentsagents = mysqli_fetch_assoc($resultfetchequipmentsagents)) {
                if ($rowfetchresultfetchequipmentsagents["Equipement_Nom"] != $prevEquipementNom) {
                    $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] = 1;
                    $prevEquipementNom = $rowfetchresultfetchequipmentsagents["Equipement_Nom"];
                } else {
                    $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]]++;
                }
                echo "<tr>";
                if ($rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] > 0) {
                    echo "<td rowspan='" . $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] . "'>" . $rowfetchresultfetchequipmentsagents["Equipement_Nom"] . "</td>";
                    $rowspanCounts[$rowfetchresultfetchequipmentsagents["Equipement_Nom"]] = 0;
                }
                echo "<td>" . $rowfetchresultfetchequipmentsagents["Agent_Name"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
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