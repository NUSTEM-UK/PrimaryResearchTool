<!DOCTYPE html>
<html>
  <head>
    <title>NUSTEM Games</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="img/NUSTEMSQR.jpg"/>
    <?php
      session_start();
    ?>
  </head>

  <body>

    <div id="content">
    	<h1>NUSTEM’s Games</h1>
      <p>Hi... Welcome to NUSTEM’s games pages. In a minute you will get to play two different games.</p>
      <p>But before you get started please add your name, date of birth and school name below (name and dates will be used to create an anonymous identifier):</p>
      <form action="./redirect.php" method="post">
        <input type="text" name="fname" placeholder="First name..." required>
        <input type="text" name="lname" placeholder="Last name..." required>
        <input type="number" name="bday" min="1" max="31" placeholder="Birth day...">

        <select name="bmonth" required>
          <option selected disabled>Birth month...</option>
          <option value='01'>January</option>
          <option value='02'>February</option>
          <option value='03'>March</option>
          <option value='04'>April</option>
          <option value='05'>May</option>
          <option value='06'>June</option>
          <option value='07'>July</option>
          <option value='08'>August</option>
          <option value='09'>September</option>
          <option value='10'>October</option>
          <option value='11'>November</option>
          <option value='12'>December</option>
        </select>

        <select name="school" required>
          <option selected disabled>Select school...</option>
          <option value='0000'>Test School</option>
          <option value='0021'>Chopwell</option>
          <option value='0022'>Castletown</option>
          <option value='0023'>Morpeth Road</option>
          <option value='0024'>Albany Village</option>
        </select>

        <input type="submit" class="submit" value="To Activity">
      </form>
    </div>

  </body>
</html>
