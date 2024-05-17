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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_text = $_POST['question_text'];
    $answers = $_POST['answers'];
    $correct_order = $_POST['correct_order'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Insert the question
        $question_sql = $conn->prepare("INSERT INTO questions (question_text, correct_order) VALUES (?, ?)");
        $question_sql->bind_param("ss", $question_text, $correct_order);
        $question_sql->execute();
        $question_id = $conn->insert_id;

        // Insert the answers with order index
        $answer_sql = $conn->prepare("INSERT INTO answers (question_id, answer_text, order_index) VALUES (?, ?, ?)");
        foreach ($answers as $index => $answer_text) {
            $order_index = $index + 1;
            $answer_sql->bind_param("isi", $question_id, $answer_text, $order_index);
            $answer_sql->execute();
        }

        // Commit the transaction
        $conn->commit();
        echo "New quiz created successfully";
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $question_sql->close();
    $answer_sql->close();
}

$conn->close();
?>
