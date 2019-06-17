@include('HR_views.navigation_header')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add a News</h3>
			<div class="panel-body1">
					   
		<form role="form" class="form-horizontal" method="POST">
			
			<div class="form-group">
				<label class="col-md-2 control-label">News Title</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="News Title" name="news_title" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">News Description</label>
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						
						<input type="text" class="form-control1" placeholder="News Description" name="news_description" required>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			
			<br><br>
			
			
			<div class="form-group">
				<div class="col-md-8">
					<div class="input-group in-grp1">							
						{!! Form::token() !!}
						<input type="submit" class="btn btn-lg btn-success form-control1" name="addDept" value="Add News">
					</div>
			<div class="clearfix"> </div>
			</div>
			
			
			
			

					</form>
			</div>
		</div>
	</div>
@include('HR_views.navigation_footer')