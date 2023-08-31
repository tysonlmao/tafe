<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Challenge</title>
  <style>
    /* Quasi-CSS Reset (normally done with Universal Selector) */
    html {
      margin: 0;
      padding: 0;
      font-size: 100%;
      box-sizing: border-box;
    } 
    /* Basic Styling */
    body {
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 2rem 2rem;
      background: #fff;
    }
    header {
      background: #23237B;
      color: #fff;
      padding: 1rem;
      border-radius: 10px;
      margin-bottom: 2rem;
    }
    ol > li {
      margin: 20px 0px;
      font-weight: 800;
    }
    /* Challenge Section Styling */
    section {
      background: #c8c8ef;
      color: #000000;
      padding: 1rem;
      border-radius: 10px;
      height: 90vh;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- 1. CHALLENGE DESCRIPTION AREA -->
  <header>
    <h2>Form Challenge: Instructions <span style="color: gold;">[1HR Exercise]</span></h2>
    <p>You are to create a form, as for your HTML & CSS Hokkaido website, which will require the user to submit a booking request for lodging at The Green Leaf Niseko Village Hotel.  The form must have the following functionality:</p>
    <ol>
      <li>Create a form that requires five fields (+ submit button):</li>
      <ul>
        <li>Name</li>
        <li>Email</li>
        <li>Room Selection between: Twin, Deluxe or Premium</li>
        <li>Requested Arrival Date</li>
        <li>Requested Leave Date</li>
      </ul>
      <li>Create a box below the form which will provide feedback on the booking request, and depending on entry, will show:</li>
        <ul>
          <li>"Congratulations - Successful Booking for "Name" on "Arrival Date" to "Leave Date" (in "success" colouring)</li>
          <li>"Incorrect Action - You need to submit your request correctly!" (in "danger" colouring)</li>
          <li>"Missing Information - You need enter all required details to book!" (in "warning" colouring)</li>
        </ul>
      <li>Using PHP, make the form submit TO THIS SAME PAGE & allow for the information to be sent via $_GET</li>
    </ol>
  </header>

  <!-- 2. CHALLENGE COMPLETION AREA -->
  <section>
    <h2>Form Challenge Area</h2>
    <p>Complete your form here!</p>
    
    <form action="./05_formChallenge.php" method="POST">
      <fieldest>
        <button type="submit">Submit</button>
      </fieldest>
    </form>
  </section>
</body>
</html>