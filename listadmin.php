<!DOCTYPE html>
<html>
<head>
    <title>List des Administration</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>List des Admins</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>ADRESSE</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Mot de Passe</th>
            <th>Actions</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "0689102695mohamedaboualinedimaraja";
        $database = "gestdechcomloc";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM Adminstration";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Id_Administration"] . "</td>";
                echo "<td>" . $row["Nom"] . "</td>";
                echo "<td>" . $row["Adresse"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Tel"] . "</td>";
                echo "<td>" . $row["Mot_de_Passe"] . "</td>";
                echo "<td>";
                echo "<button onclick=\"location.href='modification.php?id=" . $row["CIN"] . "'\">Modifier</button>";
                echo "<button onclick=\"location.href='supprimer.php?id=" . $row["CIN"] . "'\">Supprimer</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "aucun resultat";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
