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
					<h3 class="blank1">Edit an Employee</h3>
			<div class="panel-body1">
					   
		<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('confirm_employee_edit') }}" >

			<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<img src = "{{ $imagePath }}" height="200" width="200" alt="Employee Image Not Available">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">HR ID</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" value="{{$hrId}}" name="hrId" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" value="{{$name}}" name="name" required>
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


                                                <?php 
                                                    if($designation_list->designation_name == $designation)
                                                    { ?>
                                                        <option selected value="{{$designation_list->designation_name}}">{{$designation_list->designation_name}}</option>
                                            <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$designation_list->designation_name}}">{{$designation_list->designation_name}}</option>
                                            <?php   } ?>


                                                
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
						<input type="text" id="datepicker" class="form-control1" name="joining_date" value="{{$joiningDate}}" required>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Division</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="division" class="form-control1" required>
                                                @foreach($division_lists as $division_list)


                                                <?php 
                                                    if($division_list->division_name == $division)
                                                    { ?>
                                                        <option selected value="{{$division_list->division_name}}">{{$division_list->division_name}}</option>
                                           		 <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$division_list->division_name}}">{{$division_list->division_name}}</option>
                                           		 <?php   } ?>


                                                
                                                @endforeach

                                                <?php echo $division ?>
							
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
						
                                                @foreach($department_lists as $department_list)


                                                <?php 
                                                    if($department_list->dept_name == $department)
                                                    { ?>
                                                        <option selected value="{{$department_list->dept_name}}">{{$department_list->dept_name}}</option>
                                           		 <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$department_list->dept_name}}">{{$department_list->dept_name}}</option>
                                           		 <?php   } ?>


                                                
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
							
                                                @foreach($section_lists as $section_list)


                                                <?php 
                                                    if($section_list->section_name == $section)
                                                    { ?>
                                                        <option selected value="{{$section_list->section_name}}">{{$section_list->section_name}}</option>
                                           		 <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$section_list->section_name}}">{{$section_list->section_name}}</option>
                                           		 <?php   } ?>


                                                
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
							
                              @if($gender=="Male")               
                                                <option selected value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                
                                               
                             @elseif($gender=="Female")
                               					<option value="Male">Male</option>
                                                <option selected value="Female">Female</option>
                                               

                                                                                                        
							@endif
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Email Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" value="{{$email}}" name="email" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Phone</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="number" class="form-control1" id="exampleInputPassword1" value="{{$phone}}" name="phone" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			
			<div class="form-group">
				<label class="col-md-2 control-label">Blood Group</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="blood_group" class="form-control1" required>
							
                                               
							 @if($blood_group=="N/A")               
                                                <option selected value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                               
                             @elseif($blood_group=="A+")
                               					<option value="N/A">N/A</option>
                                                <option selected value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                               @elseif($blood_group=="A-")
                               					<option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option seleted value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>              

                                 @elseif($blood_group=="AB+")
                               					<option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option seleted value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>	
                                   @elseif($blood_group=="AB-")
                               					<option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option seleted value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>              	
                                      @elseif($blood_group=="B+")
                               					<option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option seleted value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>  
                                        @elseif($blood_group=="B-")
                               					<option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option seleted value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>             
                                           @elseif($blood_group=="O+")
                                          <option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option seleted value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                   @elseif($blood_group=="O-")
                                          <option value="N/A">N/A</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option seleted value="O-">O-</option>     
							@endif
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
							
                                               
							 @if($marital_status=="N/A")               
                                                <option selected value="N/A">N/A</option>
                                               	<option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                               
                             @elseif($marital_status=="Single")
                               					<option value="N/A">N/A</option>
                                               	<option selected value="Single">Single</option>
                                                <option value="Married">Married</option>
                              @elseif($marital_status=="Married")
                               					<option value="N/A">N/A</option>
                                               	<option value="Single">Single</option>
                                                <option selected value="Married">Married</option>                

                                                                                                        
							@endif
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
							
                                                @foreach($job_location_lists as $job_location_list)


                                                <?php 
                                                    if($job_location_list->job_location_name == $job_location)
                                                    { ?>
                                                        <option selected value="{{$job_location_list->job_location_name}}">{{$job_location_list->job_location_name}}</option>
                                           		 <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$job_location_list->job_location_name}}">{{$job_location_list->job_location_name}}</option>
                                           		 <?php   } ?>


                                                
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
							
                                                @foreach($office_location_lists as $office_location_list)


                                                <?php 
                                                    if($office_location_list->office_location_name == $office_location)
                                                    { ?>
                                                        <option selected value="{{$office_location_list->office_location_name}}">{{$office_location_list->office_location_name}}</option>
                                           		 <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$office_location_list->office_location_name}}">{{$office_location_list->office_location_name}}</option>
                                           		 <?php   } ?>


                                                
                                                @endforeach
							
						</select>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Supervisor</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="supervisor_name" class="form-control1" required>
						
                                                @foreach($supervisor_lists as $supervisor_list)


                                                <?php 
                                                    if($supervisor_list->supervisor_name == $supervisor_name)
                                                    { ?>
                                                        <option selected value="{{$supervisor_list->supervisor_name}}">{{$supervisor_list->supervisor_name}}</option>
                                           		 <?php   }
                                                    else
                                                    {?>
                                                        <option value="{{$supervisor_list->supervisor_name}}">{{$supervisor_list->supervisor_name}}</option>
                                           		 <?php   } ?>


                                                
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
						<input type="text" id="datepicker2" class="form-control1" name="date_of_birth" value="{{$date_of_birth}}" required>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Religion</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
					
						<select name="religion" class="form-control1" required>
							
                              @if($religion=="Islam")
                              					<option value="N/A">N/A</option>               
                                                <option selected value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christian">Christian</option>
                                                
                                               
                             @elseif($religion=="Hindu")
                             					<option value="N/A">N/A</option>
                               					<option value="Islam">Islam</option>
                                                <option selected value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christian">Christian</option>
                              @elseif($religion=="Buddhism")
                              					<option value="N/A">N/A</option>
                               					<option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option selected value="Buddhism">Buddhism</option>
                                                <option value="Christian">Christian</option>                 
                               @elseif($religion=="Christian")
                               					<option value="N/A">N/A</option>
                               					<option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option selected value="Christian">Christian</option> 

                                @elseif($religion=="N/A")
                               					<option selected value="N/A">N/A</option>
                               					<option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christian">Christian</option>                                                                                                        
							@endif
						</select>
						
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Emergency Contact Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$emergency_contact_name}}" name="emergency_contact_name" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Emergency Contact Phone</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$emergency_contact_phone}}" name="emergency_contact_phone" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Relation</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$relation}}" name="relation" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Home District</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$home_district}}" name="home_district" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Present Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						<textarea class="form-control1" name="present_address" required>{{$present_address}}</textarea>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Permanent Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						<textarea class="form-control1" name="permanent_address" required>{{$permanent_address}}</textarea>
						
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
			
			<div class="form-group">
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						{!! Form::token() !!}
						<br>
						<input type="hidden" name="empId" value="{{$employeeRowId}}">
						<input type="submit" class="btn btn-lg btn-success form-control1" name="editEmp" value="Edit Employee">
					</div>
			<div class="clearfix"> </div>
			</div>
			
			
			
			

					</form>
			</div>
		</div>
	</div>
@include('HR_views.navigation_footer')