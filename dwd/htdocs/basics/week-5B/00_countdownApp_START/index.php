<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS Stylesheet -->
  <link rel="stylesheet" href="./style.css">
  <title>Countdown to Xmas</title>
</head>
<body>
  <h1>Christmas Day</h1>

  <!-- PHP COUNTDOWN FUNCTIONS -->
  <?php
    function countdownTimer() {
      // TODAY'S DATE (using UNIX timestamp - seconds):
      $today = time();
  
      // TIMESTAMP OF CHRISTMAS DAY:
      $christmasDay = strtotime(date("Y") . "-12-25");
  
      // CHECK IF PASSED XMAS IN CURRENT YEAR
      if(date("m") == 12 && date("d") > 25){
        // Use the timestamp for next year's Christmas Day.
        $christmasDay = strtotime((date("Y") + 1) . "-12-25");
      }
  
      // TOTAL NUMBER OF SECONDS BETWEEN TODAY & XMAS: 
      $totalSeconds = $christmasDay - $today;
  
      // CHALLENGE PT 1 - TAKE TOTAL SECONDS & BREAK UP INTO $days, $hours, $mins & $seconds:
      $days = 0;
      $hours = 0;
      $mins = 0;
      $seconds = 0;

      // CHALLENGE PT 2 - RETURN the VARIABLES -- so they are accessible outside the function's block scope

      // HINT: PHP can only return MULTIPLE variables in an ARRAY
    }

    // INITIAL FUNCTION CALL
    $countdowns = countdownTimer();
  ?>

  <!-- COUNTDOWN TIMER -->
  <!-- CHALLENGE PT 3 - RETRIEVE DYNAMIC VARIABLES & OUTPUT INTO THE CORRECT PART IN THE HTML: -->
  <div class="countdown-container">
    <div class="countdown-el">
      <p class="big-text" id="days">
        0
      </p>
      <span>days</span>
    </div>

    <div class="countdown-el">
      <p class="big-text" id="hours">
        0
      </p>
      <span>hours</span>
    </div>

    <div class="countdown-el">
      <p class="big-text" id="mins">
        0
      </p>
      <span>mins</span>
    </div>

    <div class="countdown-el">
      <p class="big-text" id="seconds">
        0
      </p>
      <span>seconds</span>
    </div>
  </div>

  <!-- NOTE: ENABLE THIS ONCE COMPLETE - IT WILL "AUTO-REFRESH" THE PAGE, to act like a LIVE timer! -->

  <!-- <script type="text/javascript">
    setInterval(function(){
    window.location = "./index.php";
    } , 1000);
  </script> -->
</body>
</html>