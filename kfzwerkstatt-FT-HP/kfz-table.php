<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kfz_werkstatt</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">

</head>

<script>
    new DataTable('#kfz_werkstatt-Kunden');
    new DataTable('#kfz_werkstatt-Kfz');
    new DataTable('#kfz_werkstatt-rechnung');
    new DataTable('#kfz_werkstatt-konten');
    new DataTable('#kfz_werkstatt-leistungen');
    new DataTable('#kfz_werkstatt-rechnungsdetails');
    new DataTable('#kfz_werkstatt-lieferanten');
</script>

<body>
    <h2>Alle Kunden</h2>


<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kfz_werkstatt";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_kfz_kunden";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-Kunden' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>ID</th>
        <th>Anrede</th>
        <th>TITEL</th>
        <th>ZUNAME</th>
        <th>VORNAME</th>
        <th>Firma</th>
        <th>STRASSE</th>
        <th>PLZ</th>
        <th>ORT</th>
        <th>Telefon</th>
        <th>Telefon2</th>
        <th>mail</th>
        <th>Kundeseit</th>
        <th>Fax</th>
        <th>Kommentar</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["NUMMER"]."</td>"
        ."<td>".$row["Anrede"]."</td>"
        ."<td>".$row["TITEL"]."</td>"
        ."<td>".$row["ZUNAME"]."</td>"
        ."<td>".$row["VORNAME"]."</td>"
        ."<td>".$row["Firma"]."</td>"
        ."<td>".$row["STRASSE"]."</td>"
        ."<td>".$row["PLZ"]."</td>"
        ."<td>".$row["ORT"]."</td>"
        ."<td>".$row["Telefon"]."</td>"
        ."<td>".$row["Telefon2"]."</td>"
        ."<td>".$row["mail"]."</td>"
        ."<td>".$row["Kundeseit"]."</td>"
        ."<td>".$row["Fax"]."</td>"
        ."<td>".$row["Kommentar"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}

?>
<h2>Alle Fahrzeuge</h2>
<?php

$sql = "SELECT * FROM tbl_kfz_kfz";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-Kfz' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>KndID</th>
        <th>KenZe.</th>
        <th>Marke</th>
        <th>Typ</th>
        <th>BJ</th>
        <th>kmSt.</th>
        <th>kw</th>
        <th>treibstoff</th>
        <th>Tueren</th>
        <th>Form</th>
        <th>Zulassung</th>
        <th>Erstzulassung</th>
        <th>Fahrgestellnummer</th>
        <th>Motornummer</th>
        <th>Hubraum</th>
        <th>FIN</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["KundenNr"]."</td>"
        ."<td>".$row["Kennzeichen"]."</td>"
        ."<td>".$row["Marke"]."</td>"
        ."<td>".$row["Typ"]."</td>"
        ."<td>".$row["Baujahr"]."</td>"
        ."<td>".$row["kmStand"]."</td>"
        ."<td>".$row["kw"]."</td>"
        ."<td>".$row["treibstoff"]."</td>"
        ."<td>".$row["Tueren"]."</td>"
        ."<td>".$row["karosieform"]."</td>"
        ."<td>".$row["Zulassung"]."</td>"
        ."<td>".$row["Erstzulassung"]."</td>"
        ."<td>".$row["Fahrgestellnummer"]."</td>"
        ."<td>".$row["Motornummer"]."</td>"
        ."<td>".$row["Hubraum"]."</td>"
        ."<td>".$row["FIN"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}
?>
<h2>Alle Rechnungen</h2>
<?php

$sql = "SELECT * FROM tbl_rechnungen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-rechnung' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>RechnungsNr</th>
        <th>KundenNr</th>
        <th>Datum</th>
        <th>Rechnungsbetrag</th>
        <th>Bezahlt</th>
        <th>Zahlungsdatum</th>
        <th>Kommentar</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["RechnungsNr"]."</td>"
        ."<td>".$row["KundenNr"]."</td>"
        ."<td>".$row["Datum"]."</td>"
        ."<td>".$row["Rechnungsbetrag"]."</td>"
        ."<td>".$row["Bezahlt"]."</td>"
        ."<td>".$row["Zahlungsdatum"]."</td>"
        ."<td>".$row["Kommentar"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}
?>
<h2>Alle Konten</h2>
<?php

$sql = "SELECT * FROM tbl_konten";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-konten' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>KontoID</th>
        <th>Kontenbezeichnung</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["ID"]."</td>"
        ."<td>".$row["Kontenbezeichnung"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}
?>
<h2>Alle Leistungen</h2>
<?php

$sql = "SELECT * FROM tbl_leistungen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-leistungen' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>LeistungsNr</th>
        <th>Bezeichnung</th>
        <th>Preis</th>
        <th>KontenNr</th>
        <th>Steuersatz</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["LeistungsNr"]."</td>"
        ."<td>".$row["Bezeichnung"]."</td>"
        ."<td>".$row["Preis"]."</td>"
        ."<td>".$row["KontenNr"]."</td>"
        ."<td>".$row["Steuersatz"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}
?>
<h2>Alle Rechnungen</h2>
<?php

$sql = "SELECT * FROM tbl_rechnungsdetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-rechnungsdetails' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>DetailNr</th>
        <th>RechnungsNr</th>
        <th>LeistungsNr</th>
        <th>Menge</th>
        <th>Einzelpreis</th>
        <th>Gesamtpreis</th>
        <th>Steuersatz</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["DetailNr"]."</td>"
        ."<td>".$row["RechnungsNr"]."</td>"
        ."<td>".$row["LeistungsNr"]."</td>"
        ."<td>".$row["Menge"]."</td>"
        ."<td>".$row["Einzelpreis"]."</td>"
        ."<td>".$row["Gesamtpreis"]."</td>"
        ."<td>".$row["Steuersatz"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}
?>
<h2>Alle Rechnungsdetails</h2>
<?php

$sql = "SELECT * FROM tbl_lieferanten";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' id='kfz_werkstatt-lieferanten' class='display table table-striped table-light' style='width:100%'>";
    echo "<thead>

    <tr>
        <th>LieferantenNr</th>
        <th>LieferantName</th>
        <th>STRASSE</th>
        <th>PLZ</th>
        <th>ORT</th>
        <th>Telefon</th>
        <th>mail</th>
        <th>Ansprechpartner</th>
    </tr>

    </thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>"
        ."<td>".$row["LieferantenNr"]."</td>"
        ."<td>".$row["LieferantName"]."</td>"
        ."<td>".$row["STRASSE"]."</td>"
        ."<td>".$row["PLZ"]."</td>"
        ."<td>".$row["ORT"]."</td>"
        ."<td>".$row["Telefon"]."</td>"
        ."<td>".$row["mail"]."</td>"
        ."<td>".$row["Ansprechpartner"]."</td>"
        ;

    }
    echo "</table>";

} else {
    echo "Keine Datensätze gefunden";
}

$conn->close();
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrp/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>