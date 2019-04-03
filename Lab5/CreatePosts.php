<?php
$q1 = $_POST["q1"];
$blogPost = $_POST["blogPost"];
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
    if($blogPost=="")
    {
      printf("Blog Post Can't be empty");
    }
    else if($exists){
      $query1 = "INSERT INTO Posts (post_id, author_id, content) VALUES ('NULL' , '$q1', '$blogPost')";
      if ($mysqli->query($query1) === TRUE) {
        echo "New Post Added";
      } else {
        echo "Error: " . $query1 . "<br>" . $mysqli->error;
      }
    }
    else {
      printf("That isn't a Valid Username");
    }

    /* free result set */
    $result->free();
}
?>
