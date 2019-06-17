@include('HR_views.navigation_header')

<script type="text/javascript">

	function myfunction(empId){


		window.location = "http://172.16.136.35/HRDashboardEzone/public/view_employee_details?empId="+empId;


	}

		function hrfunction(){


		window.location = "http://172.16.136.35/HRDashboardEzone/public/view_employee_hr";


	}
		function namefunction(){


		window.location = "http://172.16.136.35/HRDashboardEzone/public/view_employee";


	}
</script>


   

 

		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Employees of Ezone.</h3>
			<div class="panel-body1">

				<div ng-app="myApp" ng-controller="customersCtrl" >
				<label><b><i>Search</i></b></label> 
				<input type="text" ng-model="search" style="width: 100%;border-radius:5px;color:#000;">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  <th onclick="hrfunction();" style="cursor: pointer; cursor: hand;">HR_ID</th>
							  <th onclick="namefunction();" style="cursor: pointer; cursor: hand;">Name</th>
							  <th>Email</th>
							  <th>Phone</th>
							  <th>Designation</th>
							  <th>Department</th>
							
							</tr>
						  </thead>
						  <tbody>
							<tr ng-repeat="x in names| filter:search">
							<td id="@{{x.employee_row_id}}" onclick="myfunction(this.id);">@{{ x.hr_id }}</td>
							  <td id="@{{x.employee_row_id}}" onclick="myfunction(this.id);">@{{ x.name }}</td>
							  <td id="@{{x.employee_row_id}}" onclick="myfunction(this.id);">@{{ x.email }}</td>
							  <td id="@{{x.employee_row_id}}" onclick="myfunction(this.id);">@{{ x.phone }}</td>
							  <td id="@{{x.employee_row_id}}" onclick="myfunction(this.id);">@{{ x.designation }}</td>
							  <td id="@{{x.employee_row_id}}" onclick="myfunction(this.id);">@{{ x.department }}</td>
							
							  
							  <td><form method="GET" action="{{ url('view_employee_details') }}"><input type="hidden" name="empId" value="@{{ x.employee_row_id }}"><input type="submit" class="form-control1 btn btn-primary btn-lg" name="viewEmp" value="View" ></form></td>
							  <td><form method="GET" action="{{ url('edit_employee') }}"><input type="hidden" name="empId" value="@{{ x.employee_row_id }}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editDept" value="Edit"></form></td>
							  <td><form method="GET" action="{{ url('delete_employee') }}"><input type="hidden" name="empId" value="@{{ x.employee_row_id }}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteDept" value="Delete" style="background-color:#C40401; color:white"></form></td>
							 
							</tr>
							
						  </tbody>
						</table>
					</div>
						</div>
					</div>
				</div>


@include('HR_views.navigation_footer')

<script>
		var app = angular.module('myApp', []);
		app.controller('customersCtrl', function($scope, $http) {
			
		   $http.post("http://172.16.136.35/HRDashboardEzone/get_department.php")
		   .then(function (response) {$scope.names = response.data.department_details;});

		});
</script>
