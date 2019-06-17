@include('HR_views.navigation_header')
<script type="text/javascript">
	function deactivate_event(id){

		if (window.confirm('Are you sure you want to deactivate this event?'))
		{
			window.location = '/HRDashboardEzone/public/deactivate_event?event_row_id='+id;
		}
		else
		{
			
		}
	}


</script>
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All Events of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>Event Title</th>
							  <th>Event Description</th>
							  <th>Event Date</th>
							  <th>Event Status</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($event_lists as $event_list) 
                                                                    
							<tr>							  
							  <td>{{$event_list->event_title}}</td>
							  <td><textarea class="form-control1" readonly>{{$event_list->event_description}}</textarea></td>
							  <td>{{$event_list->event_date}}</td>
							  <td>{{$event_list->event_status}}</td>
							  <td>@if($event_list->event_status=="active")<a id="{{$event_list->event_row_id}}" onclick="deactivate_event(this.id);"><i class="fa fa-power-off" aria-hidden="true"></i></a>@endif</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')