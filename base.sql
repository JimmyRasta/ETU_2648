CREATE DATABASE iF NOT EXISTS gestion_the;
USE gestion_the;

CREATE TABLE VarietesDeThe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    occupation_m2 FLOAT,
    rendement_kg_par_mois FLOAT
);

CREATE TABLE Parcelles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(255),
    surface_hectares FLOAT,
    variete_id INT,
    FOREIGN KEY (variete_id) REFERENCES VarietesDeThe(id)
);

CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'cueilleur'
);

CREATE TABLE Cueilleurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    nom VARCHAR(255),
    genre VARCHAR(255),
    date_naissance DATE,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id)
);

CREATE TABLE CategoriesDepenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(255)
);

CREATE TABLE Cueillettes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    cueilleur_id INT,
    parcelle_id INT,
    poids_cueilli FLOAT,
    FOREIGN KEY (cueilleur_id) REFERENCES Cueilleurs(id),
    FOREIGN KEY (parcelle_id) REFERENCES Parcelles(id)
);

CREATE TABLE Depenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    categorie_id INT,
    montant FLOAT,
    FOREIGN KEY (categorie_id) REFERENCES CategoriesDepenses(id)
);

CREATE TABLE SalaireCueilleurs (
    cueilleur_id INT,
    montant_par_kg FLOAT,
    FOREIGN KEY (cueilleur_id) REFERENCES Cueilleurs(id),
    PRIMARY KEY (cueilleur_id)
);

-- Insertion dans VarietesDeThe
INSERT INTO VarietesDeThe (nom, occupation_m2, rendement_kg_par_mois) VALUES
('Oolong', 12.0, 3.0),
('Earl Grey', 9.0, 2.2),
('Sencha', 10.0, 2.5),
('Darjeeling', 8.5, 2.0);

-- Ajouter des parcelles avec les nouvelles variétés de thé
INSERT INTO Parcelles (numero, surface_hectares, variete_id) VALUES
('P001', 1.0, (SELECT id FROM VarietesDeThe WHERE nom = 'Oolong')),
('P002', 0.5, (SELECT id FROM VarietesDeThe WHERE nom = 'Earl Grey')),
('P003', 1.2, (SELECT id FROM VarietesDeThe WHERE nom = 'Sencha')),
('P004', 0.8, (SELECT id FROM VarietesDeThe WHERE nom = 'Darjeeling'));

-- Ajouter des utilisateurs
INSERT INTO Utilisateurs (username, password, role) VALUES
('admin1', 'motdepasseadmin1', 'admin'),
('cueilleur1', 'motdepassecueilleur1', 'cueilleur'),
('cueilleur2', 'motdepassecueilleur2', 'cueilleur'),
('cueilleur3', 'motdepassecueilleur3', 'cueilleur');

-- Ajouter deux cueilleurs
INSERT INTO Cueilleurs (utilisateur_id, nom, genre, date_naissance) VALUES
(1, 'Joelle', 'Femme', '1991-11-13'),
(2, 'Alice', 'Femme', '1990-01-15'),
(3, 'Bob', 'Homme', '1985-05-20'),
(4, 'Charlie', 'Homme', '1992-08-10');

-- Insertion dans CategoriesDepenses
INSERT INTO CategoriesDepenses (categorie) VALUES
('Engrais'),
('Eau'),
('Équipement'),
('Transport');

-- Insertion dans Cueillettes
INSERT INTO Cueillettes (date, cueilleur_id, parcelle_id, poids_cueilli) VALUES
('2023-03-15', 1, 1, 150.0),
('2023-03-16', 2, 2, 120.0),
('2023-03-17', 3, 3, 130.0),
('2023-03-18', 4, 4, 110.0);

-- Insertion dans Depenses
INSERT INTO Depenses (date, categorie_id, montant) VALUES
('2023-03-15', (SELECT id FROM CategoriesDepenses WHERE categorie = 'Engrais'), 200.0),
('2023-03-16', (SELECT id FROM CategoriesDepenses WHERE categorie = 'Eau'), 150.0),
('2023-03-17', (SELECT id FROM CategoriesDepenses WHERE categorie = 'Équipement'), 300.0),
('2023-03-18', (SELECT id FROM CategoriesDepenses WHERE categorie = 'Transport'), 250.0);

-- Insertion dans SalaireCueilleurs
INSERT INTO SalaireCueilleurs (cueilleur_id, montant_par_kg) VALUES
(1, 0.5),
(2, 0.45),
(3, 0.55),
(4, 0.48);