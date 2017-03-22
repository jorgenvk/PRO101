<?php 
$servername = "ns1.ams33.siteground.eu";
$username = "oasisarc_grp35";
$password = "gruppe35erbest";
$database = "oasisarc_pro100";

//Kobler til database
$conn = new mysqli($servername, $username, $password, $database);

// Sjekker kobling
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//SQL spørring
$sql = "SELECT * FROM Bedrifter";

$result = $conn->query($sql);

//Hvis resultatet av spørringen gir mer enn null rader, skriv ut. 
if($result->num_rows > 0) {
	echo "<table><tr><th>Bedriftens navn</th><th>Kategori</th><th>Adresse</th><th>Tlf</th><th>Beskrivelse</th><th>Åpningstider</th><th>Nettside</th></tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["Bedrift_navn"]."</td><td>".$row["Kategori_navn"]."</td><td>".$row["Adresse"]."</td><td>".$row["Telefon"]. "</td><td>".$row["Beskrivelse"]."</td><td>".$row["Åpningstider"]."</td><td>".$row["Nettside"]."</td></tr>";
	}
	echo "</table>";
}	else  { 
	echo "ikke noe resultat";

}

//Lukker tilkoblingen
$conn->close();

?>