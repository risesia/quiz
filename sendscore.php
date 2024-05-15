<?php
$servername = "localhost";
$username = "asqalla1_admin";
$password = "Qrk7sKKblFbY";
$dbname = "asqalla1_finn_db";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
} 

$skor = mysqli_real_escape_string($conn, $_POST['skor']);
$kdquiz = mysqli_real_escape_string($conn, $_POST['kdquiz']);
$nis = mysqli_real_escape_string($conn, $_POST['nis']);

if (strlen($times) > 200000) {  $times = "";    }

$sql = "INSERT INTO hasil_quiz (kd_quiz,nis,nilai)
VALUES ('$kdquiz','$nis', '$skor')";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>