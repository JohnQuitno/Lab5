<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


$mysqli = new mysqli("mysql.eecs.ku.edu", "j073q846", "aehae3Na", "j073q846");

if ($mysqli->connect_errno) {
    echo "<p>Connect failed </p>";
    exit();
}

foreach($_POST as $key => $value)
{
    $query = "DELETE FROM Posts WHERE post_id='$key'";
    if ($result = $mysqli->query($query)) {
        echo "Post with id $key has been deleted\n";
    }
}
?>
