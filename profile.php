<?php
session_start();
 define('DB_SERVER', 'localhost:3325');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'samplelogindb');
    $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
?>
<!DOCTYPE html>
<head>
</title>profile</title>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body>
<div ng-app="myapp" ng-controller="usercontroller" ng-init=displaydata()>
<center>
<table border = "2px">
		<tr>
		<th>sr.no.</th>
		<th>username</th>
		<th>password</th>
		</tr>
		<tr ng-repeat="x in names">
		<td>{{x.id}}</td>
		<td>{{x.username}}</td>
		<td>{{x.password}}</td>
		<td><button ng-click="updatedata(x.id,x.username, x.password)">UPDATE</button></td>
		<td><button ng-click="deletedata(x.id)">DELETE</button></td>
		</tr>
		</table>
		user name:<input type="text" name="username" ng-model="username" placeholder="user name"/><br><br>
        password:<input type="password" name="password" ng-model="password" placeholder="password"/><br><br>
        
        
        <input style="background-color:#3FA0DE; color:black; padding: 5px; border-color:#3FA0DE; border-width:3px;" type="submit" name="submit" ng-click="insertdata()" value="{{btnname}}"/><br><br>
		
		</center>
		</div>
		</body>
		</html>
		<script>
   <script>
    var app = angular.module("myapp",[]);
    app.controller("usercontroller",function($scope,$http){
		$scope.btnname = "ADD";
        $scope.insertdata = function(){
            $http.post(
                "uinsert.php",
            {
                'username':$scope.username, 'password':$scope.password, 'btnname':$scope.btnname, 'id':$scope.id
            }
            ).success(function(data){
                alert(data);
                $scope.username = null;
                $scope.password = null;
				$scope.btnname = "ADD";
				$scope.displaydata();
            });
            
        }
		$scope.displaydata = function(){
            $http.get("udata.php")
            .success(function(data){
                $scope.names = data;
            });
            
        }
		$scope.deletedata = function(id){
			if(confirm("Are you sure you want to delete this data?"))
			{
				$http.post("udel.php",{'id':id})
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
		$scope.updatedata = function(id, username, place, date, duration, entryfee){
			$scope.id = id;
			$scope.username = username;
			$scope.password = password;
			$scope.btnname = "UPDATE";
			
		}
    });
</script>
