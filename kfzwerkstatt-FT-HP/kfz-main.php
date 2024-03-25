<?php

// Initialize the session
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kfz_werkstatt";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die ("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kfz_werkstatt</title>

    <!-- Bootstrap CSS 5.3.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

    <!-- Bootstrap JS 5.3.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="kfz-stylesheet.css">

    <?php
    error_reporting(E_ALL);
    // Melde alle PHP-Fehler
    error_reporting(-1);
    ?>

    <script src="kfz-JS.js"></script>

    <style>
        iframe {
            width: 100%;
            height: 800px;
        }

        #divContent1,
        #divContent2,
        #divContent3,
        #divContent4 {
            flex: 4;
        }

        #divContent1,
        #divContent2,
        #divContent3,
        #divContent4 {
            display: none;
        }
    </style>

</head>

<body>

    <header class="bg-primary text-white p-3">
        <h1>kfz_werkstatt</h1>
    </header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <div class="container-fluid">

            <a class="navbar-brand" href="#"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="foo1()">Main</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="foo2()">Neues KFZ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="foo3()">Neuer Kunde</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="foo4()">Tabellen</a>
                    </li>

                    <!-- 
                    <li class="nav-item" style="display: none">
                        <a class="nav-link" href="#" onclick="foo5()"></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="foo6()"></a>
                    </li> -->

                </ul>

            </div>
        </div>
    </nav>


    <main>


        <div id="divContent1">
            <iframe src="kfz-config.php" frameborder="0" style="height: 200px"></iframe>
        </div>

        <div id="divContent2">
            <iframe src="kfz-newEntryKFZ.php" frameborder="0"></iframe>
        </div>

        <div id="divContent3">
            <iframe src="kfz-newEntryKunde.php" frameborder="0"></iframe>
        </div>

        <div id="divContent4">
            <iframe src="kfz-table.php" frameborder="0"></iframe>
        </div>

        <!-- 
        <div id="divContent5">
            <iframe src="kfz-.php" frameborder="0"></iframe>
        </div>

        <div id="divContent6">
            <iframe src="kfz-.php" frameborder="0"></iframe>
        </div> -->




    </main>

    <div class="container">
        <footer class="py-3 my-4">
            <nav>
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a class="nav-link" href="#" title="NEWS">NEWS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" title="Links">Links</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" title="Impressum">Impressum</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"
                            title="Datenschutzerklärung">Datenschutzerklärung</a></li>
                </ul>
            </nav>
            <p class="text-center text-body-secondary">&#169;2024 KFZ KUNDEN</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

</body>

</html>