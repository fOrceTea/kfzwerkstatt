DROP DATABASE IF EXISTS kfz_werkstatt;
CREATE DATABASE kfz_werkstatt;
USE kfz_werkstatt;

CREATE TABLE IF NOT EXISTS Kunde (
    KundenID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100),
    Adresse VARCHAR(255),
    PLZ VARCHAR(10),
    Ort VARCHAR(100),
    Email VARCHAR(100),
    Telefon VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS Lieferant (
    LieferantID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100),
    Adresse VARCHAR(255),
    PLZ VARCHAR(10),
    Ort VARCHAR(100),
    Telefon VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS Fahrzeug (
    VIN VARCHAR(17) PRIMARY KEY,
    KundenID INT,
    Marke VARCHAR(50),
    Modell VARCHAR(50),
    Baujahr INT,
    Fahrgestellnummer VARCHAR(20),
    Motornummer VARCHAR(20),
    FOREIGN KEY (KundenID) REFERENCES Kunde(KundenID)
);

CREATE TABLE IF NOT EXISTS Rechnung (
    RechnungsID INT PRIMARY KEY AUTO_INCREMENT,
    VIN VARCHAR(17),
    Rechnungsdatum DATE,
    Betrag DECIMAL(10, 2),
    Arbeitsstunden INT,
    Materialkosten DECIMAL(10, 2),
    Steuersatz DECIMAL(5, 2),
    Gesamtbetrag DECIMAL(10, 2),
    Zahlungsstatus VARCHAR(20),
    Zahlungsdatum DATE,
    Bemerkung TEXT,
    FOREIGN KEY (VIN) REFERENCES Fahrzeug(VIN)
);

CREATE TABLE IF NOT EXISTS Ersatzteil (
    TeilID INT PRIMARY KEY AUTO_INCREMENT,
    Bezeichnung VARCHAR(100),
    Hersteller VARCHAR(100),
    LieferantID INT,
    Preis DECIMAL(10, 2),
    FOREIGN KEY (LieferantID) REFERENCES Lieferant(LieferantID)
);

CREATE TABLE IF NOT EXISTS Verwendete_Ersatzteile (
    RechnungsID INT,
    TeilID INT,
    Menge INT,
    PRIMARY KEY (RechnungsID, TeilID),
    FOREIGN KEY (RechnungsID) REFERENCES Rechnung(RechnungsID),
    FOREIGN KEY (TeilID) REFERENCES Ersatzteil(TeilID)
);

INSERT INTO Kunde (Name, Adresse, PLZ, Ort, Email, Telefon) VALUES
('Max Mustermann', 'Musterstraße 123', '54321', 'Musterstadt', 'max.mustermann@example.com', '+43123456789'),
('Maria Müller', 'Hauptplatz 7', '12345', 'Müllerdorf', 'maria.mueller@example.com', '+43654321098'),
('Peter Schmidt', 'Schlossallee 42', '67890', 'Schmidtstadt', 'peter.schmidt@example.com', '+43876543210');

INSERT INTO Lieferant (Name, Adresse, PLZ, Ort, Telefon) VALUES
('Autoteile GmbH', 'Industriestraße 55', '54321', 'Ersatzteilstadt', '+43876543210'),
('Reifenprofi AG', 'Reifenweg 10', '12345', 'Rädertal', '+43123456789'),
('Ölhandel Schmidt', 'Ölstraße 3', '67890', 'Schmiermittelstadt', '+436543210987');

INSERT INTO Fahrzeug (VIN, KundenID, Marke, Modell, Baujahr, Fahrgestellnummer, Motornummer) VALUES
('1HGCM82633A004352', 1, 'Honda', 'Accord', 2003, '123456789', '987654321'),
('JHMAP114XYT002206', 2, 'Honda', 'Civic', 2000, '987654321', '123456789'),
('2C3CDXBG3KH502153', 3, 'Chrysler', '300', 2019, '24681012', '12182430');

INSERT INTO Rechnung (VIN, Rechnungsdatum, Betrag, Arbeitsstunden, Materialkosten, Steuersatz, Gesamtbetrag, Zahlungsstatus, Zahlungsdatum, Bemerkung) VALUES
('1HGCM82633A004352', '2024-03-01', 250.00, 5, 100.00, 20.00, 360.00, 'Offen', NULL, 'Reparatur Bremsen'),
('JHMAP114XYT002206', '2024-02-15', 150.00, 3, 50.00, 20.00, 216.00, 'Bezahlt', '2024-02-20', 'Ölwechsel und Filterwechsel'),
('2C3CDXBG3KH502153', '2024-02-28', 500.00, 8, 200.00, 20.00, 720.00, 'Bezahlt', '2024-03-05', 'Motorüberholung');

INSERT INTO Ersatzteil (Bezeichnung, Hersteller, LieferantID, Preis) VALUES
('Bremsbeläge', 'Brembo', 1, 50.00),
('Ölfilter', 'Bosch', 3, 10.00),
('Zahnriemen', 'Contitech', 2, 80.00);

INSERT INTO Verwendete_Ersatzteile (RechnungsID, TeilID, Menge) VALUES
(1,1,2),
(2,2,1),
(3,3,1);