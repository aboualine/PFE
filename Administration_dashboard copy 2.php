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
            $agentname = $_POST['agentnames'];
            $jour = $_POST['jour'];
            $quart = $_POST['quart'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];        
            $sqltraithor = "INSERT INTO Horaires_Travail (Id_Agent, Jour_semaine, Quart_de_travail, Date_debut, Date_fin) 
                            VALUES ('$agentnames', '$jour', '$quart', '$date_debut', '$date_fin')";
            
            if (mysqli_query($conn, $sqltraithor)) {
                echo "Horaire de travail ajouté avec succès.";
            }
        }
    ?>


    <script>
        $(document).ready(function(){
            var departement = document.getElementById("depaSelect");
            $(departement).change(function(){
                var Stdib = $('#depaSelect').val();
                // alert(Stdib);
                $.ajax({
                    type: 'POST',
                    url: 'fetch.php',
                    data: {id:Stdib},
                    success: function(data){
                        $('#postaSelect').html(data);
                        // $.each(data, function(key, value) {
                        //     $('#postaSelect').append('<option value="' + key + '">' + value + '</option>');
                        // });
                    }
                });
            });
        });
    </script>
</body>
</html>