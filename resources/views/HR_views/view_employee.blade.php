@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Employee Details</h3>
			<div class="panel-body1">
					   
		<form role="form" class="form-horizontal">

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
						
						<input type="text" class="form-control1" value="{{$hrId}}" name="hrId" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" value="{{$name}}" name="name" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Designation</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<input type="text" class="form-control1" value="{{$designation}}" name="designation" readonly>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>



			<div class="form-group">
				<label class="col-md-2 control-label">Joining Date</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" name="joining_date" value="{{$joiningDate}}" disabled>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			

			<div class="form-group">
				<label class="col-md-2 control-label">Division</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" name="division" value="{{$division}}" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Department</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<input type="text" class="form-control1" value="{{$department}}" name="department" readonly>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Section</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<input type="text" class="form-control1" value="{{$section}}" name="section" readonly>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>


			<div class="form-group">
				<label class="col-md-2 control-label">Gender</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<input type="text" class="form-control1" value="{{$gender}}" name="gender" readonly>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>



			<div class="form-group">
				<label class="col-md-2 control-label">Email Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" value="{{$email}}" name="email" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Phone</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$phone}}" name="phone" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Blood Group</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$blood_group}}" name="blood_group" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			
			<div class="form-group">
				<label class="col-md-2 control-label">Marital Status</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$marital_status}}" name="marital_status" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Job Location</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$job_location}}" name="job_location" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Office Location</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$office_location}}" name="office_location" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Supervisor Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$supervisor_name}}" name="supervisor_name" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Date of Birth</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$date_of_birth}}" name="date_of_birth" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Religion</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$religion}}" name="religion" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Emergency Contact Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$emergency_contact_name}}" name="emergency_contact_name" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Emergency Contact Phone</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$emergency_contact_phone}}" name="emergency_contact_phone" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Relation</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$relation}}" name="relation" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Home District</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						
						<input type="text" class="form-control1" value="{{$home_district}}" name="home_district" readonly>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Present Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						<textarea class="form-control1" name="{{$present_address}}" readonly>{{$present_address}}</textarea>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Permanent Address</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">
						<textarea class="form-control1" name="{{$permanent_address}}" readonly>{{$permanent_address}}</textarea>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			
			
			
			

					</form>
			</div>
		</div>
	</div>
@include('HR_views.navigation_footer')