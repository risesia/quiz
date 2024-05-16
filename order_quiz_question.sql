INSERT INTO questions (id, question_text, correct_order) VALUES
('1', 'Bagaimana langkah-langkah enkripsi shift cipher?', '2,4,1,3');

INSERT INTO answers (id, question_id, answer_text) VALUES
(1, 1, 'Enkripsi dengan geser tiap huruf plaintext menurut tabel.'),
(2, 1, 'Tentukan kunci untuk menentukan jumlah langkah geser.'),
(3, 1, 'Gabungkan huruf-huruf yang telah dienkripsi menjadi satu string.'),
(4, 1, 'Buat tabel alfabet enkripsi.');