<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "y900f401", "Ad4yiev9", "y900f401");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}

$usernames = "SELECT * FROM Users";
echo '<table border="1">';
echo '<tr><td>User name</td></tr>';

$result = $mysqli->query($usernames);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo '<tr><td>'. $row["user_id"] . '</td></tr>';
    }
}

echo'</table>';




$mysqli->close();
?>