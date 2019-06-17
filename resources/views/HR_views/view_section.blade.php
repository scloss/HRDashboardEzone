@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Sections of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Section Name</th>
							  <th></th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($section_lists as $section_list) 
                             
                                                
							<tr>
							  
							  <td>{{$section_list->section_name}}</td>
							  <td><form method="GET" action="{{ url('edit_section') }}"><input type="hidden" name="sectionName" value="{{$section_list->section_name}}"><input type="submit" class="form-control1 btn btn-warning btn-lg" name="editSection" value="Edit">{!! Form::token() !!}</form></td>
							  <td><form method="GET" action="{{ url('delete_section') }}"><input type="hidden" name="sectionName" value="{{$section_list->section_name}}"><input type="submit" class="form-control1 btn btn-danger btn-lg" name="deleteSection" value="Delete" style="background-color:#C40401; color:white">{!! Form::token() !!}</form></td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')