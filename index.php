<?php

$html = "";
$url = "https://isecure.bath.ac.uk/computingavailability/RSS/?id=1&images=16&format=single&geo=true";
$xml = simplexml_load_file($url);

//$title = $xml->channel->title;
//$subtitle = $xml->channel->item[0]->title;
$description = $xml->channel->item[0]->description;
$pubdate = $xml->channel->item[0]->pubDate;

$description = explode("\n", $description);
unset($description[3]);
unset($description[5]);

$description = preg_replace('/class=".+\/(\D+)\d+\.png"/', 'class="$1"', $description);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SeatMe!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
  <div class="box">

    <header class="row header">
      <h1> SeatMe! <br> <small> Univesity of Bath Library </small> </h1>
    </header>

    <section class="row content">
      <?php
        foreach($description as $floor ){
          echo $floor . "\n";
        }
      ?>
    </section>
  
    <footer class="row footer"> Updated: <?php echo $pubdate?> </footer>
  </div>
</body>

<html>
