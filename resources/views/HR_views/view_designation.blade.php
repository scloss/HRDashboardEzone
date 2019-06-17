@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Designations of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Designation Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($designation_lists as $designation_list) 
                             
                                                
							<tr>
							  
							  <td>{{$designation_list->designation_name}}</td>
							  <td><form method="GET" action="{{ url('edit_designation') }}"><input type="hidden" name="designationName" value="{{$designation_list->designation_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editDesignation" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_designation') }}"><input type="hidden" name="designationName" value="{{$designation_list->designation_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteDesignation" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')