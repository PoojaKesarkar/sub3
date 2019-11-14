<?php
define('DB_SERVER', 'localhost:3325');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'eventDB');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$output = array();
$query = "SELECT * FROM event";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		$output[] = $row;
	}
	echo json_encode($output);
}
?>