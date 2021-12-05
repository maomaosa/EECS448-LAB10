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
$content = $_POST["content"];

$insert = "INSERT INTO Users (user_id) VALUES ('$username')";
$query = "SELECT * FROM Users WHERE user_id = '$username'";
$insertpost = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";


if($result = $mysqli->query($query))
{
    if($result->num_rows > 0)
    {
        if($content == "")
        {
            printf("Content cannot be empty!");
        }
        else
        {
            if($mysqli->query($insertpost))
            {
                printf("Success!");
            }
        }
        
    }
    else
    {
        printf("You are not in the User list!");
    }
}

$mysqli->close();
?>
