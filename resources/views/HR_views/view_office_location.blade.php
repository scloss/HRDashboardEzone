@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Office Locations of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Office Location Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($office_location_lists as $office_location_list) 
                             
                                                
							<tr>
							  
							  <td>{{$office_location_list->office_location_name}}</td>
							  <td><form method="GET" action="{{ url('edit_office_location') }}"><input type="hidden" name="officeLocationName" value="{{$office_location_list->office_location_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editOfficeLocation" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_office_location') }}"><input type="hidden" name="officeLocationName" value="{{$office_location_list->office_location_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteOfficeLocation" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')