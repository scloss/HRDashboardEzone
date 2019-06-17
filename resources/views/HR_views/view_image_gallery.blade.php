@include('HR_views.navigation_header')
<script type="text/javascript">
	function deactivate_image(id){

		if (window.confirm('Are you sure you want to deactivate this image?'))
		{
			window.location = '/HRDashboardEzone/public/deactivate_image?image_row_id='+id;
		}
		else
		{
			
		}
	}


</script>
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Images of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Image Tag</th>
							  <th>Image</th>
							  <th>News Status</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($image_lists as $image_list) 
                             
                                                
							<tr>
							  
							  <td>{{$image_list->image_tag}}</td>
							  <td><img src="{{$image_list->image_location}}"></td>
							  <td>{{$image_list->image_status}}</td>
							  <td>@if($image_list->image_status=="active")<a id="{{$image_list->image_row_id}}" onclick="deactivate_image(this.id);"><i class="fa fa-power-off" aria-hidden="true"></i></a>@endif</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')