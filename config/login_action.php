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

    $query = "SELECT * FROM user WHERE login = '$username' AND password = '$password'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        header('Location: ../dashboard.php');
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
?>