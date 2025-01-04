CREATE DATABASE IF NOT EXISTS IMDB;

USE IMDB;

CREATE TABLE IF NOT EXISTS Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    director VARCHAR(50) NOT NULL,
    image_url VARCHAR(255),
    price DECIMAL(5,2) NOT NULL,
    category ENUM('Action', 'Drama') NOT NULL,
    video_url VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Actors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS MovieActors (
    movie_id INT,
    actor_id INT,
    FOREIGN KEY (movie_id) REFERENCES Movies(id),
    FOREIGN KEY (actor_id) REFERENCES Actors(id),
    PRIMARY KEY (movie_id, actor_id)
);

CREATE TABLE IF NOT EXISTS Cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    movie_id INT,
    quantity INT NOT NULL DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (movie_id) REFERENCES Movies(id)
);



INSERT INTO Movies (title, director, image_url, price, category, video_url) VALUES 
    ('Maiidan', 'Amit Ravindernath Sharma', 'https://fr.web.img3.acsta.net/c_310_420/img/2d/98/2d981c0d676f4c8b2283495e4fbffef7.jpg', 9.99, 'Drama', 'https://www.youtube.com/embed/tZMkLuvLfbg'),
    ('Devdas', 'Sanjay Leela Bhansali', 'https://fr.web.img5.acsta.net/c_310_420/medias/nmedia/18/35/06/13/affiche.jpg', 8.99, 'Drama', 'https://www.youtube.com/embed/8tuHQWGMQwY'),
    ('Baahubali 2 : La Conclusion', 'S.S. Rajamouli', 'https://fr.web.img2.acsta.net/c_310_420/pictures/17/04/12/09/54/236145.jpg', 7.99, 'Action', 'https://www.youtube.com/embed/G62HrubdD6o'),
    ('My Name Is Khan', 'Karan Johar', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/76/84/68/19434195.jpg', 7.99, 'Drama', 'https://www.youtube.com/embed/nqxgYT3TYzY'),
    ('Veer-Zaara', 'Yash Chopra', 'https://fr.web.img4.acsta.net/c_310_420/medias/nmedia/18/36/02/83/18479862.jpg', 6.99, 'Drama', 'https://www.youtube.com/embed/OSaVImLnnsw'),
    ('Titli, Une chronique indienne', 'Kanu Behl', 'https://fr.web.img3.acsta.net/c_310_420/pictures/15/02/26/12/00/381426.jpg', 8.99, 'Drama', 'https://www.youtube.com/embed/OOqiQiMkXDA'),
    ('Om Shanti Om', 'Farah Khan', 'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/18/72/53/53/19777448.jpg', 6.99, 'Drama', 'https://www.youtube.com/embed/9oeGoQGt7Ao'),
    ('Le Salon de musique', 'Satyajit Ray', 'https://fr.web.img2.acsta.net/c_310_420/pictures/22/12/27/10/45/1618165.jpg', 7.99, 'Drama', 'https://www.youtube.com/embed/ELEQ15eCEgg'),
    ('Dhoom 3', 'Vijay Krishna Acharya', 'https://fr.web.img5.acsta.net/c_310_420/pictures/13/12/10/13/06/508635.jpg', 9.99, 'Action', 'https://www.youtube.com/embed/yeF_b8EQcK0'),
    ('Ram-Leela', 'Sanjay Leela Bhansali', 'https://fr.web.img6.acsta.net/c_310_420/pictures/210/568/21056873_2013111212034165.jpg', 8.99, 'Drama', 'https://www.youtube.com/embed/StphRCLkx6Q'),
    ('Black', 'Sanjay Leela Bhansali', 'https://fr.web.img4.acsta.net/c_310_420/medias/nmedia/18/36/02/66/18610091.jpg', 7.99, 'Drama', 'https://www.youtube.com/embed/1lBPzx52YfY'),
    ('New York masala', 'Nikhil Advani', 'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/18/35/58/85/18409967.jpg', 7.99, 'Drama', 'https://www.youtube.com/embed/tVMAQAsjsOU'),
    ('Gangs of Wasseypur - Part 1', 'Anurag Kashyap', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/91/72/52/20160269.jpg', 8.99, 'Action', 'https://www.youtube.com/embed/j-AkWDkXcMY'),
    ('Baaghi 3', 'Ahmed Khan', 'https://fr.web.img5.acsta.net/c_310_420/pictures/20/02/21/19/22/1328121.jpg', 9.99, 'Action', 'https://www.youtube.com/embed/jQzDujMzfoU'),
    ('Don', 'Farhan Akhtar', 'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/18/79/01/60/19487194.jpg', 8.99, 'Action', 'https://www.youtube.com/embed/_cJRiAfr2PE'),
    ('Selfiee', 'Raj Mehta', 'https://fr.web.img3.acsta.net/c_310_420/pictures/23/02/07/15/56/0899022.jpg', 6.99, 'Action', 'https://www.youtube.com/embed/lS1KScfdr70'),
    ('Marjaavaan', 'Milap Zaveri', 'https://fr.web.img5.acsta.net/c_310_420/pictures/19/10/28/09/07/4038674.jpg', 7.99, 'Action', 'https://www.youtube.com/embed/L7TbPUOn1hc'),
    ('Panipat', 'Ashutosh Gowariker', 'https://fr.web.img3.acsta.net/c_310_420/pictures/19/01/24/15/24/0398891.jpg', 6.99, 'Action', 'https://www.youtube.com/embed/zpXnmy-6w1g'),
    ('Kaabil', 'Sanjay Gupta', 'https://fr.web.img5.acsta.net/c_310_420/pictures/17/01/23/09/29/103382.jpg', 8.99, 'Action', 'https://www.youtube.com/embed/om7uaoXqG3U'),
    ('Thugs of Hindostan', 'Vijay Krishna Acharya', 'https://fr.web.img6.acsta.net/c_310_420/pictures/18/10/08/10/09/5853009.jpg', 7.99, 'Action', 'https://www.youtube.com/embed/zI-Pux4uaqM');

INSERT INTO Actors (name) VALUES 
    ('Ajday Devgan'),
    ('Kiron Kher'),
    ('Prabhas Raju'),
    ('Shah Rukh Khan'),
    ('Preity Zinta'),
    ('Shashank Arora'),
    ('Deepika Padukone'),
    ('Utpal Dutt'),
    ('Aamir Khan'),
    ('Kajol Devgan'),
    ('Rani Mukerji'),
    ('Amitabh Bachchan'),
    ('Ranveer Singh'),
    ('Hrithik Roshan'),
    ('Shah Rukh Khan'),
    ('Kareena Kapoor'),
    ('Tiger Shroff'),
    ('Shraddha Kapoor'),
    ('Shah Rukh Khan'),
    ('Amitabh Bachchan');

INSERT INTO MovieActors (movie_id, actor_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 4),
    (5, 5),
    (6, 6),
    (7, 4),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10),
    (11, 4),
    (11, 11),
    (12, 4),
    (12, 12),
    (13, 13),
    (14, 14),
    (15, 15),
    (16, 4),
    (16, 16),
    (17, 17),
    (18, 18),
    (19, 19),
    (20, 4),
    (20, 20)

