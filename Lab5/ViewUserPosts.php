<?php
$user = $_POST["Username"];
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "j073q846", "aehae3Na", "j073q846");

$query = "SELECT author_id, content FROM Posts WHERE author_id='$user'";

if ($mysqli->connect_errno) {
    echo "<p>Connect failed </p>";
    exit();
}


if ($result = $mysqli->query($query)) {
    echo "<table> <th> Username </th> <th> Posts</th>";
    while ($row = $result->fetch_assoc()) {

        echo "<tr><td>";
        echo $row["author_id"];
        echo "</td><td>";
        echo $row["content"];
        echo "</td></tr>";
    }
    echo " </table>";
    $result->free();
}



?>
