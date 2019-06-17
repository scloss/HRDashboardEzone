@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Job Locations of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Job Location Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($job_location_lists as $job_location_list) 
                             
                                                
							<tr>
							  
							  <td>{{$job_location_list->job_location_name}}</td>
							  <td><form method="GET" action="{{ url('edit_job_location') }}"><input type="hidden" name="jobLocationName" value="{{$job_location_list->job_location_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editJobLocation" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_job_location') }}"><input type="hidden" name="jobLocationName" value="{{$job_location_list->job_location_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteJobLocation" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')