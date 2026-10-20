CREATE DATABASE skipass_arabi; 

CREATE TABLE skipass_arabi.Carte( 
    IdCarte INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    numCarte INT UNSIGNED,
    dateDebutValide DATE,
    dateFinValide DATE
) ENGINE= InnoDB;

INSERT INTO skipass_arabi.Carte VALUES
    (NULL, "372846", "2026/07/18", "2026/07/28"),
    (NULL, "482910", "2026/08/01", "2026/08/07"),
    (NULL, "193852", "2026/08/10", "2026/08/20"),
    (NULL, "674921", "2026/12/15", "2026/12/22"),
    (NULL, "830194", "2026/12/20", "2027/01/03"),
    (NULL, "529384", "2027/01/10", "2027/01/17"),
    (NULL, "746192", "2027/02/06", "2027/02/13"),
    (NULL, "294817", "2027/02/20", "2027/02/27"),
    (NULL, "618395", "2027/03/05", "2027/03/15"),
    (NULL, "905183", "2027/04/01", "2027/04/10");

CREATE TABLE skipass_arabi.Users ( 
    `login` CHAR(50) PRIMARY KEY,
    `password` CHAR(65), -- 64 car on utilise un Hash avec cette taille le sha256
    `nom` CHAR(100),
    `prenom` CHAR(100),
    `admin` BOOLEAN
) ENGINE= InnoDB;

INSERT INTO skipass_arabi.Users VALUES 
    ("Motard_du_74", "866980e9ee247649c64d2c7692b5d551c10ca447b29a016b36ef54717ac5e3fb", "Thivand", "Quentin", 0), -- Mdp : Sous-fifre.67
    ("Le_Bg_du_74", "d4e9f0763b1a60e2cbce0c1afbc58256a338a06d8408dccad0ea2203f61ba97c", "Arabi", "Marwan", 1), -- Mdp ; Goat.74
    ("admin", "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918", "admin", "admin", 1); -- Mdp : admin


-- OLD ONE FOR EXEMPLE
-- CREATE DATABASE Skipass; 

-- CREATE TABLE Skipass.RfidCarte( 
-- 	IdRFID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	StartValid DATE,
-- 	EndValid DATE
-- ) ENGINE= InnoDB;

-- CREATE TABLE Skipass.TypePay( 
-- 	IdType INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	NomType VARCHAR(12)
-- ) ENGINE= InnoDB;

-- CREATE TABLE Skipass.ClientStation( 
-- 	IdClient INT UNSIGNED PRIMARY KEY,
-- 	NomClient VARCHAR(20),
-- 	PrenomClient VARCHAR(20),
-- 	MailClient VARCHAR(50),
-- 	DnClient DATE,
-- 	FOREIGN KEY (TypeClient) REFERENCES TypePay(IdType)
-- ) ENGINE= InnoDB;


-- CREATE TABLE Skipass.LienCarteClient( 
-- 	FOREIGN KEY (Client) REFERENCES ClientStation(IdClient),
-- 	FOREIGN KEY (Carte) REFERENCES RfidCarte(IdRFID) PRIMARY KEY
-- ) ENGINE= InnoDB;

-- INSERT INTO Skipass.TypePay VALUES
-- 	(NULL, "étudiant"),
-- 	(NULL, "retraité"),
-- 	(NULL, "plein tarif");

-- INSERT INTO Skipass.ClientStation VALUES 
-- 	(NULL, "Bosquet", "Jean", "jboq@live.fr", "2007/03/18", 1),
-- 	(NULL, "Allard", "Pierre", "pall@gmail.com", "1995/01/13", 3),
-- 	(NULL, "Arabi", "Marwan", "arabimarwan5@gmail.com", "2005/03/12", 1);

-- INSERT INTO Skipass.RfidCarte VALUES
-- 	("15741", "2000/01/01", "2000/01/01"),
-- 	("16026", "2026/09/15", "2026/09/15"),
-- 	("17895", "2000/01/01", "2000/01/01"),
-- 	("30568", "2026/09/14", "2026/09/20");

-- INSERT INTO Skipass.LienCarteClient VALUES
-- 	("1", "16026"),
-- 	("1", "17895"),
-- 	("2", "30568");

-- SELECT MailClient FROM ClientStation;
-- SELECT NomClient FROM ClientStation WHERE ClientStation.IdType = (SELECT IdType FROM TypePay WHERE NomType= "étudiant");
-- SELECT Carte FROM LienCarteClient WHERE LienCarteClient.IdClient = (SELECT IdClient FROM ClientStation WHERE PrenomClient = "Jean" AND NomClient = "Boquet" AND DnClient = "2007/03/18");

-- SELECT IdRFID FROM RfidCarte WHERE RfidCarte.StartValid >= "2022/01/01" AND RfidCarte.StartValid <= "2022/12/31";
-- SELECT NomClient, PrenomClient, DnClient FROM ClientStation WHERE DnClient = (SELECT MAX(DnClient) FROM ClientStation);
-- UPDATE ClientStation SET MailClient = "p.allard@gmail.com" WHERE LienCarteClient.IdClient = (SELECT IdClient FROM ClientStation WHERE PrenomClient = "Pierre" AND NomClient = "Allard" AND DnClient = "1995/01/13");