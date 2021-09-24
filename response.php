<?php 

    // Setting up the variables
    $date = '';
    $msg = '';


    // Check if there are data that is available
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $conn = new mysqli('localhost', 'root','', 'inchtech');

    // Check if the $conn variable was connected to the database
        if ($conn) { // Successfull conection

    // Set the query string to extract the information
        $sql = "SELECT * FROM ".track. " WHERE `id` = ".$id." LIMIT 1";

    // Execute the query
        $records = $conn->query($sql);

    // Check if query was executed successfully
        if ($records) {

    // Check if record exist
        if ($records->num_rows > 0) {

    // Extract the record by looping through it
        while($data = $records->fetch_assoc()) {
            $date = $data['_date'];
            $msg = $data['mesage'];
        }
    }
    }

    }
    }

    // Set the return value in json format
    $returnValue = json_encode(array(
    'name' => $name,
    'phone'=> $phone,
    'accnt'=> $accnt,
    'loan'=> $loan
    ));
    // Setting the header information to json format
    header('Content-Type: application/json');

    // Display the information and return the control to the calling page
    echo $returnValue;
?>