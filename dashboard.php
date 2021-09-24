<?php
///   Database Connection   //////////////////////////////////////////////////

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inchtech";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
//// Checking for mysqli connection if it is successful  / // /////////////////////
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//////     Extracting the position from the data base //// / //////////////////////////
    
    //$msg = $_GET['message'];

    $pos = "SELECT latitude, longitude, _date From track ";

    /////   Running the $pos query using mysqli_query fumction/////////////////////////////////

    $result = mysqli_query($conn, $pos);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web application for visualisation data for arduino">
    <meta name="keywords" content="admin, dashboard, web app">

    <title>Assistance Driver</title>

    <!-- Styles -->
    <link href="assets/css/core.min.css" rel="stylesheet">
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <!--    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">-->
    <!--    <link rel="icon" href="assets/img/favicon.png">-->
</head>

<body>


    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-dots">
            <span class="dot1"></span>
            <span class="dot2"></span>
            <span class="dot3"></span>
        </div>
    </div>


    <!-- Sidebar -->
    <!--<aside class="sidebar sidebar-expand-lg sidebar-light sidebar-sm sidebar-color-secondary">-->

    <!--    <header class="sidebar-header">-->
    <!--        <span class="logo">-->
    <!--&lt;!&ndash;          <a href="dashboard.html">Title</a>&ndash;&gt;-->
    <!--        </span>-->
    <!--    </header>-->

    <!--&lt;!&ndash;    <nav class="sidebar-navigation">&ndash;&gt;-->
    <!--&lt;!&ndash;        <ul class="menu menu-sm menu-bordery">&ndash;&gt;-->

    <!--&lt;!&ndash;            <li class="menu-item">&ndash;&gt;-->
    <!--&lt;!&ndash;                <a class="menu-link active" href="dashboard.html">&ndash;&gt;-->
    <!--&lt;!&ndash;                    <span class="icon ti-bar-chart"></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                    <span class="title">Dashboard</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                </a>&ndash;&gt;-->
    <!--&lt;!&ndash;            </li>&ndash;&gt;-->

    <!--&lt;!&ndash;        </ul>&ndash;&gt;-->
    <!--&lt;!&ndash;    </nav>&ndash;&gt;-->

    <!--</aside>-->
    <!-- END Sidebar -->



    <!-- TopBar -->
    <header class="topbar">
        <div class="topbar-left">
            <!--        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>-->

        </div>

        <div class="topbar-right">
            <a class="logo d-lg-none" href="dashboard.html"></a>
            <a class="dropdown-item" href="#"><i class="ti-power-off"></i></a>
            <a class="dropdown-item" href="#">Name</a>
        </div>
    </header>
    <!-- END Topbar -->



    <!-- Main container -->
    <main class="main-container">

        <div class="main-content">
            <!--        google api for update map-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-title"><strong>Trajet</strong></h4>
                        <div id="googleMap" style="width:100%;height:400px;border-color: gray;border: 5px solid black;"></div>

                        
                    </div>
                </div>
            </div>
    <!-- Table for the map items from the database with php    -->

    <?php
        //////   Creating a table of rows and collumns //////////////////////////
    echo '<table class="table table-striped">
    <thead>
        <tr style="text-align: center;">
            <th>Date</th>
            <th>Hour</th>
            <th>Position</th>
        </tr>
    </thead>
    </table>';
    
    if ($result->num_rows > 0) {
    
    // output data of each row and looping through each to extract the longitude and the latitude so as to work with the map
    while($row = $result->fetch_assoc()) {
        $lat = $row["latitude"];
        $lon = $row["longitude"];
        //// output lat and long with the class of hidden because i dont wanna display in the browser but i rather want to use the values in js google map
        //echo ('<div id="lat" class="hide">'.$lat.'</div>');
        //echo ('<div id="lon" class="hide">'.$lon.'</div>');

        echo '
        <table class="table table-striped">
        <tbody>
            <tr>
                <td>' . substr($row["_date"],0,10). '</td>
                <td>'. substr($row["_date"],11).'</td>
                <td><a href="#" onclick="myMap('.$lat.','.$lon.')">'.'Location'.'</a></td>
            </tr>

            
        </tbody>
    </table>';
    }

    
} else {
    echo "0 results";
}
    ?>
            <!--       ---------- table--------------------------------------------->
            
        </div>
        <!--/.main-content -->

    </main>
    <!-- END Main container -->



    <!-- Scripts -->
    <script src="assets/js/core.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/script.js"></script>
    

    


<!------------------------Code for map    ------------------------>
<script>
        var lat = parseFloat(document.getElementById('lat').innerHTML);
        var lng = parseFloat(document.getElementById('lon').innerHTML);

        function myMap(lat,lng) {
            var mapProp = {
                //http://maps.google.com/maps?q=loc:3.835595,11.493003
                center: new google.maps.LatLng(lat,lng),
                zoom: 15,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat,lng),
                map:map
            })
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2j0TJ8rwmtHvFmH2VHUwxkqQX_bdXRUc&callback=myMap"></script>

</body>

</html>