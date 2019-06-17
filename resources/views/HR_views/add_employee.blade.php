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
  
  </script>

   


		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add an Employee</h3>
			<div class="panel-body1">
					   
		<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
				<label class="col-md-2 control-label">HR ID</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="HR ID" name="hrId" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Employee Name" name="name" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Designation</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="designation" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($designation_lists as $designation_list) 
                                                <option value="{{$designation_list->designation_name}}">{{$designation_list->designation_name}}</option>
                                                @endforeach
							</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Joining Date</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						<input type="text" id="datepicker" class="form-control1" name="joining_date" required>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Division</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="division" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($division_lists as $division_list) 
                                                <option value="{{$division_list->division_name}}">{{$division_list->division_name}}</option>
                                                @endforeach
							</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Department</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="department" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($department_lists as $department_list) 
                                                <option value="{{$department_list->dept_name}}">{{$department_list->dept_name}}</option>
                                                @endforeach
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Section</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="section" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($section_lists as $section_list) 
                                                <option value="{{$section_list->section_name}}">{{$section_list->section_name}}</option>
                                                @endforeach
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Gender</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="gender" class="form-control1" required>
							<option disabled selected></option>
                                                
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                               
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Email Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Email Address" name="email">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Phone</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" id="exampleInputPassword1" placeholder="Phone Number" name="phone" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			
			<div class="form-group">
				<label class="col-md-2 control-label">Blood Group</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="blood_group" class="form-control1" required>
							<option disabled selected></option>
                                                
                                                <option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                               
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Marital Status</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="marital_status" class="form-control1" required>
							<option disabled selected></option>
                                                <option value="N/A">N/A</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                               
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			

			<div class="form-group">
				<label class="col-md-2 control-label">Job Location</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="job_location" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($job_location_lists as $job_location_list) 
                                                <option value="{{$job_location_list->job_location_name}}">{{$job_location_list->job_location_name}}</option>
                                                @endforeach
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Office Location</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="office_location" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($office_location_lists as $office_location_list) 
                                                <option value="{{$office_location_list->office_location_name}}">{{$office_location_list->office_location_name}}</option>
                                                @endforeach
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Supervisor Name</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="supervisor_name" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($supervisor_lists as $supervisor_list) 
                                                <option value="{{$supervisor_list->supervisor_name}}">{{$supervisor_list->supervisor_name}}</option>
                                                @endforeach
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Date of Birth</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						<input type="text" id="datepicker2" class="form-control1" name="date_of_birth" required>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Religion</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="religion" class="form-control1" required>
							
                                              <option disabled selected></option>  
                                                <option value="N/A">N/A</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christian">Christian</option>
                                               
                                            
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Emergency Contact Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Emergency Contact Name" name="emergency_contact_name">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Emergency Contact Phone</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Emergency Contact Phone" name="emergency_contact_phone">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Relation</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Relation" name="relation">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Home District</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Home District" name="home_district">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Present Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						<textarea class="form-control1" name="present_address"></textarea>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Permanent Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						<textarea class="form-control1" name="permanent_address"></textarea>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Employee Image</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="file" class="form-control1" name="image_path">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<br>
			
			<div class="form-group">
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						{!! Form::token() !!}
						<input type="submit" class="btn btn-lg btn-success form-control1" name="addEmp" value="Add Employee">
					</div>
			<div class="clearfix"> </div>
			</div>
			
			
			
			

					</form>
			</div>
		</div>
	</div>
@include('HR_views.navigation_footer')