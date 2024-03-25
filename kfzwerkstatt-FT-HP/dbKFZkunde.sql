DROP DATABASE IF EXISTS kfz_werkstatt;
CREATE DATABASE IF NOT EXISTS kfz_werkstatt;
USE kfz_werkstatt;

DROP TABLE IF EXISTS tbl_kfz_kunden;
CREATE TABLE IF NOT EXISTS tbl_kfz_kunden (
    NUMMER INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Anrede VARCHAR(20),
    TITEL VARCHAR(20),
    ZUNAME VARCHAR(50),
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

DROP TABLE IF EXISTS tbl_kfz_kfz;
CREATE TABLE IF NOT EXISTS tbl_kfz_kfz (
    IdNr INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    KundenNr INT(11),
    Kennzeichen VARCHAR(50),
    Marke VARCHAR(50),
    Typ VARCHAR(50),
    Baujahr VARCHAR(50),
    kmStand INT(11),
    kw INT(11),
    treibstoff VARCHAR(50),
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

INSERT INTO tbl_kfz_kfz (KundenNr, Kennzeichen, Marke, Typ, Baujahr, kmStand, kw, treibstoff, Tueren, karosieform, Zulassung, Erstzulassung, Fahrgestellnummer, Motornummer, Hubraum, FIN) VALUES 
(1, 'M-XY 1234', 'Volkswagen', 'Golf', '2018', 50000, 110, 'Diesel', '5', 'Limousine', '2023-04-01', '2018-05-01', 'WVWZZZ1JZ3W386752', 'AB123456789', 1968, 'WVWZZZAUZEW123456'),
(2, 'B-XY 9876', 'Mercedes-Benz', 'C-Klasse', '2020', 30000, 135, 'Benzin', '4', 'Coupe', '2023-05-02', '2020-06-02', 'WDD2040011A123456', 'CD789012345', 1595, 'WDDGF4HB8EA123456');

INSERT INTO tbl_rechnungen (KundenNr, Datum, Rechnungsbetrag, Bezahlt, Zahlungsdatum, Kommentar) VALUES 
(1, '2024-03-20', 1200.00, FALSE, NULL, 'Inspektion und Bremsenwechsel'),
(2, '2024-03-21', 800.50, TRUE, '2024-03-22', 'Ölwechsel und neue Reifen');

INSERT INTO tbl_konten (ID, Kontenbezeichnung) VALUES
(1, 'Betriebskosten'),
(2, 'Ersatzteile');

INSERT INTO tbl_leistungen (LeistungsNr, Bezeichnung, Preis, KontenNr, Steuersatz) VALUES
(1, 'Inspektion', 200.00, 1, 20.00),
(2, 'Reifenwechsel', 50.00, 2, 20.00);

INSERT INTO tbl_rechnungsdetails (RechnungsNr, LeistungsNr, Menge, Einzelpreis, Gesamtpreis, Steuersatz) VALUES 
(1, 1, 1, 800.00, 800.00, 20.00),
(1, 2, 4, 100.00, 400.00, 20.00);

INSERT INTO tbl_lieferanten (Name, STRASSE, PLZ, ORT, Telefon, mail, Ansprechpartner) VALUES
('AutoTeile Meister', 'Gewerbestraße 5', 12345, 'Industriestadt', '01234 56789', 'kontakt@autoteilemeister.de', 'Herr Schmidt'),
('ReifenRundum', 'Reifenweg 2', 23456, 'Reifenstadt', '02345 67890', 'service@reifenrundum.de', 'Frau Müller'),
('LackProfi', 'Lackierallee 8', 34567, 'Farbenstadt', '03456 78901', 'info@lackprofi.de', 'Herr Braun');

INSERT INTO tbl_steuersaetze (Beschreibung, Steuersatz) VALUES
('Standard MwSt.', 20.00),
('Ermäßigter Satz', 7.00),
('Dienstleistungen', 20.00);
