<?php
 define('DB_SERVER', 'localhost:3325');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'eventDB');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0)
{
    $eventname = mysqli_real_escape_string($connect, $data->eventname);
    $place = mysqli_real_escape_string($connect, $data->place);
    $date = mysqli_real_escape_string($connect, $data->date);
    $duration = mysqli_real_escape_string($connect, $data->duration);
    $entryfee = mysqli_real_escape_string($connect, $data->entryfee);
	$btnname = $data->btnname;
	if($btnname == 'ADD')
	{
    $query = "INSERT INTO event(eventname, place, date, duration, entryfee ) VALUES ('$eventname','$place','$date','$duration','$entryfee')";
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
    $query = "UPDATE event SET eventname='$eventname', place='$place', date='$date', duration='$duration', entryfee='$entryfee' WHERE id = '$id'";
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