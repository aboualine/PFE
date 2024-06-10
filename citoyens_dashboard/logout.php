<?php
    session_start();
    session_destroy();
    header("Location: citoyens_dash.php");
    exit();
?>
