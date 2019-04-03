<?php
$q1 = $_POST["q1"];
error_reporting(E_ALL);
ini_set("display_errors", 1);
$counter = 0;
$mysqli = new mysqli("mysql.eecs.ku.edu", "j073q846", "aehae3Na", "j073q846");

if ($mysqli->connect_errno) {
    echo "<p>Connect failed </p>";
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    $exists = false;
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"] == $q1)
        {
          $exists = true;
        }
    }
    if($q1=="")
    {
      echo "<p>You left the username empty.</p>";
    }
    else if($exists)
    {
      printf("That Username Exists Already");
    }
    else {

      $query1 = "INSERT INTO Users (user_id) VALUES ('$q1')";
      if ($mysqli->query($query1) === TRUE) {
        echo "New Username successfully";
      } else {
        echo "Error: " . $query1 . "<br>" . $mysqli->error;
      }
    }

    /* free result set */
    $result->free();
}



$mysqli->close();

?>
