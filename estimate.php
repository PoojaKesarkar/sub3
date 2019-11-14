<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Estimation</title>

 <script type="text/javascript">
        window.onload = function() {
            var dps = []; //dataPoints. 

            var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Events"
                },
				axisY: {
		title: "Number of students"
	},
                data: [{
                    type: "column",
					showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Name of the event",
                    dataPoints: dps
                }]
            });
 
            function addDataPointsAndRender() {
                event1 = document.getElementById("event1").value;
                number1 = Number(document.getElementById("number1").value);
				event2 = document.getElementById("event2").value;
                number2 = Number(document.getElementById("number2").value);
				event3 = document.getElementById("event3").value;
                number3 = Number(document.getElementById("number3").value);
				event4 = document.getElementById("event4").value;
                number4 = Number(document.getElementById("number4").value);
                dps.push({
                    label: event1,
                    y: number1
                },
				{
                    label: event2,
                    y: number2
                },
				{
                    label: event3,
                    y: number3
                },
				{
                    label: event4,
                    y: number4
                });
               chart.render();
            }
			

            var renderButton = document.getElementById("renderButton");
            renderButton.addEventListener("click", addDataPointsAndRender);
        }
    </script>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div >

<label><b>name of competition 1:</b></label><br>
<input id="event1" type="text" required/>
<br>
<label><b>no. of student participated :</b></label><br>
<input id="number1" type="number" required/>
<br>
<label><b>name of competition 2:</b></label><br>
<input id="event2" type="text" required/>
<br>
<br>
<label><b>no. of student participated:</b></label><br>
<input id="number2" type="number" required/>
<label><b>name of competition 3:</b></label><br>
<input id="event3" type="text" required/>
<br>
<br>
<label><b>no. of student participated:</b></label><br>
<input id="number3" type="number" required/>
<label><b>name of competition 4:</b></label><br>
<input id="event4" type="text" required/>
<br>
<label><b>no. of student participated:</b></label><br>
<input id="number4" type="number" required/>
<br>
<button id="renderButton">Generate</button>


<div id="chartContainer" style="height: 300px; width: 100%;"></div>

</body>
</html>