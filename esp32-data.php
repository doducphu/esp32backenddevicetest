<!DOCTYPE html>
<html><body>
<?php

$servername = "localhost";
$dbname = "id16706387_esp32_database";
$username = "id16706387_esp32_ducphu832001";
$password = "{YcG{I9Fm!8TN2RO";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, SensorData, LocateData, value1, value2, value3, realtimereading FROM ESP32Data ORDER BY id DESC";

echo '<table cellspacing="8" cellpadding="10">
      <tr> 
        <td>ID</td> 
        <td>SensorData</td> 
        <td>LocateData</td> 
        <td>Value 1</td> 
        <td>Value 2</td>
        <td>Value 3</td> 
        <td>RealtimeReading</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_SensorData = $row["SensorData"];
        $row_LocateData = $row["LocateData"];
        $row_value1 = $row["value1"];
        $row_value2 = $row["value2"]; 
        $row_value3 = $row["value3"]; 
        $row_realtimereading = $row["realtimereading"];
        
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_SensorData . '</td> 
                <td>' . $row_LocateData . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $row_value3 . '</td> 
                <td>' . $row_realtimereading . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>