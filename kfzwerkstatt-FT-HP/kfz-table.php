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
        <th>KundenNr</th>
        <th>Kennzeichen</th>
        <th>Marke</th>
        <th>Typ</th>
        <th>Baujahr</th>
        <th>kmStand</th>
        <th>kw</th>
        <th>treibstoff</th>
        <th>Tueren</th>
        <th>karosserie</th>
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