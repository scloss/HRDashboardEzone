@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Divisions of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Division Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($division_lists as $division_list) 
                             
                                                
							<tr>
							  
							  <td>{{$division_list->division_name}}</td>
							  <td><form method="GET" action="{{ url('edit_division') }}"><input type="hidden" name="divisionName" value="{{$division_list->division_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editDivision" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_division') }}"><input type="hidden" name="divisionName" value="{{$division_list->division_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteDivision" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')