@include('HR_views.navigation_header')
<script type="text/javascript">
	function deactivate_news(id){

		if (window.confirm('Are you sure you want to deactivate this news?'))
		{
			window.location = '/HRDashboardEzone/public/deactivate_news?news_row_id='+id;
		}
		else
		{
			
		}
	}


</script>
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">All News of Ezone.</h3>
			<div class="panel-body1">
					   <table class="table table-hover">
						 <thead>
							<tr>
							  
							  <th>News Title</th>
							  <th>News Description</th>
							  <th>News Date</th>
							  <th>News Status</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
						  	 @foreach($news_lists as $news_list) 
                             
                                                
							<tr>
							  
							  <td>{{$news_list->news_title}}</td>
							  <td><textarea class="form-control1" readonly>{{$news_list->news_description}}</textarea></td>
							  <td>{{$news_list->news_date}}</td>
							  <td>{{$news_list->news_status}}</td>
							  <td>@if($news_list->news_status=="active")<a id="{{$news_list->news_row_id}}" onclick="deactivate_news(this.id);"><i class="fa fa-power-off" aria-hidden="true"></i></a>@endif</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						</div>
					</div>
				</div>
@include('HR_views.navigation_footer')