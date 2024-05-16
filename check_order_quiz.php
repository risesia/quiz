<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$question_id = 1; // example question id
$user_order = json_decode(file_get_contents('php://input'), true)['userOrder'];

$correct_order_sql = "SELECT correct_order FROM questions WHERE id = $question_id";
$correct_order_result = $conn->query($correct_order_sql);

if ($correct_order_result->num_rows > 0) {
    $correct_order_row = $correct_order_result->fetch_assoc();
    $correct_order = explode(',', $correct_order_row['correct_order']);

    $user_order_ids = [];
    foreach ($user_order as $answer_text) {
        $answer_sql = "SELECT id FROM answers WHERE answer_text = '$answer_text' AND question_id = $question_id";
        $answer_result = $conn->query($answer_sql);
        if ($answer_result->num_rows > 0) {
            $answer_row = $answer_result->fetch_assoc();
            $user_order_ids[] = $answer_row['id'];
        }
    }

    $correct = $correct_order == $user_order_ids;
    echo json_encode(['correct' => $correct]);
} else {
    echo json_encode(['error' => 'Question not found']);
}

$conn->close();
?>
