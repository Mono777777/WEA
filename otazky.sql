/*Vytvořte databázi "weatesty"*/

CREATE TABLE `otazky` (
  `id` int(11) NOT NULL,
  `otazka` varchar(128) NOT NULL,
  `spravna_odpoved` varchar(256) NOT NULL,
  `odpovedi` varchar(256) DEFAULT NULL,
  `cisloTestu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `otazky` (`id`, `otazka`, `spravna_odpoved`, `odpovedi`, `cisloTestu`) VALUES
(1, 'Who is the main willain of Friday the 13th?', 'Jason', '[\"Jason\",\"Chucky\",\"Willy Wonka\"]', 1),
(2, 'Was Robert Oppenheimer part of project manhattan?', 'Yes', '[\"Yes\",\"No\",\"Myabe\"]', 1),
(3, 'What is the capital of France?', 'Paris','[\"Paris\",\"New York\",\"Tokio\"]', 1),
(4, 'What is the largest planet in our solar system?', 'Jupiter', '[\"Earth\",\"Jupiter\",\"Neptune\"]', 1),
(5, 'Who painted the famous artwork \"The Starry Night?', 'Vincent van Gogh', '[\"Vincent van Gogh\",\"Elon Musk\",\"Leonardo da Vinci\"]', 1),
(6, 'What is the real name of Saul Goodman from Breaking Bad?', '[\"Jimmy Mcgill\"]', '[\"Howard Hamlin\",\"Jimmy Mcgill\",\"Charles Mcgill\"]', 2),
(7, 'What is the name of Japanese godess of the sun?', 'Amaterasu', '[\"Amaterasu\",\"Izanagi\",\"Raijin\"]', 2),
(8, 'How is the dragon in Hobit called?', 'Smaug', '[\"Glaurung\",\"Smaug\",\"Ancalagon\"]', 2),
(9, 'Who painted Mona Lisa?', 'Leonardo da Vinci', '[\"Leonardo da Vinci\",\"Galileo Galilei\",\"Pythagoras\"]', 2),
(10, 'Who is the author of Game of Thrones?', 'George R. R. Martin', '[\"Vincent van Gogh\",\"Elon Musk\",\"George R. R. Martin\"]', 2);

ALTER TABLE `otazky`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `otazky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;