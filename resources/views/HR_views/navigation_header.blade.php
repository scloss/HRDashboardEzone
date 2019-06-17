<!DOCTYPE HTML>
<html>
<head>
<title>HR Tool</title>


<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'>

<link href="css/style.css" rel='stylesheet' type='text/css'>

<link href="css/font-awesome.css" rel="stylesheet"> 

<link rel="stylesheet" href="css/icon-font.min.css" type='text/css'>

<script src="js/Chart.js"></script>

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>

<script src="js/jquery-1.10.2.min.js"></script>

<script src="js/angular.min.js"></script>

</head> 

<body class="sticky-header left-side-collapsed">




    <section>

		<div class="left-side sticky-left-side">

			
			<div class="logo">
				<h1><a href="{{ url('view_employee') }}"><span>HR Tool</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="{{ url('view_employee') }}"><i class="lnr lnr-home"></i> </a>
			</div>

			<div class="left-side-inner">

					<ul class="nav nav-pills nav-stacked custom-nav">
						
						<li class="menu-list">
							<a href="#"><i class="fa fa-users"></i>
								<span>Employees</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_employee') }}">View / Edit Employees</a> </li>
									<li><a href="{{ url('add_employee') }}">Add New Employee</a></li>
									<li><a href="{{ url('search_employee') }}">Search Employee</a></li>
								</ul>
						</li>

						<li class="menu-list">
							<a href="#"><i class="fa fa-building-o"></i>
								<span>Departments</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_department') }}">View / Edit Departments</a> </li>
									<li><a href="{{ url('add_department') }}">Add New Department</a></li>
									
								</ul>
						</li>

						<li class="menu-list">
							<a href="#"><i class="fa fa-tasks"></i>
								<span>Designations</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_designation') }}">View / Edit Designations</a> </li>
									<li><a href="{{ url('add_designation') }}">Add New Designation</a></li>
								</ul>
						</li>

						<li class="menu-list">
							<a href="#"><i class="fa fa-archive" aria-hidden="true"></i>
								<span>Divisions</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_division') }}">View / Edit Divisions</a> </li>
									<li><a href="{{ url('add_division') }}">Add New Division</a></li>
								</ul>
						</li>


						<li class="menu-list">
							<a href="#"><i class="fa fa-keyboard-o" aria-hidden="true"></i>
								<span>Sections</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_section') }}">View / Edit Sections</a> </li>
									<li><a href="{{ url('add_section') }}">Add New Section</a></li>
								</ul>
						</li>

						<li class="menu-list">
							<a href="#"><i class="fa fa-user"></i>
								<span>Supervisors</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_supervisor') }}">View / Edit Supervisors</a> </li>
									<li><a href="{{ url('add_supervisor') }}">Add New Supervisor</a></li>
								</ul>
						</li>
						
						<li class="menu-list">
							<a href="#"><i class="fa fa-briefcase"></i>
								<span>Job Locations</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_job_location') }}">View / Edit Job Locations</a> </li>
									<li><a href="{{ url('add_job_location') }}">Add New Job Location</a></li>
								</ul>
						</li>

						<li class="menu-list">
							<a href="#"><i class="fa fa-map-marker"></i>
								<span>Office Locations</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_office_location') }}">View / Edit Office Locations</a> </li>
									<li><a href="{{ url('add_office_location') }}">Add New Office Location</a></li>
								</ul>
						</li>
						
						<!-- <li class="menu-list">
							<a href="#"><i class="fa fa-tasks"></i>
								<span>News</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_news') }}">View / Edit News</a> </li>
									<li><a href="{{ url('add_news') }}">Add New News</a></li>
								</ul>
						</li>

						<li class="menu-list">
							<a href="#"><i class="fa fa-tasks"></i>
								<span>Notice</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_notice') }}">View / Edit Notice</a> </li>
									<li><a href="{{ url('add_notice') }}">Add New Notice</a></li>
								</ul>
						</li>	

						<li class="menu-list">
							<a href="#"><i class="fa fa-tasks"></i>
								<span>Events</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_event') }}">View / Edit Events</a> </li>
									<li><a href="{{ url('add_event') }}">Add New Event</a></li>
								</ul>
						</li>	
						<li class="menu-list">
							<a href="#"><i class="fa fa-tasks"></i>
								<span>Gallery</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ url('view_image_gallery') }}">View Image Gallery</a></li>
									<li><a href="{{ url('add_image') }}">Add Image in Gallery</a></li>
								</ul>
						</li> -->
						
					</ul>

			</div>
		</div>

		<div class="main-content">

			<div class="header-section">
			 

			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>

			<div class="menu-right">
				<div class="user-panel-top">  	
					
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										
										 <div class="user-name">
											<p>{{$_SESSION['HR_USER_NAME']}}<span>Administrator</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									
									<li> <a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					          	
					<div class="clearfix"></div>
				</div>
			  </div>

			</div>
