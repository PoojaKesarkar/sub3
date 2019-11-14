<?php
 define('DB_SERVER', 'localhost:3325');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'samplelogindb');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0)
{
    $username = mysqli_real_escape_string($connect, $data->username);
    $password = mysqli_real_escape_string($connect, $data->password);
	$btnname = $data->btnname;
	if($btnname == 'ADD')
	{
    $query = "INSERT INTO user(username, password) VALUES ('$username','$password')";
    if(mysqli_query($connect,$query))
    {
        echo 'Data Inserted...';
    }
    else{
        echo 'Error';
    }
	}
	if($btnname == 'UPDATE')
	{
		$id = $data->id;
    $query = "UPDATE user SET username='$username', password='$password' WHERE id = '$id'";
    if(mysqli_query($connect,$query))
    {
        echo 'Data Updated...';
    }
    else{
        echo 'Error';
    }
	}
}
?>