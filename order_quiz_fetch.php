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

$questions_sql = "SELECT id, question_text FROM questions";
$questions_result = $conn->query($questions_sql);

$all_questions = [];

if ($questions_result->num_rows > 0) {
    while($question_row = $questions_result->fetch_assoc()) {
        $question_id = $question_row['id'];
        $question_text = $question_row['question_text'];
        
        $answers_sql = "SELECT answer_text, order_index FROM answers WHERE question_id = $question_id ORDER BY order_index";
        $answers_result = $conn->query($answers_sql);
        
        $answers = [];
        while($row = $answers_result->fetch_assoc()) {
            $answers[] = $row;
        }
        
        $all_questions[] = [
            'id' => $question_id,
            'question' => $question_text,
            'answers' => $answers
        ];
    }
    echo json_encode($all_questions);
} else {
    echo json_encode(['error' => 'No questions found']);
}

$conn->close();
?>
