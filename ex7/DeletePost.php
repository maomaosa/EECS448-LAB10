<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "y900f401", "Ad4yiev9", "y900f401");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}

$checkedboxes = $_POST["checked"];

printf ('You Delete posts with post_id :');

for($i=0; $i<count($checkedboxes); $i++)
{
    printf ($checkedboxes[$i]);
}

for($i=0; $i<count($checkedboxes); $i++)
{
    $delete = "DELETE FROM Posts WHERE post_id=$checkedboxes[$i]";
    $mysqli->query($delete);
}



$mysqli->close();
?>