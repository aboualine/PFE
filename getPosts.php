<?php
        $departementId = $_GET['departementId'];
        echo "<script>alert('$departementId')</script>"
        $sql = "SELECT Id_Post, Nom FROM Post WHERE Id_Departement = $departementId";
        $resddd = mysqli_query($conn,$sql);
        $lignedepartement = mysqli_fetch_assoc($resddd);
        echo json_encode($lignedepartement);
