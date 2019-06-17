@include('HR_views.navigation_header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script>
$(document).ready(function(){
    $(function() {
    $( "#datepicker" ).datepicker();
  });
});

$(document).ready(function(){
    $(function() {
    $( "#datepicker2" ).datepicker();
  });
});

$(document).ready(function(){
    $(function() {
    $( "#datepicker3" ).datepicker();
  });
});  
  </script>

<script>
	function checkjoining(){

		var joining_date = document.getElementById('datepicker').value;
		var joining_date_to = document.getElementById('datepicker3').value;

		if(joining_date!='' && joining_date_to==''){

			alert('Joining Date To Field is Empty!');
			return false;
		}
		if(joining_date_to!='' && joining_date==''){
			alert('Joining Date From Field is Empty!');
			return false;

		}

		return true;
	}
</script>  

		<div id="page-wrapper">
			<div class="graphs">
					<h3 class="blank1">Search</h3>
					<div class="panel-body1">
						<form role="form" class="form-horizontal" method="POST" action="{{ url('search') }}" onsubmit="return checkjoining()">
									<div class="form-group">
										
										<div class="col-md-6">
										<label class="col-md-2 control-label">HR ID</label>
											<div class="input-group in-grp1">							
												
												<input type="number" class="form-control1" name="hrId" value="{{$hrId}}">
											</div>
										</div>
										<div class="col-md-6">
										<label class="col-md-2 control-label">Name</label>
											<div class="input-group in-grp1">							
												
												<input type="text" class="form-control1" name="name" value="{{$name}}">
											</div>
										</div>
										<div class="col-md-6">
										<label class="col-md-2 control-label">Designation</label>
											<div class="input-group input-icon right in-grp1">
												<select name="designation" class="form-control1">
													<option value=""></option>
						                                                @foreach($designation_lists as $designation_list) 
						                                               			@if($designation_list->designation_name == $designation) 
							                                                        <option selected value="{{$designation_list->designation_name}}">{{$designation_list->designation_name}}</option>
							                                                    @else
							                                                        <option value="{{$designation_list->designation_name}}">{{$designation_list->designation_name}}</option>
							                                                    @endif 
						                                                @endforeach

						                                               
													</select>
												
											</div>
										</div>	
										
											<div class="col-md-6">
											<label class="col-md-2 control-label">Joining Date From</label>
												<div class="input-group in-grp1">							
													<input type="text" id="datepicker" class="form-control1" value="{{$joining_date}}" name="joining_date">
													
												</div>
											</div>
											<div class="col-md-6">
											<label class="col-md-2 control-label">Joining Date To</label>
												<div class="input-group in-grp1">							
													<input type="text" id="datepicker3" class="form-control1" value="{{$joining_date}}" name="joining_date_to">
													
												</div>
											</div>
															
											<div class="col-md-6">
											<label class="col-md-2 control-label">Division</label>
												<div class="input-group input-icon right in-grp1">
													<select name="division" class="form-control1">
														<option value=""></option>
														 @foreach($division_lists as $division_list) 
						                                               			@if($division_list->division_name == $division) 
							                                                        <option selected value="{{$division_list->division_name}}">{{$division_list->division_name}}</option>
							                                                    @else
							                                                        <option value="{{$division_list->division_name}}">{{$division_list->division_name}}</option>
							                                                    @endif 
						                                                @endforeach
														</select>
													
												</div>
											</div>

															
												<div class="col-md-6">
												<label class="col-md-2 control-label">Department</label>
													<div class="input-group input-icon right in-grp1">
														<select name="department" class="form-control1" >
															<option value=""></option>

															 @foreach($department_lists as $department_list) 
						                                               			@if($department_list->dept_name == $department) 
							                                                        <option selected value="{{$department_list->dept_name}}">{{$department_list->dept_name}}</option>
							                                                    @else
							                                                        <option value="{{$department_list->dept_name}}">{{$department_list->dept_name}}</option>
							                                                    @endif 
						                                      @endforeach

															
														</select>
														
													</div>
												</div>
												


												<div class="col-md-6">
												<label class="col-md-2 control-label">Section</label>
													<div class="input-group input-icon right in-grp1">
														<select name="section" class="form-control1" >
															<option value=""></option>
															 @foreach($section_lists as $section_list) 
						                                               			@if($section_list->section_name == $section) 
							                                                        <option selected value="{{$section_list->section_name}}">{{$section_list->section_name}}</option>
							                                                    @else
							                                                        <option value="{{$section_list->section_name}}">{{$section_list->section_name}}</option>
							                                                    @endif 
						                                                @endforeach
															
														</select>
														
													</div>
												</div>	


											<div class="col-md-6">
											<label class="col-md-2 control-label">Gender</label>
												<div class="input-group input-icon right in-grp1">
													<select name="gender" class="form-control1">
														<option value=""></option>
							                                                @if($gender=="Male")
							                                                <option selected value="Male">Male</option>
							                                                @else
							                                                <option value="Male">Male</option>
							                                                @endif
							                                                @if($gender=="Female")
							                                                <option selected value="Female">Female</option>
							                                                @else
							                                                <option value="Female">Female</option>
							                                                @endif
							                                               
							                                               
														
													</select>
													
												</div>
											</div>

															
										<div class="col-md-6">
										<label class="col-md-2 control-label">Email Address</label>
											<div class="input-group in-grp1">							
												
												<input type="text" class="form-control1" name="email" value="{{$email}}">
											</div>
										</div>
										

										<div class="col-md-6">
										<label class="col-md-2 control-label">Phone</label>
											<div class="input-group in-grp1">
												
												<input type="text" class="form-control1" id="exampleInputPassword1" name="phone" value="{{$phone}}">
											</div>
										</div>


										<div class="col-md-6">
										<label class="col-md-2 control-label">Blood Group</label>
														<div class="input-group input-icon right in-grp1">
															<select name="blood_group" class="form-control1">
																<option value=""></option>
									                                                @if($blood_group=="N/A")
									                                                <option selected value="N/A">N/A</option>
									                                                @else
									                                                <option value="N/A">N/A</option>
									                                                @endif
									                                                @if($blood_group=="A+")
									                                                <option selected value="A+">A+</option>
									                                                @else
									                                                <option value="A+">A+</option>
									                                                @endif
									                                                @if($blood_group=="A-")
									                                                <option selected value="A-">A-</option>
									                                                @else
									                                                <option value="A-">A-</option>
									                                                @endif
									                                                @if($blood_group=="AB+")
									                                                <option selected value="AB+">AB+</option>
									                                                @else
									                                                <option value="AB+">AB+</option>
									                                                @endif
									                                                @if($blood_group=="AB-")
									                                                <option selected value="AB-">AB-</option>
									                                                @else
									                                                <option value="AB-">AB-</option>
									                                                @endif
									                                                @if($blood_group=="B+")
									                                                <option selected value="B+">B+</option>
									                                                @else
									                                                <option value="B+">B+</option>
									                                                @endif
									                                                @if($blood_group=="B-")
									                                                <option selected value="B-">B-</option>
									                                                @else
									                                                <option value="B-">B-</option>
									                                                @endif
									                                                @if($blood_group=="O+")
									                                                <option selected value="O+">O+</option>
									                                                @else
									                                                <option value="O+">O+</option>
									                                                @endif
									                                                @if($blood_group=="O-")
									                                                <option selected value="O-">O-</option>
									                                                @else
									                                                <option value="O-">O-</option>
									                                                @endif
									                                               
																
															</select>
															
														</div>
										</div>


										<div class="col-md-6">
										<label class="col-md-2 control-label">Marital Status</label>
											<div class="input-group input-icon right in-grp1">
												<select name="marital_status" class="form-control1">
													<option value=""></option>
																		@if($marital_status=="N/A")
																		<option selected value="N/A">N/A</option>
																		@else
																		<option value="N/A">N/A</option>
																		@endif
						                           
						                                                @if($marital_status=="Single")
						                                                <option selected value="Single">Single</option>
						                                                @else
						                                                <option value="Single">Single</option>
						                                                @endif
						                                                @if($marital_status=="Married")
						                                                <option selected value="Married">Married</option>
						                                                @else
						                                                <option value="Married">Married</option>
						                                                @endif
						                                               
													
												</select>
												
											</div>
										</div>

										
										<div class="col-md-6">
										<label class="col-md-2 control-label">Job Location</label>
											<div class="input-group input-icon right in-grp1">
												<select name="job_location" class="form-control1">
													<option value=""></option>

													 					@foreach($job_location_lists as $job_location_list) 
						                                               			@if($job_location_list->job_location_name == $job_location) 
							                                                        <option selected value="{{$job_location_list->job_location_name}}">{{$job_location_list->job_location_name}}</option>
							                                                    @else
							                                                        <option value="{{$job_location_list->job_location_name}}">{{$job_location_list->job_location_name}}</option>
							                                                    @endif 
						                                                @endforeach


						                                            
													
												</select>
												
											</div>
										</div>


										<div class="col-md-6">
										<label class="col-md-2 control-label">Office Location</label>
											<div class="input-group input-icon right in-grp1">
												<select name="office_location" class="form-control1">
													<option value=""></option>

																		@foreach($office_location_lists as $office_location_list) 
						                                               			@if($office_location_list->office_location_name == $office_location) 
							                                                        <option selected value="{{$office_location_list->office_location_name}}">{{$office_location_list->office_location_name}}</option>
							                                                    @else
							                                                        <option value="{{$office_location_list->office_location_name}}">{{$office_location_list->office_location_name}}</option>
							                                                    @endif 
						                                                @endforeach

													
												</select>
												
											</div>
										</div>

														
										<div class="col-md-6">
										<label class="col-md-2 control-label">Supervisor Name</label>
											<div class="input-group input-icon right in-grp1">
												<select name="supervisor_name" class="form-control1">
													<option value=""></option>
																	@foreach($supervisor_lists as $supervisor_list) 
						                                               			@if($supervisor_list->supervisor_name == $supervisor_name) 
							                                                        <option selected value="{{$supervisor_list->supervisor_name}}">{{$supervisor_list->supervisor_name}}</option>
							                                                    @else
							                                                        <option value="{{$supervisor_list->supervisor_name}}">{{$supervisor_list->supervisor_name}}</option>
							                                                    @endif 
						                                                @endforeach


						                                        
													
												</select>
												
											</div>
										</div>
										


										<div class="col-md-6">
										<label class="col-md-2 control-label">Date of Birth</label>
											<div class="input-group in-grp1">							
												<input type="text" id="datepicker2" class="form-control1" name="date_of_birth" value="{{$date_of_birth}}">
												
											</div>
										</div>


										<div class="col-md-6">
										<label class="col-md-2 control-label">Religion</label>
											<div class="input-group input-icon right in-grp1">
												<select name="religion" class="form-control1">
													
						                                              	<option value=""></option>
						                                              	@if($religion=="N/A")  
						                                                <option selected value="N/A">N/A</option>
						                                                @else
						                                                <option value="N/A">N/A</option>
						                                                @endif
						                                                @if($religion=="Islam")  
						                                                <option selected value="Islam">Islam</option>
						                                                @else
						                                                 <option value="Islam">Islam</option>
						                                                @endif
						                                                @if($religion=="Hindu")  
						                                                <option selected value="Hindu">Hindu</option>
						                                                @else
						                                                <option value="Hindu">Hindu</option>
						                                                @endif
						                                                @if($religion=="Buddhism")  
						                                                <option selected value="Buddhism">Buddhism</option>
						                                                @else
						                                                <option value="Buddhism">Buddhism</option>
						                                                @endif
						                                                @if($religion=="Christian")  
						                                                <option selected value="Christian">Christian</option>
						                                                @else
						                                                 <option value="Christian">Christian</option>
						                                                @endif
						                                               
						                                            
													
												</select>
												
											</div>
										</div>
														
										<div class="col-md-6">
										<label class="col-md-2 control-label">Emergency Contact Phone</label>
											<div class="input-group in-grp1">							
												
												<input type="text" class="form-control1" name="emergency_contact_phone" value="{{$emergency_contact_phone}}">
											</div>
										</div>


										<div class="col-md-6">
										<label class="col-md-2 control-label">Emergency Contact Name</label>
											<div class="input-group in-grp1">							
												
												<input type="text" class="form-control1" name="emergency_contact_name" value="{{$emergency_contact_name}}">
											</div>
										</div>
														
										<div class="col-md-6">
										<label class="col-md-2 control-label">Relation</label>
											<div class="input-group in-grp1">							
												
												<input type="text" class="form-control1" name="relation" value="{{$relation}}">
											</div>
										</div>


										<div class="col-md-6">
										<label class="col-md-2 control-label">Home District</label>
											<div class="input-group in-grp1">							
												
												<input type="text" class="form-control1" name="home_district" value="{{$home_district}}">
											</div>
										</div>

										<div class="col-md-6">
										<label class="col-md-2 control-label">Present Address</label>
											<div class="input-group in-grp1">							
												<textarea class="form-control1" name="present_address">{{$present_address}}</textarea>
												
											</div>
										</div>

														
										<div class="col-md-6">
										<label class="col-md-2 control-label">Permanent Address</label>
											<div class="input-group in-grp1">							
												<textarea class="form-control1" name="permanent_address">{{$permanent_address}}</textarea>
												
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-12">
										<input type="submit" class="btn btn-primary form-control1" id="search" name="se" value="Search">
									</div><br><br>
									<div class="col-md-12">
										<input type="submit" class="btn btn-warning form-control1" id="export" name="se" value="Export">
									</div>									
									

						</form>
						<table class="table table-hover">
						 <thead>
							<tr>
							  <th>HR_ID</th>
							  <th>Name</th>
							  <th>Email</th>
							  <th>Phone</th>
							  <th>Designation</th>
							  <th>Department</th>
							
							</tr>
						  </thead>
						  <tbody>
						  @foreach($search_results as $search_result)
							<tr>
							<td>{{$search_result->hr_id}}</td>
							<td>{{$search_result->name}}</td>
							<td>{{$search_result->email}}</td>
							<td>{{$search_result->phone}}</td>
							<td>{{$search_result->designation}}</td>
							<td>{{$search_result->department}}</td>

							
							  
							  <td><form method="GET" action="{{ url('view_employee_details') }}"><input type="hidden" name="empId" value="{{$search_result->employee_row_id}}"><input type="submit" class="form-control1 btn btn-primary btn-lg" name="viewEmp" value="View" ></form></td>
							  <td><form method="GET" action="{{ url('edit_employee') }}"><input type="hidden" name="empId" value="{{$search_result->employee_row_id}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editDept" value="Edit"></form></td>
							  <td><form method="GET" action="{{ url('delete_employee') }}"><input type="hidden" name="empId" value="{{$search_result->employee_row_id}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteDept" value="Delete" style="background-color:#C40401; color:white"></form></td>
							 
							</tr>
							@endforeach
						  </tbody>
						</table>


					</div>
			</div>
		</div>
		


   <script>
		var app = angular.module('myApp', []);
		app.controller('customersCtrl', function($scope, $http) {
			
		   $http.post("http://172.16.136.35/HRDashboardEzone/get_department.php")
		   .then(function (response) {$scope.names = response.data.department_details;});

		});
</script>
@include('HR_views.navigation_footer')