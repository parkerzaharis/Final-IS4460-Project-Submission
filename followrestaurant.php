<html>

<head>

<h1>Restaurants to Follow</h1>

</head>

<body>

    <form method = 'post' action = 'option-type.php'>
        <input type = 'submit' value = 'Back to Options'></input>
    </form>

</body>
</html>

<?php
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "Select * from Restaurant"; //this is the query
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{

    echo "Restaurant_Name: <a href=food-list.php?restaurantid=$row[Restaurant_ID]>$row[Restaurant_Name] </a><br>";
    
    echo "<form method = 'post' action = 'followaction.php'><input type = 'submit' value = 'Follow'></input></form>";
    
    echo '<br>';
}

$result->close();
$conn->close();

?>

