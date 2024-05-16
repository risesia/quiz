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
$question_sql = "SELECT question_text FROM questions WHERE id = $question_id";
$question_result = $conn->query($question_sql);

if ($question_result->num_rows > 0) {
    $question_row = $question_result->fetch_assoc();
    $question_text = $question_row['question_text'];
    
    $answers_sql = "SELECT id, answer_text FROM answers WHERE question_id = $question_id";
    $answers_result = $conn->query($answers_sql);
    
    $answers = [];
    while($row = $answers_result->fetch_assoc()) {
        $answers[] = $row;
    }
    
    $response = [
        'question' => $question_text,
        'answers' => $answers
    ];
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Question not found']);
}

$conn->close();
?>
