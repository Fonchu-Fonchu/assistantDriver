<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inchtech";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $query = "INSERT INTO user (login, password) VALUES('$username', '$password')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run === TRUE) {
        header('Location: ../login.php');
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
?>