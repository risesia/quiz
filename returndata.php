<?php
header('Content-type: application/json');

$servername = "localhost";
$username = "asqalla1_admin";
$password = "Qrk7sKKblFbY";
$dbname = "asqalla1_finn_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = mysqli_real_escape_string($conn, $_POST['name']);

$sql = 'SELECT * FROM testimes WHERE name ="'. $name. '"';

$result = $conn->query($sql);
$response = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response['name'] = $row["name"];
        $response['date'] = $row["date"];
        $response['amount'] = $row["amount"];
        $response['times'] = $row["times"];
    }
    echo json_encode($response);
} else {
    echo "  0 results";
}
$conn->close();     
?>