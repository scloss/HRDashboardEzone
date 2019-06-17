@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Select Department to move Employees to</h3>
			<div class="panel-body1">
					   
		<form role="form" class="form-horizontal" method="POST" action="{{ url('confirm_move_employees') }}">
				
			<div class="form-group">
				<label class="col-md-2 control-label">Department</label>
				<div class="col-md-8">
					<div class="input-group input-icon right in-grp1">
						<select name="department" class="form-control1" required>
							<option disabled selected></option>
                                                @foreach($department_lists as $department_list)


                                                <?php 
                                                    if($department_list->dept_name == $deptName)
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
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						{!! Form::token() !!}
						<br>
						<input type="hidden" name="deptName" value="{{ $deptName }}">
						<input type="submit" class="btn btn-lg btn-success form-control1" name="moveEmp" value="Move Employees">
					</div>
			<div class="clearfix"> </div>
			</div>
			
			
			
			

					</form>
			</div>
		</div>
	</div>
@include('HR_views.navigation_footer')