@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add a Division</h3>
			<div class="panel-body1">
					   
		<form role="form" class="form-horizontal" method="POST">
			
			<div class="form-group">
				<label class="col-md-2 control-label">Division Name</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="Division Name" name="divisionName" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			
			<br><br>
			
			
			<div class="form-group">
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						{!! Form::token() !!}
						<input type="submit" class="btn btn-lg btn-success form-control1" name="addDiv" value="Add Division">
					</div>
			<div class="clearfix"> </div>
			</div>
			
			
			
			

					</form>
			</div>
		</div>
	</div>
@include('HR_views.navigation_footer')