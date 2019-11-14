<?php
define('DB_SERVER', 'localhost:3325');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'eventDB');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0)
{

		$id = $data->id;
		$query = "DELETE FROM event WHERE id = '$id'";
		if(mysqli_query($connect,$query))
		{
			echo 'Data deleted...';
		}
		else
		{
			echo 'Error';
		}
}


?>