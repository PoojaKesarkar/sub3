<!DOCTYPE html>
<html>
    <head>
        <title>Enter an event</title>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		<style>
button{
background-color:#3FA0DE;
color:black;
padding: 5px;
border-color:#3FA0DE;
border-width:3px;
}
</style>
    </head>
    <body>
        <center>
        <div ng-app="myapp" ng-controller="usercontroller" ng-init="displaydata()">
        Event name:<input type="text" name="name" ng-model="name" placeholder="Event name, eg.college event"/><br><br>
        place:<input type="text" name="place" ng-model="place" placeholder="Place, eg.panaji"/><br><br>
        date:<input type="date" name="date" ng-model="date" placeholder="date, eg.12/06/2019"/><br><br>
        duration:<input type="number" name="time" ng-model="time" placeholder="duration in hours, eg. 2"/><br><br>
        entry fee:<input type="number" name="fee" ng-model="fee" placeholder="fee in Rs., eg.200"/><br><br>
        
        <input style="background-color:#3FA0DE; color:black; padding: 5px; border-color:#3FA0DE; border-width:3px;" type="submit" name="submit" ng-click="insertdata()" value="{{btnname}}"/><br><br>
		<table border = "2px">
		<tr>
		<th>sr.no.</th>
		<th>event name</th>
		<th>place</th>
		<th>date</th>
		<th>duration in hours</th>
		<th>entry fee</th>
		</tr>
		<tr ng-repeat="x in names">
		<td>{{x.id}}</td>
		<td>{{x.eventname}}</td>
		<td>{{x.place}}</td>
		<td>{{x.date}}</td>
		<td>{{x.duration}}</td>
		<td>{{x.entryfee}}</td>
		<td><button ng-click="updatedata(x.id,x.eventname, x.place,x.date, x.duration, x.entryfee)">UPDATE</button></td>
		<td><button ng-click="deletedata(x.id)">DELETE</button></td>
		</tr>
		</table>
        </div>
        </center>
        </body>
    </body>
</html>
<script>
    var app = angular.module("myapp",[]);
    app.controller("usercontroller",function($scope,$http){
		$scope.btnname = "ADD";
        $scope.insertdata = function(){
            $http.post(
                "insert.php",
            {
                'eventname':$scope.name, 'place':$scope.place, 'date':$scope.date, 'duration':$scope.time,
                'entryfee':$scope.fee, 'btnname':$scope.btnname, 'id':$scope.id
            }
            ).success(function(data){
                alert(data);
                $scope.name = null;
                $scope.place = null;
                $scope.date = null;
                $scope.time = null;
                $scope.fee = null;
				$scope.btnname = "ADD";
				$scope.displaydata();
            });
            
        }
		$scope.displaydata = function(){
            $http.get("data.php")
            .success(function(data){
                $scope.names = data;
            });
            
        }
		$scope.deletedata = function(id){
			if(confirm("Are you sure you want to delete this data?"))
			{
				$http.post("del.php",{'id':id})
				.success(function(data){
					alert(data);
					$scope.displaydata();
				});
			}
			else
			{
				return false;
			}
		}
		$scope.updatedata = function(id, eventname, place, date, duration, entryfee){
			$scope.id = id;
			$scope.eventname = eventname;
			$scope.place = place;
			$scope.date = date;
			$scope.duration = duration;
			$scope.entryfee = entryfee;
			$scope.btnname = "UPDATE";
			
		}
    });
</script>