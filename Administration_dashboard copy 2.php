<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            $noma = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $depa = $_POST['depa'];
            $posta = $_POST['posta'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $motpass = $_POST['mot_de_passe'];

            $sqla = "INSERT INTO Agent (Nom ,Prenom ,Poste ,Email ,Tel ,Mot_de_Passe) 
                     VALUES ('$noma' ,'$prenom' ,'$depa' ,'$posta' ,'$email' ,'$tel' ,'$motpass')";
            $resa = mysqli_query($conn,$sqla);
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
                    echo "<button onclick=\"location.href='supprimerdep.php?id=" . $rowd["Id_Departement"] . "'\">Supprimer</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
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
                    echo "<button onclick=\"location.href='supprimerpost.php?id=" . $rowp["Id_Post"] . "'\">Supprimer</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
            }
        ?>
    </table>
    <h4>Agents</h4>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Departement</th>
            <th>Post</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Mot de Passe</th>
            <th>Action</th>
        </tr>

        <?php
            $sqlpost = "SELECT 
                            Agent.Id_Agent,
                            Agent.Nom,
                            Agent.Prenom,
                            Departement.Nom AS Nom_Departement,
                            Post.Nom AS Nom_Post,
                            Agent.Email,
                            Agent.Tel,
                            Agent.Mot_de_Passe
                        FROM 
                            Agent
                        NATURAL JOIN 
                            Departement
                        NATURAL JOIN 
                            Post";
            $resultpost = mysqli_query($conn,$sqlpost);
            if (mysqli_num_rows($resultpost)) {
                while($rowa = mysqli_fetch_assoc($resultpost)) {
                    echo "<tr>";
                    echo "<td>" . $rowa["Id_Post"] . "</td>";
                    echo "<td>" . $rowa["Nom"] . "</td>";
                    echo "<td>" . $rowa["Prenom"] . "</td>";
                    echo "<td>" . $rowa["Departement"] . "</td>";
                    echo "<td>" . $rowa["Poste"] . "</td>";
                    echo "<td>" . $rowa["Email"] . "</td>";
                    echo "<td>" . $rowa["Tel"] . "</td>";
                    echo "<td>" . $rowa["Mot_de_Passe"] . "</td>";
                    echo "<td>";
                    echo "<button onclick=\"location.href='modificationagent.php?id=" . $rowa["Id_Post"] . "'\">Modifier</button>";
                    echo "<button onclick=\"location.href='supprimeragent.php?id=" . $rowa["Id_Post"] . "'\">Supprimer</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "aucun resultat";
            }
        ?>
    </table>
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
                        $('#postaSelect').html('');
                        $.each(data, function(key, value) {
                            $('#postaSelect').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>