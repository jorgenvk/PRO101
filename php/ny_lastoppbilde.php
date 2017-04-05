<?php
include_once 'db_connection.php';
// PHP/MYSQL :: eventuelle spørringer for å hente alle bilder
// $query_hentbilder = $conn->prepare("SELECT * FROM Bilder WHERE bedrift_id = ?");
// $query_hentbilder->bind_param('i', 123);
// $query_hentbilder->execute();

// PHP/MYSQL :: Laste opp bilde-sti i DB, samt flytte opplastet fil til mappe
if (!empty($_POST))
  {
    //
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Test av opplasting av bilde</title>

<!-- Midlertidig link til TwitterBootstrap - byttes ut med egen CSS etterhvert -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Midlertidig design for knapp til bildeopplasting - byttes ut med egen CSS etterhvert -->
<style>
label.myLabel input[type="file"] {
    position: fixed;
    top: -1000px;
}

/***** Example custom styling *****/
.myLabel {
    border: 2px solid #AAA;
    border-radius: 4px;
    padding: 2px 5px;
    margin: 2px;
    background: #DDD;
    display: inline-block;
}
.myLabel:hover {
    background: #CCC;
}
.myLabel:active {
    background: #CCF;
}
.myLabel :invalid + span {
    color: #A44;
}
.myLabel :valid + span {
    color: #4A4;
}
</style>
</head>
<body>

   <div class="container">

      <div class="row">
        <h2>Last opp bilde:</h2>

        <!-- KNAPP -->
        <div class="col-md-3 col-sm-3 col-xs-6">
          <label class="myLabel">
          <input type="file" required/>
          <span>My Label</span>
          </label>
        </div>

      </div>
        
    </div> <!-- /container -->

</body>
</html>