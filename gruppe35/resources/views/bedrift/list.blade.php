<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Se resultat</title>

<!-- Midlertidig link til TwitterBootstrap - byttes ut med egen CSS etterhvert -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

   <div class="container">
   		<div class="col-md-12">
   			<h1>Resultat</h1>

   			<?php foreach($bedrifter as $bedrift) { ?>
   			<table class="table">

   				<tr>
   					<th>Bedriftens navn</th>
   					<th>Adresse</th>
   					<th>Tlf</th>
   					<th>Beskrivelse</th>
   					<th>Åpningstider</th>
   					<th>Nettside</th>
   				</tr>
   				<tr>

   					<td><?= $bedrift['Bedrift_navn'] ?></td>
   					<td><?= $bedrift['Adresse'] ?></td>
   					<td><?= $bedrift['Telefon'] ?></td>
   					<td><?= $bedrift['Beskrivelse'] ?></td>
   					<td><?= $bedrift['Åpningstider'] ?></td>
   					<td><?= $bedrift['Nettside'] ?></td>
   				</tr>
   			</table>
   			<?php } ?>
   		</div>
        
   </div> 

</body>
</html>