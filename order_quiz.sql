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

INSERT INTO questions (question_text, correct_order) VALUES
('Order these steps to bake a cake', '3,1,4,2');

INSERT INTO answers (question_id, answer_text) VALUES
(1, 'Mix ingredients'),
(1, 'Bake in oven'),
(1, 'Preheat the oven'),
(1, 'Pour batter into pan');