DROP DATABASE IF EXISTS kfz_werkstatt;
CREATE DATABASE IF NOT EXISTS kfz_werkstatt;
USE kfz_werkstatt;

CREATE TABLE IF NOT EXISTS tbl_kfz_kunden (
    NUMMER INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Anrede VARCHAR(20),
    TITEL VARCHAR(20),
    NAME VARCHAR(50),
    VORNAME VARCHAR(40),
    Firma VARCHAR(50),
    STRASSE VARCHAR(50),
    PLZ INT(11),
    ORT VARCHAR(40),
    Telefon VARCHAR(50),
    Telefon2 VARCHAR(50),
    mail VARCHAR(50),
    Kundeseit VARCHAR(50),
    Fax VARCHAR(50),
    Kommentar VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS tbl_kfz_kfz (
    IdNr INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    KundenNr INT(11),
    Kennzeichen VARCHAR(50),
    Marke VARCHAR(50),
    Typ VARCHAR(50),
    Baujahr VARCHAR(50),
    kmStand INT(11),
    kw INT(11),
    BenzinDiesel VARCHAR(50),
    Tueren VARCHAR(50),
    karosieform VARCHAR(50),
    Zulassung VARCHAR(50),
    Erstzulassung VARCHAR(50),
    Fahrgestellnummer VARCHAR(50),
    Motornummer VARCHAR(50),
    Hubraum INT,
    FIN VARCHAR(255),
    FOREIGN KEY (KundenNr) REFERENCES tbl_kfz_kunden(NUMMER)
);






INSERT INTO tbl_kfz_kunden (Anrede, TITEL, NAME, VORNAME, Firma, STRASSE, PLZ, ORT, Telefon, Telefon2, mail, Kundeseit, Fax, Kommentar) VALUES
('Herr', 'Dr.', 'Müller', 'Max', 'Müller GmbH', 'Musterstraße 1', 12345, 'Musterstadt', '0123 456789', '0987 654321', 'max.mueller@example.com', '01.01.2020', '0123 456788', 'Sehr zuverlässig'),
('Frau', 'Prof.', 'Schmidt', 'Eva', 'Schmidt AG', 'Beispielweg 2', 23456, 'Beispielstadt', '0234 567890', '0876 543210', 'eva.schmidt@example.com', '15.03.2018', '0234 567889', 'Stammkunde'),
('Herr', '', 'Fischer', 'Tom', 'Fischer und Söhne', 'Hauptstraße 3', 34567, 'Hauptstadt', '0345 678901', '0765 432109', 'tom.fischer@example.com', '20.07.2019', '0345 678902', 'Empfohlen durch Freund');

INSERT INTO tbl_kfz_kfz (KundenNr, Kennzeichen, Marke, Typ, Baujahr, kmStand, kw, BenzinDiesel, Tueren, karosieform, Zulassung, Erstzulassung, Fahrgestellnummer, Motornummer, Hubraum, FIN) VALUES
(1, 'M-XX 1234', 'Volkswagen', 'Golf', '2020', 15000, 110, 'Benzin', '5', 'Limousine', '02.02.2020', '01.01.2020', 'WVWZZZ1JZXW000001', '12345678', 1984, 'FIN12345678901234'),
(2, 'B-YY 5678', 'Mercedes-Benz', 'C-Klasse', '2018', 25000, 150, 'Diesel', '4', 'Kombi', '15.03.2018', '14.02.2018', 'WDD2040041A000002', '87654321', 2143, 'FIN23456789012345'),
(3, 'D-ZZ 9012', 'BMW', '3er', '2021', 5000, 120, 'Benzin', '4', 'Coupé', '20.07.2021', '19.06.2021', 'WBAAA31000AZ00003', '11223344', 1998, 'FIN34567890123456');