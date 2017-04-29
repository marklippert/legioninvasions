<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <meta name="description" content="A listing of upcoming Legion invasion times for World of Warcraft.">
    <meta name="keywords" content="WoW,World of Warcraft,Legion,invasion,invasions,Alliance,Horde,North America,US,United States,Canada,Oceanic,EU,Europe,European Union">
    
    <title>WoW Legion Invasion Times</title>
    
    <link rel="stylesheet" href="main.css?<?php echo filemtime('main.css'); ?>">
  </head>
  <body>

  <?php
  $CurrentTime = time();
  $EndTime = 1492758000;
  $EndTimeEU = 1492729200;
  $EndTimeOc = 1492758000;

  while($EndTime < $CurrentTime) { $EndTime = $EndTime+66600; }
  while($EndTimeEU < $CurrentTime) { $EndTimeEU = $EndTimeEU+66600; }
  while($EndTimeOc < $CurrentTime) { $EndTimeOc = $EndTimeOc+66600; }

  function TZloop($tz, $et, $us=NULL) {
    echo "
      <div class=\"header\">Invasion Start</div>
      <div class=\"header\">Invasion End</div>
    ";
    
    $dateformat = is_null($us) ? "D, j M, G:i" : "D, M j, g:i A";

    date_default_timezone_set($tz);

    $invasion = ((time() >= $et-21600) && (time() <= $et)) ? ' class="invasion"' : '';

    $i=1;
    while($i <= 90) {
      echo "<div";
      if ((time() >= $et-21600) && (time() <= $et)) echo ' class="invasion"';
      echo ">" . date($dateformat, $et-21600) . "</div>\n";

      echo "<div";
      if ((time() >= $et-21600) && (time() <= $et)) echo ' class="invasion"';
      echo ">" . date($dateformat, $et) . "</div>\n";

      $et = $et+66600;
      $i++;
    }
  }
  ?>

  <h1>WoW Legion Invasion Times</h1>
  
  <input id="na-tab" type="radio" name="tabs" checked><label for="na-tab">North America</label>
  <input id="oc-tab" type="radio" name="tabs"><label for="oc-tab">Oceanic</label>
  <input id="eu-tab" type="radio" name="tabs"><label for="eu-tab">EU</label>
  
  <div id="na-content" class="tab">
    <div>
      <div class="timezone">Pacific</div>
      <?php TZloop('America/Los_Angeles', $EndTime, "us"); ?>
    </div>

    <div>
      <div class="timezone">Mountain</div>
      <?php TZloop('America/Denver', $EndTime, "us"); ?>
    </div>

    <div>
      <div class="timezone">Central</div>
      <?php TZloop('America/Chicago', $EndTime, "us"); ?>
    </div>

    <div>
      <div class="timezone">Eastern</div>
      <?php TZloop('America/New_York', $EndTime, "us"); ?>
    </div>
  </div>
  
  <div id="oc-content" class="tab">
    <div>
      <div class="timezone">AWST</div>
      <?php TZloop('Australia/Perth', $EndTimeOc); ?>
    </div>

    <div>
      <div class="timezone">AEST</div>
      <?php TZloop('Australia/Sydney', $EndTimeOc); ?>
    </div>

    <div>
      <div class="timezone">NZT</div>
      <?php TZloop('Pacific/Auckland', $EndTimeOc); ?>
    </div>
  </div>

  <div id="eu-content" class="tab">
    <div>
      <div class="timezone">UTC</div>
      <?php TZloop('UTC', $EndTimeEU); ?>
    </div>

    <div>
      <div class="timezone">CEST</div>
      <?php TZloop('Europe/Vienna', $EndTimeEU); ?>
    </div>
  </div>

  Based off the <a href="https://docs.google.com/spreadsheets/d/1Uu4rQRANz9XN2pqWDceQUdW6LpmE_-UoEXgXaBzYFTA/htmlview?sle=true" target="new">very useful spreadsheet</a> made by <a href="https://www.reddit.com/user/ManyThingsDeck" target="new">ManyThingsDeck</a>.<br>
  <br>
  <br>

  </body>
</html>