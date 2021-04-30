<?php
$servername = "localhost";
$dbname = "id16706387_esp32_database";
$username = "id16706387_esp32_ducphu832001";
$password = "{YcG{I9Fm!8TN2RO";

$api_key_value = "{YcG{I9F";
$api_key= $SensorData = $LocateData = $value1 = $value2 = $value3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $SensorData = test_input($_POST["SensorData"]);
        $LocateData = test_input($_POST["LocateData"]);
        $value1 = test_input($_POST["value1"]);
        $value2 = test_input($_POST["value2"]);
        $value3 = test_input($_POST["value3"]);
        
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO ESP32Data (SensorData, LocateData, value1, value2, value3)
        VALUES ('" . $SensorData . "', '" . $LocateData . "', '" . $value1 . "', '" . $value2 . "', '" . $value3 . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key";
    }

}
else {
    echo "No data posted HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}