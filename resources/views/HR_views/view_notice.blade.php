@include('HR_views.navigation_header')
<script type="text/javascript">
	function deactivate_notice(id){

		if (window.confirm('Are you sure you want to deactivate this notice?'))
		{
			window.location = '/HRDashboardEzone/public/deactivate_notice?notice_row_id='+id;
		}
		else
		{
			
		}
	}


</script>
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Notices of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Notice Title</th>
							  <th>Notice Description</th>
							  <th>Notice Date</th>
							  <th>Notice Status</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($notice_lists as $notice_list) 
                             
                                                
							<tr>
							  
							  <td>{{$notice_list->notice_title}}</td>
							  <td><textarea class="form-control1" readonly>{{$notice_list->notice_description}}</textarea></td>
							  <td>{{$notice_list->notice_date}}</td>
							  <td>{{$notice_list->notice_status}}</td>
							  <td>@if($notice_list->notice_status=="active")<a id="{{$notice_list->notice_row_id}}" onclick="deactivate_notice(this.id);"><i class="fa fa-power-off" aria-hidden="true"></i></a>@endif</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')