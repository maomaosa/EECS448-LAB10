<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "y900f401", "Ad4yiev9", "y900f401");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}

$username = $_POST["username"];
$query = "SELECT * FROM Posts WHERE author_id = '$username'";

echo '<table border="1">';
echo '<tr><td>post id</td><td>User name</td><td>content</td></tr>';

$result = $mysqli->query($query);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo '<tr><td>'. $row["post_id"] . '</td><td>'. $row["author_id"] . '</td><td>'. $row["content"] . '</td></tr>';
    }
}

echo'</table>';




$mysqli->close();
?>