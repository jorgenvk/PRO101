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
	while($row = $result->fetch_assoc()) {
		echo "Bedriftnavn: " . $row["Bedrift_navn"]. " Kategori: " . $row["Kategori_navn"]. " Adresse: ". $row["Adresse"]. " Tlf: " . $row["Telefon"]. " Beskrivelse: ". $row["Beskrivelse"]. " Åpningstider: ". $row["Åpningstider"]. " Nettside: " . $row["Nettside"]. "<br>";
	}
}	else  { 
	echo "ikke noe resultat";

}

//Lukker tilkoblingen
$conn->close();

?>