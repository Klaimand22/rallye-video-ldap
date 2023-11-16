INSERT INTO `rallyevideo_role` (`idrole`, `nom_autorisation`) VALUES
(2, 'admin'),
(1, 'user');



-- Supprimer les données existantes de la table rallyevideo_user
DELETE FROM `rallyevideo_user`;

-- Insérer les nouvelles données avec la colonne `password` modifiée en `login`
INSERT INTO `rallyevideo_user` (`iduser`, `nom`, `prenom`, `email`, `login`, `role_idrole`) VALUES
(2, 'Buisson', 'Noah', 'noahbuisson22.nb@gmail.com', '2c041b80f985499d6d059aafda3c929d57013f59950fd6e605cf18449cafc988', 2),
(3, 'Michel', 'Jean', 'jeamnmichel@mail.fr', 'ce582a2147c0e501b2d41f898d8f690a942cb56f4b4abf8d66354d85eb07fa36', 2),
(4, 'Malou', 'Eddy', 'eddymalou@mail.fr', 'eddymalou', 1),
(5, 'Mirabel', 'Paul', 'paulmirabel@mail.fr', '9d87609a3584d3fca24b7084dc445c5b6f5b8ac2c6db3a1fb0d3ab7ffe27e042', 1),
(6, 'Herude', 'Jean', 'jeandheaue@gmail.fr', 'jeanheud', 1),
(7, 'Patrick', 'Chirac', 'chiracpatrick@gmail.com', '893139f4d511c4f37321d7cf66d0442835789f07cd1e3fea974537d22c431ab5', 2),
(8, 'Michel', 'Hallyday', 'michelhallyday@gmail.com', 'hallydayjtaime', 1),
(9, 'Morue', 'Poisson', 'poissonmorue@mail.fr', 'jadorelepoisson', 1),
(10, 'Niska', 'Pouloulou', 'pou@lou.fr', 'pouloulapoule', 1),
(11, 'Doe', 'John', 'john.doe@example.com', 'hashed_password', 1),
(12, 'Smith', 'Alice', 'alice.smith@example.com', 'hashed_password', 1),
(13, 'Johnson', 'Bob', 'bob.johnson@example.com', 'hashed_password', 1),
(14, 'Taylor', 'Emma', 'emma.taylor@example.com', 'hashed_password', 1),
(15, 'Brown', 'David', 'david.brown@example.com', 'hashed_password', 1),
(16, 'Davis', 'Olivia', 'olivia.davis@example.com', 'hashed_password', 1),
(17, 'Wilson', 'James', 'james.wilson@example.com', 'hashed_password', 1),
(18, 'Anderson', 'Sophia', 'sophia.anderson@example.com', 'hashed_password', 1),
(19, 'Thomas', 'Liam', 'liam.thomas@example.com', 'hashed_password', 1),
(20, 'White', 'Ava', 'ava.white@example.com', 'hashed_password', 1),
(21, 'Garcia', 'Sophie', 'sophie.garcia@example.com', 'hashed_password', 1),
(22, 'Lee', 'Michael', 'michael.lee@example.com', 'hashed_password', 1),
(23, 'Ramirez', 'Isabella', 'isabella.ramirez@example.com', 'hashed_password', 1),
(24, 'Evans', 'Daniel', 'daniel.evans@example.com', 'hashed_password', 1),
(25, 'Turner', 'Emily', 'emily.turner@example.com', 'hashed_password', 1),
(26, 'Wright', 'William', 'william.wright@example.com', 'hashed_password', 1),
(27, 'Lopez', 'Sophia', 'sophia.lopez@example.com', 'hashed_password', 1),
(28, 'Baker', 'Aiden', 'aiden.baker@example.com', 'hashed_password', 1),
(29, 'Hall', 'Grace', 'grace.hall@example.com', 'hashed_password', 1),
(30, 'Young', 'Jackson', 'jackson.young@example.com', 'hashed_password', 1),
(31, 'Scott', 'Abigail', 'abigail.scott@example.com', 'hashed_password', 1),
(32, 'King', 'Elijah', 'elijah.king@example.com', 'hashed_password', 1),
(33, 'Hill', 'Scarlett', 'scarlett.hill@example.com', 'hashed_password', 1),
(34, 'Adams', 'Benjamin', 'benjamin.adams@example.com', 'hashed_password', 1),
(35, 'Fisher', 'Chloe', 'chloe.fisher@example.com', 'hashed_password', 1),
(36, 'Reed', 'Logan', 'logan.reed@example.com', 'hashed_password', 1),
(37, 'Perez', 'Lily', 'lily.perez@example.com', 'hashed_password', 1),
(38, 'Morgan', 'Gabriel', 'gabriel.morgan@example.com', 'hashed_password', 1),
(39, 'Cooper', 'Zoe', 'zoe.cooper@example.com', 'hashed_password', 1),
(40, 'Rossi', 'Nicholas', 'nicholas.rossi@example.com', 'hashed_password', 1),
(200, 'Michellod', 'Clément', 'clement.michellod@gmail.com', '665305c2f136b3c57f3282be02c0a8a9d0e7b92787a16c01bc401904ed42145a', 2);
