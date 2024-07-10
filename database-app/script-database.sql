
-- OBS: PRESTE ATENÇÃO NO MECANISMO DO BANCO DE DADOS, USE SEMPRE O InnoDB - MYSQL

DROP DATABASE IF EXISTS geste_movie;

CREATE DATABASE geste_movie
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

USE geste_movie;

CREATE TABLE genre(
	id_genre INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name     VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE actor(
	id_actor   INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    full_name  VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE director(
	id_director	INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    full_name	VARCHAR(100) NOT NULL,
    birth_date	DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE movie(
    id_movie	 INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	title	     VARCHAR(100) NOT NULL,
	description	 VARCHAR(1000) NOT NULL,
	release_year INT NOT NULL,
	duration	 INT NOT NULL,		
    age_rating	 INT NOT NULL,
    id_director	 INT NOT NULL,
    usu_insert   INT NOT NULL, 
    usu_update   INT NOT NULL,
    dt_insert    DATETIME NOT NULL DEFAULT NOW(),
    dt_update    DATETIME NOT NULL,
    FOREIGN KEY  (id_director) REFERENCES director(id_director)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE genre_movie(
	id_genre_movie INT AUTO_INCREMENT NOT NULL,
	id_genre	   INT NOT NULL,
    id_movie       INT NOT NULL,
    PRIMARY KEY(id_genre_movie, id_genre),
    FOREIGN KEY (id_genre) REFERENCES genre(id_genre),
    FOREIGN KEY (id_movie) REFERENCES movie(id_movie),
    UNIQUE KEY unique_genre_movie (id_genre, id_movie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE actor_movie(
	id_actor_movie INT AUTO_INCREMENT NOT NULL,
    id_actor	   INT NOT NULL,
    id_movie       INT NOT NULL,
    PRIMARY KEY(id_actor_movie, id_actor),
    FOREIGN KEY (id_actor) REFERENCES actor(id_actor),
    FOREIGN KEY (id_movie) REFERENCES movie(id_movie),
    UNIQUE KEY unique_actor_movie (id_actor, id_movie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- CREATE

INSERT INTO actor VALUES 
(15,'Nicole Kidman','2005-08-23'),
(16,'Zac Efron Zac Efron','2020-11-30'),
(21,'Joey King Joey King','2003-08-30'),
(22,'Jared Padalecki','2005-09-14'),
(23,'Kelsey Mann AB','1975-09-25'),
(26,'Johnny Depp','1963-06-09'),
(27,'Mia Wasikowska','1989-10-25'),
(28,'Helena Bonham Carter','1966-05-26'),
(29,'Anne Hathaway','1982-11-12'),
(30,'Alan Rickman','1946-02-21'),
(31,'Crispin Glover','1964-04-20'),
(32,'Owen Teague','1998-12-08'),
(33,'Freya Allan','2001-09-06'),
(34,'Kevin Durand','1974-01-14'),
(35,'Peter Macon','1982-05-18'),
(36,'William H. Macy','1950-03-13'),
(37,'Eka Darville','1989-04-11'),
(38,'Travis Jeffery','1989-04-12'),
(39,'Lydia Peckham','1996-01-01'),
(40,'Neil Sandilands','1975-05-01'),
(41,'Ras-Samuel Welda\'abzgi','1997-02-20'),
(42,'Timothy Spall','1957-02-27'),
(43,'Michael Sheen','1969-02-05'),
(44,'Stephen Fry','1957-08-24'),
(46,'Matt Lucas','1974-03-05'),
(47,'Snoop Dogg','1971-10-20'),
(48,'Bowen Yang','1990-11-06'),
(49,'Brett Goldstein','1980-07-17'),
(50,'Harvey Guillén','1990-05-03'),
(51,'Cecily Strong','1984-02-08'),
(52,'Nicholas Hoult','1989-12-07'),
(53,'Ving Rhames','1959-05-12'),
(54,'Hannah Waddingham','1974-07-28'),
(55,'Samuel L. Jackson','1948-12-21'),
(56,'Chris Pratt','1979-06-21'),
(57,'Emory Cohen','1990-03-13'),
(58,'Beau Knapp','1988-04-17'),
(59,'Damon Herriman','1970-03-31'),
(60,'Norman Reedus','1969-01-06'),
(61,'Boyd Holbrook','1981-09-01'),
(62,'Mike Faist','1992-01-05'),
(63,'Michael Shannon','1974-08-07'),
(64,'Tom Hardy','1977-09-15'),
(65,'Austin Butler','1991-08-17'),
(66,'Jodie Comer','1993-03-11'),
(67,'Elsa Pataky','1976-07-18'),
(68,'Charlee Fraser','1997-12-25'),
(69,'Angus Sampson','1979-02-12'),
(70,'John Howard','1952-10-22'),
(71,'Lachy Hulme','1971-04-01'),
(72,'George Shevtsov','1953-09-15'),
(73,'Alyla Browne','2010-04-07'),
(74,'Tom Burke','1981-06-30'),
(75,'Chris Hemsworth','1983-08-11'),
(76,'Anya Taylor-Joy','1996-04-16'),
(77,'Karen Takizawa','1992-05-13'),
(78,'Sawako Agawa','1953-11-01'),
(79,'Jun Fubuki','1952-05-12'),
(80,'Keiko Takeshita','1953-09-15'),
(81,'Takuya Kimura','1972-11-13'),
(82,'Yoshino Kimura','1976-04-10'),
(83,'Aimyon','1995-03-06'),
(84,'Ko Shibasaki','1981-08-05'),
(85,'Masaki Suda','1993-02-21'),
(86,'Soma Santoki','2005-06-06'),
(87,'Amy Poehler','1971-09-16'),
(88,'Maya Hawke','1998-07-08'),
(89,'Kensington Tallman','2008-08-06'),
(90,'Liza Lapira','1981-12-03'),
(91,'Phyllis Smith','1949-08-15'),
(92,'Lewis Black','1948-08-30'),
(93,'Tony Hale','1970-09-30'),
(94,'Ayo Edebiri','1995-10-03'),
(95,'Adèle Exarchopoulos','1993-11-22'),
(96,'Lilimar','2000-06-02'),
(97,'Peter Mensah','1959-08-27'),
(98,'May Calamawy','1986-10-28'),
(99,'Denzel Washington','1954-12-28'),
(100,'Connie Nielsen','1965-06-03'),
(101,'Derek Jacobi','1938-10-22'),
(102,'Lior Raz','1971-12-24'),
(103,'Fred Hechinger','1999-12-02'),
(104,'Joseph Quinn','1994-01-26'),
(105,'Pedro Pascal','1975-04-02'),
(106,'Paul Mescal','1996-02-02'),
(107,'Kirsten Dunst','1982-04-30'),
(108,'Wagner Moura','1976-06-27'),
(109,'Cailee Spaeny','1997-06-24'),
(110,'Stephen McKinley Henderson','1949-08-31'),
(111,'Nelson Lee','1975-10-16'),
(112,'Nick Offerman','1970-06-26'),
(113,'Jefferson White','1989-11-03'),
(114,'Evan Lai','1980-01-01'),
(115,'Vince Pisani','1978-03-17'),
(116,'Justin James Boykin','1982-09-15'),
(117,'Giles New','1983-09-29'),
(118,'Damian O\'Hare','1977-08-13'),
(119,'Mackenzie Crook','1971-09-29'),
(120,'Lee Arenberg','1962-07-18'),
(121,'Jonathan Pryce','1947-06-01'),
(122,'Jack Davenport','1973-03-01'),
(123,'Geoffrey Rush','1951-07-06'),
(124,'Keira Knightley','1985-03-26'),
(125,'Orlando Bloom','1977-01-13');

INSERT INTO director VALUES (1,'DAMASCENO','1994-12-28'),
(2,'Steven Spielberg','1946-01-01'),
(3,'Stanley Kubrick','1928-01-01'),
(4,'Bernardo Bertolucci','1941-01-01'),
(5,'Jean-Luc Godard','1930-01-01'),
(6,'Quentin Tarantino','1963-01-01'),
(7,'Martin Scorsese','1942-01-01'),
(8,'Alfred Hitchcock','1899-01-01'),
(9,'Tim Burton','1958-02-02'),
(10,'Woody Allen','1935-01-01'),
(11,'Francis Ford Coppola','1939-01-01'),
(12,'George Lucas','1944-01-01'),
(13,'Charles Chaplin','1889-01-01'),
(14,'Ingmar Bergman','1918-01-01'),
(15,'ames Cameron','1954-01-01'),
(16,'Federico Fellini','1920-01-01'),
(17,'Andrei Tarkovsky','1932-01-01'),
(18,'Orson Welles','1915-01-01'),
(19,'John Ford','1894-01-01'),
(20,'Akira Kurosawa','1910-01-01'),
(21,'Luis Buñuel','1900-01-01'),
(22,'Jacques Tati','1907-01-01'),
(23,'François Truffaut','1932-01-01'),
(24,'Christopher Nolan','1970-01-01'),
(30,'Paulo Carvalho','1982-10-12'),
(31,'Wes Ball','1980-10-28'),
(32,'Mark Dindal','1960-05-31'),
(33,'Jeff Nichols','1978-12-07'),
(34,'George Miller','1945-03-03'),
(35,'Hayao Miyazaki','1941-01-05'),
(36,'Kelsey Mann','1983-11-12'),
(37,'David Scarpa','0170-01-01'),
(38,'Alex Garland','1970-05-26'),
(39,'Gore Verbinski','1964-03-16');

INSERT INTO genre VALUES (174,'Cinema de arte'),
(175,'Chanchada'),
(176,'Comédia'),
(177,'Comédia de ação'),
(178,'Comédia de terror'),
(179,'Comédia dramática'),
(180,'Comédia romântica'),
(181,'Dança'),
(182,'Documentário'),
(183,'Docuficção'),
(184,'Drama'),
(185,'Espionagem'),
(186,'Faroeste'),
(187,'Fantasia'),
(188,'Fantasia científica'),
(189,'Ficção científica'),
(190,'Filmes com truques'),
(191,'Filmes de guerra'),
(192,'Mistério'),
(193,'Musical'),
(194,'Filme policial'),
(195,'Romance'),
(196,'Terror'),
(197,'Thriller'),
(198,'Infantil'),
(199,'Aventura'),
(203,'Ação'),
(204,'Família'),
(205,'Animação'),
(206,'Crime'),
(207,'Guerra');

INSERT INTO movie VALUES (1,'Alice no País das Maravilhas','A Alice de 19 anos de idade, que regressa ao excêntrico mundo que encontrou pela primeira vez quando era criança reunindo-se assim com os seus amigos de infância: o Coelho Branco, Tweedledee e Tweedledum, a Ratazana, a Lagarta, o Gato Cheshire, e claro, o Chapeleiro Louco. Alice embarca numa fantástica viagem para encontrar o seu verdadeiro destino e acabar com o reino de terror da Rainha Vermelha.',2010,109,10,9,1,1,'2024-07-02 19:32:08','2024-07-10 17:35:55'),
(5827,'Planeta dos Macacos: O Reinado','Várias gerações no futuro, após o reinado de César, os macacos são agora a espécie dominante e vivem harmoniosamente, enquanto os humanos foram reduzidos a viver nas sombras. À medida que um novo líder símio tirânico constrói o seu império, um jovem macaco empreende uma jornada angustiante que o levará a questionar tudo o que sabia sobre o passado e a fazer escolhas que definirão um futuro tanto para os macacos como para os humanos.',2024,145,14,31,1,1,'2024-07-10 14:27:15','2024-07-10 17:27:15'),
(5828,'Garfield - Fora de Casa','Garfield, o mundialmente famoso gato de interior que odeia segundas-feiras e adora lasanha, está prestes a ter uma aventura selvagem ao ar livre! Depois de um reencontro inesperado com seu pai há muito perdido – o desalinhado gato de rua Vic – Garfield e seu amigo canino Odie são forçados a deixar sua vida perfeitamente mimada para se juntarem a Vic em um assalto hilariante e de alto risco.',2024,101,0,32,1,1,'2024-07-10 14:48:07','2024-07-10 17:48:07'),
(5829,'Clube dos Vândalos','Kathy, um membro obstinado dos Vândalos, casada com um motociclista selvagem e imprudente chamado Benny, conta a evolução dos Vândalos ao longo de uma década, começando como um clube local unido por bons momentos, motas a roncar e respeito pelo seu forte e firme líder, Johnny. À medida que a vida nos Vandals se torna mais perigosa e o clube ameaça tornar-se num gangue mais sinistro, Kathy, Benny e Johnny são forçados a fazer escolhas sobre a sua lealdade.',2024,116,16,33,1,1,'2024-07-10 15:32:43','2024-07-10 18:32:43'),
(5830,'Furiosa: Uma Saga Mad Max','Quando o mundo entra em colapso, a jovem Furiosa é sequestrada do Green Place das Muitas Mães e cai nas mãos da horda de motoqueiros liderada pelo Senhor da Guerra Dementus. Vagando pelo deserto condenado, eles encontram a Cidadela controlada por Immortan Joe. Enquanto os dois tiranos lutam por poder e controle, Furiosa terá que sobreviver a muitos desafios para encontrar e trilhar o caminho de volta para casa.',2024,148,16,34,1,1,'2024-07-10 15:50:02','2024-07-10 18:50:02'),
(5831,'O Menino e a Garça','Depois de perder a mãe durante a guerra, o jovem Mahito muda-se para a propriedade de sua família no campo. Lá, uma série de eventos misteriosos o levam a uma torre antiga e isolada, lar de uma travessa garça cinzenta. Quando a nova madrasta de Mahito desaparece, ele segue a garça até a torre e entra num mundo fantástico partilhado pelos vivos e pelos mortos. Ao embarcar em uma jornada épica com a garça como guia, Mahito deve descobrir os segredos deste mundo e a verdade sobre si mesmo.',2023,124,0,35,1,1,'2024-07-10 15:59:15','2024-07-10 18:59:15'),
(5832,'Divertida Mente 2','\"Divertida Mente 2\", da Disney e da Pixar, retorna à mente da adolescente Riley, e o faz no momento em que a sala de comando está passando por uma demolição repentina para dar lugar a algo totalmente inesperado: novas emoções! Alegria, Tristeza, Raiva, Medo e Nojinho não sabem bem como reagir quando Ansiedade aparece, e tudo indica que ela não está sozinha.',2024,100,0,36,1,1,'2024-07-10 16:13:29','2024-07-10 19:13:29'),
(5833,'Gladiador 2','Anos depois de testemunhar a trágica morte do reverenciado herói Maximus (Russell Crowe) nas mãos de seu tio malvado, Lucius (Paul Mescal) se vê forçado a lutar no Coliseu depois que sua terra natal é conquistada por dois imperadores tirânicos, que agora governam Roma. Com o coração ardendo de raiva e o destino do Império pendurado por um fio, Lucius deve enfrentar perigos e inimigos, redescobrindo em seu passado a força e a honra necessárias para trazer a glória de Roma de volta ao seu povo. Prepare-se para uma jornada épica de coragem e vingança na sangrenta arena do Coliseu.',2024,156,12,37,1,1,'2024-07-10 16:29:35','2024-07-10 19:29:35'),
(5834,'Guerra Civil','Em um futuro não tão distante, quando uma guerra civil se instaura nos Estados Unidos, uma equipe pioneira de jornalistas de guerra viaja pelo país para registrar a dimensão e a situação de um cenário violento que tomou as ruas em uma rápida escalada, envolvendo toda a nação. No entanto, o trabalho de registro se transforma em uma guerra de sobrevivência quando eles também se tornam o alvo.',2024,109,18,38,1,1,'2024-07-10 16:39:33','2024-07-10 19:39:33'),
(5835,'Piratas do Caribe: A Maldição do Pérola Negra','O pirata Jack Sparrow tem seu navio saqueado e roubado pelo capitão Barbossa e sua tripulação. Com o navio de Sparrow, Barbossa invade a cidade de Port Royal, levando consigo Elizabeth Swann, filha do governador. Para recuperar sua embarcação, Sparrow recebe a ajuda de Will Turner, um grande amigo de Elizabeth. Eles desbravam os mares em direção à misteriosa Ilha da Morte, tentando impedir que os piratas-esqueleto derramem o sangue de Elizabeth para desfazer a maldição que os assola.',2003,143,14,39,1,1,'2024-07-10 16:48:12','2024-07-10 19:48:12');

INSERT INTO genre_movie VALUES (72,204,1),
(73,199,1),
(74,187,1),
(69,189,5827),
(70,199,5827),
(71,203,5827),
(75,205,5828),
(76,176,5828),
(77,204,5828),
(78,199,5828),
(79,206,5829),
(80,184,5829),
(81,203,5830),
(82,199,5830),
(83,189,5830),
(84,205,5831),
(85,199,5831),
(86,187,5831),
(87,205,5832),
(88,204,5832),
(89,199,5832),
(90,176,5832),
(91,184,5832),
(92,203,5833),
(93,184,5833),
(94,199,5833),
(95,207,5834),
(96,203,5834),
(97,184,5834),
(98,199,5835),
(99,187,5835),
(100,203,5835);

INSERT INTO actor_movie VALUES (66,42,1),
(67,43,1),
(68,44,1),
(69,30,1),
(70,46,1),
(71,31,1),
(72,28,1),
(73,29,1),
(74,26,1),
(75,27,1),
(56,41,5827),
(57,40,5827),
(58,39,5827),
(59,38,5827),
(60,37,5827),
(61,36,5827),
(62,35,5827),
(63,34,5827),
(64,33,5827),
(65,32,5827),
(76,47,5828),
(77,48,5828),
(78,49,5828),
(79,50,5828),
(80,51,5828),
(81,52,5828),
(82,53,5828),
(83,54,5828),
(84,55,5828),
(85,56,5828),
(86,57,5829),
(87,58,5829),
(88,59,5829),
(89,60,5829),
(90,61,5829),
(91,62,5829),
(92,63,5829),
(93,64,5829),
(94,65,5829),
(95,66,5829),
(96,67,5830),
(97,68,5830),
(98,69,5830),
(99,70,5830),
(100,71,5830),
(101,72,5830),
(102,73,5830),
(103,74,5830),
(104,75,5830),
(105,76,5830),
(106,77,5831),
(107,78,5831),
(108,79,5831),
(109,80,5831),
(110,81,5831),
(111,82,5831),
(112,83,5831),
(113,84,5831),
(114,85,5831),
(115,86,5831),
(116,96,5832),
(117,95,5832),
(118,94,5832),
(119,93,5832),
(120,92,5832),
(121,91,5832),
(122,90,5832),
(123,89,5832),
(124,88,5832),
(125,87,5832),
(126,97,5833),
(127,98,5833),
(128,99,5833),
(129,100,5833),
(130,101,5833),
(131,102,5833),
(132,103,5833),
(133,104,5833),
(134,105,5833),
(135,106,5833),
(136,116,5834),
(137,115,5834),
(138,114,5834),
(139,113,5834),
(140,112,5834),
(141,111,5834),
(142,110,5834),
(143,109,5834),
(144,108,5834),
(145,107,5834),
(146,117,5835),
(147,118,5835),
(148,119,5835),
(149,120,5835),
(150,121,5835),
(151,122,5835),
(152,123,5835),
(153,124,5835),
(154,125,5835),
(155,26,5835);

-- READ
SELECT id_genre, name FROM genre;
SELECT id_actor, full_name, birth_date FROM actor;
SELECT id_director, full_name, birth_date FROM director;

-- SEM OS JOINS
SELECT id_movie, title, description, release_year, duration, age_rating, id_director FROM movie;

-- COM OS JOINS
SELECT 
	A.id_movie, 
    A.title, 
    A.description, 
    A.release_year, 
    A.duration, 
    A.age_rating, 
    A.id_director,
	B.*,
    D.*,
    F.*
FROM 
    movie AS A
INNER JOIN director AS B ON A.id_director = B.id_director

LEFT JOIN genre_movie AS C ON A.id_movie = C.id_movie
LEFT JOIN genre AS D ON C.id_genre = D.id_genre

LEFT JOIN actor_movie AS E ON A.id_movie = E.id_movie
LEFT JOIN actor AS F ON E.id_actor = F.id_actor

-- UPDATE
UPDATE genre SET name = "NEW NAME" WHERE id_genre = 1;
UPDATE actor SET birth_date = "2000-01-01" WHERE id_actor = 1;
UPDATE director SET birth_date = "2000-01-01"  WHERE id_director = 1;
UPDATE movie SET title = "PIRATAS E MALDIÇÃO" WHERE id_movie = 1;
UPDATE genre_movie SET id_genre = 1, id_movie = 1 WHERE id_genre_movie = 1;
UPDATE actor_movie SET id_actor = 1, id_movie = 1 WHERE id_actor_movie = 1;

-- DELETE
DELETE FROM genre WHERE id_genre = 1;
DELETE FROM actor WHERE id_actor = 1;
DELETE FROM director WHERE id_director = 1;
DELETE FROM movie WHERE id_movie = 1;
DELETE FROM genre_movie WHERE id_genre_movie = 1;
DELETE FROM actor_movie WHERE id_actor_movie = 1;


-- EXECUTAR ESTES COMANDOS ABAIXO SE A CRIAÇÃO DESSAS CHAVES NÃO TIVEREM SIDO CRIADAS DURANTE O CREATE TABLE
ALTER TABLE genre_movie
ADD CONSTRAINT fk_genre_movie_genre FOREIGN KEY(id_genre) REFERENCES genre(id_genre);

ALTER TABLE genre_movie
ADD CONSTRAINT fk_genre_movie_movie FOREIGN KEY(id_movie) REFERENCES movie(id_movie);

ALTER TABLE actor_movie
ADD CONSTRAINT fk_actor_movie_actor FOREIGN KEY(id_actor) REFERENCES actor(id_actor);

ALTER TABLE actor_movie
ADD CONSTRAINT fk_actor_movie_movie FOREIGN KEY(id_movie) REFERENCES movie(id_movie);

ALTER TABLE movie
ADD CONSTRAINT fk_movie_director FOREIGN KEY(id_director) REFERENCES movie(id_director);