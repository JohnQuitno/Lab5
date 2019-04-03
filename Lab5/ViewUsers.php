<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "j073q846", "aehae3Na", "j073q846");
printf("All users in the database: \n");
if ($mysqli->connect_errno) {
    echo "<p>Connect failed </p>";
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
    echo "<table>";
    while ($row = $result->fetch_assoc()) {

        echo "<tr><td>";
        echo $row["user_id"];
        echo "</td></tr>";
    }
    echo " </table>";
    $result->free();
}



$mysqli->close();

?>
