@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Departments of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Department Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($department_lists as $department_list) 
                             
                                                
							<tr>
							  
							  <td>{{$department_list->dept_name}}</td>
							  <td><form method="GET" action="{{ url('edit_department') }}"><input type="hidden" name="deptName" value="{{$department_list->dept_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editDept" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_department') }}"><input type="hidden" name="deptName" value="{{$department_list->dept_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteDept" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')