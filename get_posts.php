<?php
$servername = "localhost";
$username = "root";
$password = "0689102695mohamedaboualinedimaraja";
$database = "gestdechcomloc";
$conn = new mysqli($servername, $username, $password, $database);

// Check if the 'Id_Departement' parameter is set in the GET request
if(isset($_POST['Id_Departement'])) {
    // Sanitize the input to prevent SQL injection
    $departmentId = mysqli_real_escape_string($conn, $_POST['Id_Departement']);

    // Query to fetch posts related to the selected department
    $sql = "SELECT Id_Post, Nom FROM Post WHERE Id_Departement = '$departmentId'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if(mysqli_num_rows($result) > 0) {
        // Initialize an array to store the posts
        $posts = array();

        // Fetch and store each post in the array
        while($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }

        // Send the posts data as JSON response
        echo json_encode($posts);
    } else {
        // If no posts found, send an empty array as response
        echo json_encode(array());
    }
} else {
    // If 'Id_Departement' parameter is not set, send an error message
    echo "Error: Id_Departement parameter is missing.";
}

// Close the database connection
mysqli_close($conn);
?>



