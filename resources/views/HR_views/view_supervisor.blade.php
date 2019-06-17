@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Supervisor of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Supervisor Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($supervisor_lists as $supervisor_list) 
                             
                                                
							<tr>
							  
							  <td>{{$supervisor_list->supervisor_name}}</td>
							  <td><form method="GET" action="{{ url('edit_supervisor') }}"><input type="hidden" name="supervisorName" value="{{$supervisor_list->supervisor_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editSupervisor" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_supervisor') }}"><input type="hidden" name="supervisorName" value="{{$supervisor_list->supervisor_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteSupervisor" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')