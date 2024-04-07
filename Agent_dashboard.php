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
    </style>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "0689102695mohamedaboualinedimaraja";
        $database = "gestdechcomloc";
        $conn = new mysqli($servername, $username, $password, $database);
    ?>
    <h1>HELLO AGENT</h1>
    <fieldset>
    <legend>Signaler un Problème</legend>
        <form action="" method="post">
            <label for="equipement">Équipement :</label><br>
            <select id="equipement" name="equipement" required>
                <?php
                $sql_equipement = "SELECT Id_equipement, Nom FROM Equipement";
                $result_equipement = mysqli_query($conn, $sql_equipement);

                while ($row_equipement = mysqli_fetch_assoc($result_equipement)) {
                    echo "<option value='" . $row_equipement['Id_equipement'] . "'>" . $row_equipement['Nom'] . "</option>";
                }
                ?>
            </select><br>

            <label for="description">Description du Problème :</label><br>
            <textarea id="description" name="description" rows="4" required></textarea><br>

            <label for="date_signal">Date de Signalement :</label><br>
            <input type="date" id="date_signal" name="date_signal" required><br>

            <input type="submit" name="signaler_probleme" value="Signaler">
        </form>
    </fieldset>
    <?php
        if(isset($_POST['signaler_probleme'])) {
            $equipement_id = $_POST['equipement'];
            $description = $_POST['description'];
            $date_signal = $_POST['date_signal'];

            $sql_insert_problem = "INSERT INTO Probleme (Descriptionn, Date_de_Signal, Statut) 
                                VALUES ('$description', '$date_signal', 0)";
            
            if (mysqli_query($conn, $sql_insert_problem)) {
                echo "Le problème a été signalé avec succès.";
            }
        }
    ?>
</body>
</html>