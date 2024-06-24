<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_name("admin");
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "0689102695mohamedaboualinedimaraja";
    $database = "gestdechcomloc";
    $conn = new mysqli($servername, $username, $password, $database);
    if(isset($_POST['submit_response'])) {
        $titre = $_POST['titrereponse'];
        $response = $_POST['admin_response'];
        $annonce_date = date('Y-m-d');
        $agent_id = "5";
        $sqlreprec = "INSERT INTO Annonce (Titre, Descriptionn, Date_de_Publication, Id_Agent) 
                      VALUES ('$titre', '$response', '$annonce_date', $agent_id)";
        $resreprec = mysqli_query($conn, $sqlreprec);
        if($resreprec) {
            echo "Response added successfully.";
        }
    

    $sqlannance = "SELECT 
                        COALESCE(a.Nom, adm.Nom) AS Nom,
                        COALESCE(a.Email, adm.Email) AS Email,
                        an.Titre AS Titre_Annonce,
                        an.Descriptionn AS Description_Annonce,
                        an.Date_de_Publication,
                        r.Id_Reclamation
                    FROM 
                        Annonce an
                    LEFT JOIN 
                        Agent a ON an.Id_Agent = a.Id_Agent
                    LEFT JOIN 
                        Adminstration adm ON an.Id_Administration = adm.Id_Administration
                    LEFT JOIN 
                        Reclamation r ON r.Id_Reclamation = an.Id_Annonce";
    $resannonce = mysqli_query($conn, $sqlannance);

    if(mysqli_num_rows($resannonce) > 0) {
        $rowannonce = mysqli_fetch_assoc($resannonce);

        $imgWidth = 800;
        $imgHeight = 600;

        $img = imagecreate($imgWidth, $imgHeight);
        if (!$img) {
            die('Failed to create image.');
        }

        $white = imagecolorallocate($img, 255, 255, 255); 
        $black = imagecolorallocate($img, 0, 0, 0); 

        // imagefilledrectangle($img, 0, 0, $imgWidth, $imgHeight, $white);

        $companyLogo = imagecreatefrompng('images/logofinal.png');
        $backgroundImage = imagecreatefrompng('images/background-annonce.png');

        imagecopyresampled($img, $companyLogo, 10, 10, 0, 0, 150, 150, imagesx($companyLogo), imagesy($companyLogo));

        imagedestroy($companyLogo);

        $fontName = realpath('/var/www/html/fonts/Arial.ttf'); 
        $fontSize = 24;
        imagettftext($img, $fontSize, 0, 200, 50, $black, $fontName, 'MedNiss');
        $fontSize = 18;
        imagettftext($img, $fontSize, 0, 200, 90, $black, $fontName, 'Chichaoua, Maroc');

        // Add admin response information
        imagettftext($img, $fontSize, 0, 20, 200, $black, $fontName, "Admin: " . $rowannonce['Nom']);
        imagettftext($img, $fontSize, 0, 20, 240, $black, $fontName, "Date: " . $rowannonce['Date_de_Publication']);
        imagettftext($img, $fontSize, 0, 20, 280, $black, $fontName, "Reference: " . $rowannonce['Id_Reclamation']);

        // Add the response text
        imagettftext($img, $fontSize, 0, 20, 320, $black, $fontName, "Response:");
        $wrapWidth = 760;
        $responseTextLines = explode("\n", wordwrap($rowannonce['Description_Annonce'], 50, "\n"));
        $y = 360;
        foreach ($responseTextLines as $line) {
            imagettftext($img, $fontSize, 0, 20, $y, $black, $fontName, $line);
            $y += 20; // Move to the next line
        }

        // Add thank you text
        imagettftext($img, $fontSize, 0, 20, 540, $black, $fontName, 'Merci pour votre patience et votre plainte.');
        header ("Content-type: image/jpeg");

        // Save the image
        $imageName = 'images/annonce' . date('YmdHis') . '.jpg';
        imagejpeg($img, $imageName);

        // Free memory
        imagedestroy($img);
        } else {
        echo "No data found.";
        }
    }
?>
