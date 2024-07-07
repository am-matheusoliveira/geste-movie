
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
	description	 VARCHAR(500) NOT NULL,
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
INSERT INTO genre(name) VALUES("Ação");
INSERT INTO actor(full_name, birth_date) VALUES("Johnny Depp", "1996-12-28");
INSERT INTO director(full_name, birth_date) VALUES("ERICK CARTER", "1996-12-28");
INSERT INTO movie(title, description, release_year, duration, age_rating, id_director, usu_insert, usu_update, dt_update) VALUES("Piratas do Caribe", "A Maldição do Pérola Negra", 2010, 120, 14, 1, 1, 1, NOW());
INSERT INTO genre_movie(id_genre, id_movie) VALUES(1, 1);
INSERT INTO actor_movie(id_actor, id_movie) VALUES(1, 1);

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