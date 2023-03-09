<html>

<head>

<h1>My Following</h1>

</head>

<body>

    <form method = 'post' action = 'option-type.php'>
        <input type = 'submit' value = 'Back to Options'></input>
    </form>


<?php

require_once 'login.php';
require_once 'users.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT
            f.Restaurant_ID,
            Restaurant_Name
        FROM
            Restaurant r
            JOIN Follow f
            ON r.Restaurant_ID = f.Restaurant_ID;";


$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{

    echo "<a href=food-list.php?restaurantid=$row[Restaurant_ID]>$row[Restaurant_Name] </a><br>";
    
    echo '<br>';
}

?>

<body>


</html>
