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

$insert = "INSERT INTO Users (user_id) VALUES ('$username')";
$query = "SELECT * FROM Users WHERE user_id = '$username'";

if($result = $mysqli->query($query))
{
    if($result->num_rows > 0)
    {
        printf("This name has been used!");
        echo '<script>alert("This name has been used!")</script>';
    }
    else
    {
        if($username == "")
        {
            printf("Empty name!");
            echo '<script>alert("Empty name!")</script>';
        }
        else
        {
            $mysqli->query($insert);
            printf("Success!");
            echo '<script>alert("Success!")</script>';
        }
        

    }
}






$mysqli->close();
?>



    