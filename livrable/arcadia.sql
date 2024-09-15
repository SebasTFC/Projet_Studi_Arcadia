CREATE DATABASE ArcadiaZoo;
USE ArcadiaZoo;

CREATE TABLE users (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

INSERT INTO users (id,nom,prenom,email,password,role) VALUES
(1,'Escorne','Sébastien','admin@admin.fr','Azerty11&','admin'),
(2,'Escorne','Séverine','veto@veto.fr','Azerty11&','veterinaire'),
(3,'Escorne','Dylan','employe@employe.fr','Azerty11&','employe');



-- Create the habitat table 
CREATE TABLE habitat (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    image TEXT NOT NULL,
    description TEXT NOT NULL 
);

INSERT INTO habitat (id,nom,image,description) VALUES
(1,'La savane','savane.jpg','Réplique parfaite d un safari, vous découvrirez une plaine aride'),
(2,'La jungle','jungle.jpg','Vous vous retrouverez au milieu de la jungle où côtoient diverses espèces d oiseaux'),
(3,'Les marais','marais.jpg','Regardez bien au fond de l eau des animaux s y cachent parfois !');

-- Create the animal table with a foreign key to habitat
CREATE TABLE animal (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    race VARCHAR(50) NOT NULL,
    image VARCHAR(50) NOT NULL,
    id_habitat INT NOT NULL,
    CONSTRAINT FK_animal_habitat
    FOREIGN KEY (id_habitat) REFERENCES habitat(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

INSERT INTO animal (id,prenom,race,image,id_habitat) VALUES
(1,'Coco','Peroquet','perroquet.jpeg',2),
(2,'Hector','Crocodile','crocodile.jpeg',3),
(3,'Will','Lynx','chat_zoo.jpg',1);


-- Create the employee table 
CREATE TABLE avis (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) NOT NULL,
    commentaire TEXT NOT NULL,
    date_avis DATE NOT NULL,
    validation TINYINT(1) NOT NULL
);

INSERT INTO avis (id,pseudo,commentaire,date_avis,validation) VALUES
(1,'Dupont56','Joli zoo avec beaucoup d animaux à voir','2024/03/03',1),
(2,'Angel','La presence du guide est une super idée','2024/04/09',1);


-- Create the horaire table 
CREATE TABLE horaire (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    h_ouv TIME NOT NULL,
    h_ferm TIME NOT NULL
);

INSERT INTO horaire (id,h_ouv,h_ferm) VALUES (1,'8:30','17:50');

-- Create the service table
CREATE TABLE service (
    id INTEGER NOT NULL PRIMARY KEY,
    nom TEXT NOT NULL,
    description TEXT NOT NULL,
    image TEXT NOT NULL
);

INSERT INTO service (id,nom,description,image) VALUES
(1,'Petit train','Vous pourrez visiter le zoo à bord du petit train spécialement conçu pour passer au plus près des animaux','petit_train.jpg'),
(2,'Restaurant du zoo','Une envie de petite pause gastronomique !','restauration.jpg'),
(3,'Guide','Pour encore mieux découvrir les animaux, demandez un guide(Gratuit)','restauration.jpg');

CREATE TABLE visitemedicale (
    id_etat INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_etat DATE NOT NULL,
    etat_etat TEXT NOT NULL,
    detail_etat TEXT NOT NULL,
    id_animal INTEGER NOT NULL,
    CONSTRAINT PK_visite_medical_animal 
    FOREIGN KEY (id_animal) REFERENCES animal(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE 
);

INSERT INTO visitemedicale (id_etat,date_etat,etat_etat,detail_etat,id_animal) VALUES
(1,'2024/03/03','Grande forme','Rien à signaler',1),
(2,'2024/04/04','Etat à surveiller','Se remet d une rage de dents',2),
(3,'2024/09/05','Grande forme','Animal en très bonne santé',3);

CREATE TABLE nourriture (
    id_nou INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_nou DATE NOT NULL,
    heure_nou TIME NOT NULL,
    donnee_nou VARCHAR(50) NOT NULL,
    quantite_nou INTEGER(8) NOT NULL,
    id_animal INTEGER NOT NULL,
    CONSTRAINT PK_nourriture_animal
    FOREIGN KEY (id_animal) REFERENCES animal(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

INSERT INTO nourriture (id_nou,date_nou,heure_nou,donnee_nou,quantite_nou,id_animal) VALUES
(1,'2024/03/03','12:30:00','Viande',2500,1),
(2,'2024/12/09','14:15:00','Foin',3000,2),
(3,'2024/06/09','11:02:00','Graines',2000,3);

