<?php
    $servername = "localhost";
    $username = "root";
    $password = "0689102695mohamedaboualinedimaraja";
    $database = "gestdechcomloc";
    $conn = new mysqli($servername, $username, $password, $database);
    // $id = $_POST['Id_Departement'];
    $id = $_POST['id'];
    $sqlpost = "SELECT * FROM Post WHERE Id_Departement = $id";
    $result = mysqli_query($conn,$sqlpost);
    $out = '';
    while($row = mysqli_fetch_assoc($result)){
        $out .= '<option>'.$row['Nom'].'</option>';
    }
    echo $out;
?>