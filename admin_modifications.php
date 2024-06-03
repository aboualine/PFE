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
    <title>Document</title>
    <link rel="stylesheet" href="css/styleadminsetting.css">
</head>
<body>
<!-- jbdjbjfbvjdhbvjd -->
<div id="admininfs">
    <?php
        $nom = $adresse = $email = $tel = $github = $motdepasse = '';
        $action = 'insert';
        $id = '';

        if (isset($_GET['action']) && isset($_GET['id'])) {
            $action = $_GET['action'];
            $id_encoded = $_GET['id']; 

            $id_decoded = urldecode($id_encoded);

            if ($action == 'modifier') {
                $sql = "SELECT * FROM Adminstration WHERE Id_Administration = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $id_decoded); 
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['Id_Administration']; // Retrieve the ID
                    $nom = $row['Nom'];
                    $adresse = $row['Adresse'];
                    $email = $row['Email'];
                    $tel = $row['Tel'];
                    $github = $row['GitHubURL'];
                    $motdepasse = $row['Mot_de_Passe'];
                } else {
                    echo "No record found for the given ID.";
                }
                $stmt->close();
            } elseif ($action == 'supprimer') {
                $sql = "DELETE FROM Adminstration WHERE Id_Administration = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $id_decoded); 

                if ($stmt->execute()) {
                    echo "Record deleted successfully.";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
                $stmt->close();
                $action = 'insert'; 
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $github = $_POST['github'];
            $motdepasse = $_POST['motdepasse'];

            if ($_POST['action'] == 'modifier') {
                // Debugging output
                echo "<pre>";
                echo "Updating record with the following data:\n";
                echo "ID: $id\n";
                echo "Nom: $nom\n";
                echo "Adresse: $adresse\n";
                echo "Email: $email\n";
                echo "Tel: $tel\n";
                echo "GitHub: $github\n";
                echo "Mot de Passe: $motdepasse\n";
                echo "</pre>";

                $sql = "UPDATE Adminstration SET Nom=?, Adresse=?, Email=?, Tel=?, GitHubURL=?, Mot_de_Passe=? WHERE Id_Administration=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssss", $nom, $adresse, $email, $tel, $github, $motdepasse, $id);

                if ($stmt->execute()) {
                    echo "Record updated successfully.";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                $stmt->close();
            } else {
                $sql = "INSERT INTO Adminstration (Nom, Adresse, Email, Tel, GitHubURL, Mot_de_Passe) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $nom, $adresse, $email, $tel, $github, $motdepasse);

                if ($stmt->execute()) {
                    echo "New record created successfully.";
                } else {
                    echo "Error creating record: " . $stmt->error;
                }
                $stmt->close();
            }
            $nom = $adresse = $email = $tel = $github = $motdepasse = ''; 
        }

        echo "<div id='admininfs'>";
        echo "<fieldset>";
        echo "<legend>Ajouter des Equipements </legend>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='id' value='" . htmlspecialchars($id) . "'>";
        echo "<input type='hidden' name='action' value='" . htmlspecialchars($action) . "'>";
        echo "<label for='nom'>Nom:</label>";
        echo "<input type='text' id='nom' name='nom' value='" . htmlspecialchars($nom) . "'><br>";
        echo "<label for='adresse'>Adresse:</label>";
        echo "<input type='text' id='adresse' name='adresse' value='" . htmlspecialchars($adresse) . "'><br>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='" . htmlspecialchars($email) . "'><br>";
        echo "<label for='tel'>Tel:</label>";
        echo "<input type='text' id='tel' name='tel' value='" . htmlspecialchars($tel) . "'><br>";
        echo "<label for='github'>GitHub URL:</label>";
        echo "<input type='text' id='github' name='github' value='" . htmlspecialchars($github) . "'><br>";
        echo "<label for='motdepasse'>Mot de Passe:</label>";
        echo "<input type='password' id='motdepasse' name='motdepasse' value='" . htmlspecialchars($motdepasse) . "'><br>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        echo "</fieldset>";
        echo "</div>";
    ?>
</div>

<!-- gvghdgdvgdhgd -->
</body>
</html>