<html>
<head>
<h1> Thank you for leaving a review!</h1>
<h2> You're doing all the foodies a favor.' </h2>
</html>

<?php


$page_roles = array('admin,user');
require_once 'login.php';

$foodid = $_GET['foodid'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="add-review.php" method="post"><pre>	
	Review <input type="text" name="Review"></br></br>
	Rating <input type="int" name="Rating"></br></br>	
	<input type="submit" name="Add Review">
	<input type="hidden" name="add-review">
	<input type="hidden"name="foodid" value="$foodid">
	</br></br>
	</br></br>
	<button>
	<a href="view-review.php" > View All Reviews</a>
	</button>
	<br><br><br>
	<button>
		<a href='logout.php'>Logout</a>	
	</button>
</pre></form>
_END;


if(isset($_POST['add-review'])){
		$Food_ID=get_post($conn, 'foodid');
		$MemberID=1234;
		$Review=get_post($conn, 'Review');
		$Rating=get_post($conn,'Rating');
		$Date= date("Y/m/d");;
		
		session_start();
		$restaurantid = $_SESSION['restaurantid'];

		$query="INSERT INTO Review (Food_ID, MemberID, Review, Rating, Date) VALUES ".
			"($Food_ID, $MemberID, '$Review',$Rating, '$Date')";
		echo $query;
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed: $query <br>" .
			$conn->error . "<br><br>";
	
	
}
 

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>