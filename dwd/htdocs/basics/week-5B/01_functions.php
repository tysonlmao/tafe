<?php

// ACTIVITY NO.6 [HARD]
  // Restructure the following application to utilizes functions - a function that formats the name
  function correctCase($name) {
    $foo = strtolower($name);
    $bar = ucwords($foo);
    return $bar;
  }
  echo correctCase("TYSON GILL");
  ?>

  <!-- HTML Structure - NOTE: We are OUTSIDE PHP brackets! -->
  <h4>Order Details</h4>
  <ul>
    <li><?php echo ($name); ?></li>
  </ul>