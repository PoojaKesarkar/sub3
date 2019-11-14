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
<html>
<head></head>
<pre>
"[[1,6],[2,6],[3,9],[4,5],[5,9],[6,4],[7,-1],[8,-5],[9,-10],[10,-12],[11,-7],[12,-10],[13,-10],[14,-13],[15,-18],[16,-14],[17,-11],[18,-12],[19,-15],[20,-12],[21,-12],[22,-12],[23,-8],[24,-11],[25,-9],[26,-8],[27,-5],[28,-5],[29,-3],[30,-7],[31,-6],[32,-3],[33,-1],[34,-2],[35,3],[36,3],[37,2],[38,-3],[39,-2],[40,-2],[41,-4],[42,-4],[43,-2],[44,2],[45,4],[46,7],[47,9],[48,9],[49,6],[50,10],[51,7],[52,9],[53,8],[54,4],[55,8],[56,3],[57,5],[58,6],[59,7],[60,5],[61,8],[62,4],[63,0],[64,-1],[65,-1],[66,-5],[67,-1],[68,4],[69,0],[70,0],[71,0],[72,0],[73,-5],[74,-8],[75,-10],[76,-7],[77,-2],[78,-7],[79,-10],[80,-14],[81,-10],[82,-11],[83,-7],[84,-10],[85,-10],[86,-8],[87,-10],[88,-14],[89,-16],[90,-12],[91,-13],[92,-17],[93,-22],[94,-21],[95,-20],[96,-19],[97,-17],[98,-18],[99,-17],[100,-14]]"

</pre>
</body>
</html>