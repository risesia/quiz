CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_text VARCHAR(255) NOT NULL,
    correct_order VARCHAR(255) NOT NULL
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    answer_text VARCHAR(255) NOT NULL,
    FOREIGN KEY (question_id) REFERENCES questions(id)
);