<?php
$servername = "oasisarchive.com";
$username = "oasisarc_grp35";
$password = "gruppe35erbest";
$dbname = "oasisarc_pro100";

// Kobler til
$conn = new mysqli($servername, $username, $password, $dbname);

// Sjekker kobling
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
