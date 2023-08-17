<?php 
  // TODAY'S DATE (using UNIX timestamp - seconds):
  $today = time();

  // TIMESTAMP OF CHRISTMAS DAY IN TOTAL SECONDS:
  $christmasDay = strtotime(date("Y") . "-12-25");

  // CHECK IF PASSED XMAS IN CURRENT YEAR
  if(date("m") == 12 && date("d") > 25){
    // Use the timestamp for next year's Christmas Day.
    $christmasDay = strtotime((date("Y") + 1) . "-12-25");
  }

  // TOTAL NUMBER OF SECONDS BETWEEN TODAY & XMAS REMAINING: 
  $totalSeconds = $christmasDay - $today;

  // CHALLENGE PT 1 - TAKE TOTAL SECONDS & BREAK UP INTO $days, $hours, $mins & $seconds:
  $days = floor($totalSeconds / 60 / 60 / 24);
  $hours = 0;
  $mins = 0;
  $seconds = 0;

  // TEST YOUR METHODS:
  echo "<p>Days: $days</p>";
  echo "<p>Hours: $hours</p>";
  echo "<p>Mins: $mins</p>";
  echo "<p>Seconds: $seconds</p>";
?>