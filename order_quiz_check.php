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

$user_orders = json_decode(file_get_contents('php://input'), true)['userOrders'];
$results = [];

foreach ($user_orders as $user_order) {
    $question_id = $user_order['questionId'];
    $user_order = $user_order['userOrder'];

    $correct_order_sql = "SELECT correct_order FROM questions WHERE id = $question_id";
    $correct_order_result = $conn->query($correct_order_sql);

    if ($correct_order_result->num_rows > 0) {
        $correct_order_row = $correct_order_result->fetch_assoc();
        $correct_order = explode(',', $correct_order_row['correct_order']);

        // Fetch the correct order of answers
        $answers_sql = "SELECT answer_text FROM answers WHERE question_id = $question_id ORDER BY order_index";
        $answers_result = $conn->query($answers_sql);

        $correct_answer_texts = [];
        while ($row = $answers_result->fetch_assoc()) {
            $correct_answer_texts[] = $row['answer_text'];
        }

        // Convert correct_order indexes to actual answers for comparison
        $correct_answers = [];
        foreach ($correct_order as $index) {
            $correct_answers[] = $correct_answer_texts[$index - 1];
        }

        $correct = $correct_answers == $user_order;
        $results[] = ['questionId' => $question_id, 'correct' => $correct];
    } else {
        $results[] = ['questionId' => $question_id, 'error' => 'Question not found'];
    }
}

echo json_encode($results);

$conn->close();
?>
