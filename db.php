<?php
$servername = "ns1.ams33.siteground.eu";
$username = "oasisarc_grp35";
$password = "gruppe35erbest";
$dbname = "oasisarc_pro100";

// Kobler til
$conn = new mysqli($servername, $username, $password, $dbname);

// Sjekker kobling
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

// Oppretter database
$sql = "CREATE DATABASE testdb";
if ($conn->query($sql) === true) {
    echo "Opprettet database <br>";
} else {
    echo "Database ble ikke opprettet: " . $conn->error . "<br>";
}

// Lager en tabell i databasen

$sql = "CREATE TABLE tabelltest (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
navn VARCHAR(32) NOT NULL
)";



if ($conn->query($sql) === TRUE) {
    echo "Tabell testtabell ble opprettet <br>";
} else {
    echo "Tabell ble ikke opprettet: " . $conn->error . "<br>";
}

$conn->close();
