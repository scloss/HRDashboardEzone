<?php namespace App\Http\Controllers;
session_start();
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Mail;
use Request;
use DateTime;
use \Input as Input;
use \File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use ZipArchive;
use Zipper;
use Storage;
use Illuminate\Support\Facades\Redirect;
header('Access-Control-Allow-Origin: *');  

class MainController extends Controller {

	
	public function index(){

		if(isset($_SESSION['HR_USER_NAME'])){

				return redirect('home');
		}

		return view('HR_views.login');
	}


	public function get_employee_api(){


		$sql_emp = "SELECT * from hr_tool_ezone.employee_table WHERE status='Active' ORDER BY name";
		$emp_lists =  \DB::select(\DB::raw($sql_emp));

		echo json_encode(array("emp_list"=>$emp_lists));
	}
	public function phoenix_get_employee_api(){


		$sql_emp = "SELECT * from hr_tool_ezone.employee_table WHERE status='Active' AND department IN('Gateway Operations','NOC','O&M-1','O&M-2','Power & Projects','I&C- Implementation','OH- Implementation','UG- Implementation','O&M-3','COS- O&M','RSL') ORDER BY name";
		$emp_lists =  \DB::select(\DB::raw($sql_emp));

		echo json_encode(array("emp_list"=>$emp_lists));
	}

	public function get_news_api(){

		$sql_news = "SELECT * from hr_tool_ezone.news_table WHERE news_status='Active' ORDER BY news_row_create_time DESC";
		$news_lists =  \DB::select(\DB::raw($sql_news));

		echo json_encode(array("news_list"=>$news_lists));
	}

	public function get_event_api(){

		$sql_event = "SELECT * from hr_tool_ezone.event_table WHERE event_status='Active' ORDER BY event_row_create_time DESC";
		$event_lists =  \DB::select(\DB::raw($sql_event));

		echo json_encode(array("event_list"=>$event_lists));		
	}

	public function get_notice_api(){

		$sql_notice = "SELECT * from hr_tool_ezone.notice_table WHERE notice_status='Active' ORDER BY notice_row_create_time DESC";
		$notice_lists =  \DB::select(\DB::raw($sql_notice));

		echo json_encode(array("notice_list"=>$notice_lists));

	}

	public function home(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		return view('HR_views.home');
	}

	public function home_hr(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		return view('HR_views.view_employee_hr');
	}

	public function add_employee(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_department = "SELECT * FROM hr_tool_ezone.department_table WHERE dept_status='Active' ORDER BY dept_name";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		$sql_designation = "SELECT * FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		$sql_division = "SELECT * FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		$sql_job_location = "SELECT * FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		$sql_office_location = "SELECT * FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		$sql_section = "SELECT * FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		$sql_supervisor = "SELECT * FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));



		return view('HR_views.add_employee',compact('department_lists','designation_lists','division_lists','job_location_lists','office_location_lists','section_lists','supervisor_lists'));
	}

	public function add_image(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		return view('HR_views.add_image');
	}

	public function add_news(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_news');
		
	}	

	public function add_notice(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_notice');
		
	}	

	public function add_event(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_event');
		
	}	

	public function add_department(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_department');
		
	}

	public function add_designation(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		
		
		return view('HR_views.add_designation');

	}

	public function add_division(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_division');
		
	}

	public function add_section(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_section');
		
	}

	public function add_supervisor(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_supervisor');
		
	}

	public function add_job_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_job_location');
		
	}

	public function add_office_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

			

		return view('HR_views.add_office_location');
		
	}

	public function deactivate_news(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$news_row_id = Request::get('news_row_id');	

		$update_news_table_query =  \DB::update(\DB::raw("UPDATE hr_tool_ezone.news_table SET news_status='deactivated' WHERE news_row_id='$news_row_id'"));

		return redirect('view_news');
	}

	public function deactivate_notice(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$notice_row_id = Request::get('notice_row_id');	

		$update_notice_table_query =  \DB::update(\DB::raw("UPDATE hr_tool_ezone.notice_table SET notice_status='deactivated' WHERE notice_row_id='$notice_row_id'"));

		return redirect('view_notice');
	}

	public function deactivate_event(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$event_row_id = Request::get('event_row_id');	

		$update_event_table_query =  \DB::update(\DB::raw("UPDATE hr_tool_ezone.event_table SET event_status='deactivated' WHERE event_row_id='$event_row_id'"));

		return redirect('view_event');

	}

	public function deactivate_image(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$image_row_id = Request::get('image_row_id');	

		$update_image_table_query =  \DB::update(\DB::raw("UPDATE hr_tool_ezone.image_table SET image_status='deactivated' WHERE image_row_id='$image_row_id'"));

		return redirect('view_image_gallery');

	}

	

	public function view_image_gallery(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_image = "SELECT * FROM hr_tool_ezone.image_table ORDER BY image_row_create_date DESC";
		$image_lists =  \DB::select(\DB::raw($sql_image));

		return view('HR_views.view_image_gallery',compact('image_lists'));

	}	

	public function view_notice(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_notice = "SELECT * FROM hr_tool_ezone.notice_table ORDER BY notice_row_create_time DESC";
		$notice_lists =  \DB::select(\DB::raw($sql_notice));

		return view('HR_views.view_notice',compact('notice_lists'));

	}

	public function view_event(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_event = "SELECT * FROM hr_tool_ezone.event_table ORDER BY event_row_create_time DESC";
		$event_lists =  \DB::select(\DB::raw($sql_event));

		return view('HR_views.view_event',compact('event_lists'));

	}

	public function view_news(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_news = "SELECT * FROM hr_tool_ezone.news_table ORDER BY news_row_create_time DESC";
		$news_lists =  \DB::select(\DB::raw($sql_news));

		return view('HR_views.view_news',compact('news_lists'));


	}

	public function view_department(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_department = "SELECT DISTINCT dept_name FROM hr_tool_ezone.department_table WHERE dept_status='Active' ORDER BY dept_name";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		return view('HR_views.view_department',compact('department_lists'));
	}

	public function view_designation(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}




		$sql_designation = "SELECT DISTINCT designation_name FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		return view('HR_views.view_designation',compact('designation_lists'));
	}

	public function view_division(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}
				

		$sql_division = "SELECT DISTINCT division_name FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		return view('HR_views.view_division',compact('division_lists'));
	}

	public function view_section(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}



		$sql_section = "SELECT DISTINCT section_name FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		return view('HR_views.view_section',compact('section_lists'));
	}


	public function view_supervisor(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}



		$sql_supervisor = "SELECT DISTINCT supervisor_name FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		return view('HR_views.view_supervisor',compact('supervisor_lists'));
	}

	public function view_job_location(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}



		$sql_job_location = "SELECT DISTINCT job_location_name FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		return view('HR_views.view_job_location',compact('job_location_lists'));
	}

	public function view_office_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}



		$sql_office_location = "SELECT DISTINCT office_location_name FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		return view('HR_views.view_office_location',compact('office_location_lists'));
	}

	public function edit_department(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$deptName = Request::get('deptName');

		
		

		$sql_department = "SELECT  * FROM hr_tool_ezone.department_table WHERE dept_name='$deptName' AND dept_status='Active'";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		foreach($department_lists as $department_list){

			$departmentName = $department_list->dept_name;

		}

		return view('HR_views.edit_department',compact('departmentName'));


	}

	public function edit_designation(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$designationName = Request::get('designationName');

		$sql_designation = "SELECT  * FROM hr_tool_ezone.designation_table WHERE designation_name='$designationName'  AND designation_status='Active'";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		foreach($designation_lists as $designation_list){

			$designationName = $designation_list->designation_name;

		}

		return view('HR_views.edit_designation',compact('designationName'));
	}

	public function edit_division(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$divisionName = Request::get('divisionName');

		$sql_division = "SELECT  * FROM hr_tool_ezone.division_table WHERE division_name='$divisionName' AND division_status='Active'";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		foreach($division_lists as $division_list){

			$divisionName = $division_list->division_name;

		}

		return view('HR_views.edit_division',compact('divisionName'));
	}

	public function edit_section(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$sectionName = Request::get('sectionName');

		$sql_section = "SELECT  * FROM hr_tool_ezone.section_table WHERE section_name='$sectionName' AND section_status='Active'";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		foreach($section_lists as $section_list){

			$sectionName = $section_list->section_name;

		}

		return view('HR_views.edit_section',compact('sectionName'));
	}


	public function edit_supervisor(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$supervisorName = Request::get('supervisorName');

		$sql_supervisor = "SELECT  * FROM hr_tool_ezone.supervisor_table WHERE supervisor_name='$supervisorName' AND supervisor_status='Active'";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		foreach($supervisor_lists as $supervisor_list){

			$supervisorName = $supervisor_list->supervisor_name;

		}

		return view('HR_views.edit_supervisor',compact('supervisorName'));
	}


	public function edit_job_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$jobLocationName = Request::get('jobLocationName');

		$sql_job_location = "SELECT  * FROM hr_tool_ezone.job_location_table WHERE job_location_name='$jobLocationName' AND job_location_status='Active'";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		foreach($job_location_lists as $job_location_list){

			$jobLocationName = $job_location_list->job_location_name;

		}

		return view('HR_views.edit_job_location',compact('jobLocationName'));
	}


	public function edit_office_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$officeLocationName = Request::get('officeLocationName');

		$officeLocationName = addslashes($officeLocationName);
		$sql_office_location = "SELECT  * FROM hr_tool_ezone.office_location_table WHERE office_location_name='$officeLocationName' AND office_location_status='Active'";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		foreach($office_location_lists as $office_location_list){

			$officeLocationName = $office_location_list->office_location_name;

		}

		return view('HR_views.edit_office_location',compact('officeLocationName'));
	}



	public function edit_employee(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$empId = Request::get('empId');

		$sql_employee = "SELECT  * FROM hr_tool_ezone.employee_table WHERE employee_row_id='$empId'";
		$employee_lists =  \DB::select(\DB::raw($sql_employee));

			foreach($employee_lists as $employee_list){

			$employeeRowId = $employee_list->employee_row_id;
			$hrId = $employee_list->hr_id;
			$name = $employee_list->name;
			$designation = $employee_list->designation;
			$joiningDate = $employee_list->joining_date;
			$division = $employee_list->division;
			$department = $employee_list->department;
			$section = $employee_list->section;
			$gender = $employee_list->gender;
			$email = $employee_list->email;
			$phone = $employee_list->phone;
			$blood_group = $employee_list->blood_group;
			$marital_status = $employee_list->marital_status;
			$job_location = $employee_list->job_location;
			$office_location = $employee_list->office_location;
			$supervisor_name = $employee_list->supervisor_name;
			$date_of_birth = $employee_list->date_of_birth;
			$religion = $employee_list->religion;
			$emergency_contact_name = $employee_list->emergency_contact_name;
			$emergency_contact_phone = $employee_list->emergency_contact_phone;
			$relation = $employee_list->relation;
			$home_district = $employee_list->home_district;
			$present_address = $employee_list->present_address;
			$permanent_address = $employee_list->permanent_address;
			$imagePath=$employee_list->image_path;
			
			
			

			}

		$sql_department = "SELECT * FROM hr_tool_ezone.department_table WHERE dept_status='Active' ORDER BY dept_name";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		$sql_designation = "SELECT * FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		$sql_division = "SELECT * FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		$sql_job_location = "SELECT * FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		$sql_office_location = "SELECT * FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		$sql_section = "SELECT * FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		$sql_supervisor = "SELECT * FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));
	

		
		return view('HR_views.edit_employee',compact('employeeRowId','hrId','name','email','phone','designation','department','joiningDate','division','section','gender','blood_group','marital_status','job_location','office_location','supervisor_name','date_of_birth','religion','emergency_contact_name','emergency_contact_phone','relation','home_district','present_address','permanent_address','imagePath','department_lists','designation_lists','division_lists','job_location_lists','office_location_lists','section_lists','supervisor_lists'));



	}

	public function confirm_department_edit(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$deptName = Request::get('deptName');
		$deptName = addslashes($deptName);
		$prevDeptName = Request::get('prevDeptName');

		$sql_department_check_active = "SELECT dept_name FROM hr_tool_ezone.department_table WHERE dept_name='$deptName' AND dept_status='Active'";

		$sql_department_check_active_list =  \DB::select(\DB::raw($sql_department_check_active));

		if($sql_department_check_active_list){

				$errorMsg = 'Department Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_department = "UPDATE hr_tool_ezone.department_table SET dept_name='$deptName' WHERE dept_name='$prevDeptName' AND dept_status='Active'";
			$result_update_dept = \DB::update(\DB::raw($sql_active_department));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET department='$deptName' WHERE department='$prevDeptName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			return direct('view_department');




	}

	public function confirm_designation_edit(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$designationName = Request::get('designationName');
		$designationName = addslashes($designationName);
		$prevDesignationName = Request::get('prevDesignationName');
		$sql_designation_check_active = "SELECT designation_name FROM hr_tool_ezone.designation_table WHERE designation_name='$designationName' AND designation_status='Active'";

		$sql_designation_check_active_list =  \DB::select(\DB::raw($sql_designation_check_active));

		if($sql_designation_check_active_list){

				$errorMsg = 'Designation Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_designation = "UPDATE hr_tool_ezone.designation_table SET designation_name='$designationName' WHERE designation_name='$prevDesignationName' AND designation_status='Active'";
			$result_update_designation = \DB::update(\DB::raw($sql_active_designation));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET designation='$designationName' WHERE designation='$prevDesignationName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			$sql_designation = "SELECT DISTINCT designation_name FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
			$designation_lists =  \DB::select(\DB::raw($sql_designation));

			return view('HR_views.view_designation',compact('designation_lists'));

	}


	public function confirm_section_edit(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$sectionName = Request::get('sectionName');
		$sectionName = addslashes($sectionName);
		$prevSectionName = Request::get('prevSectionName');
		$sql_section_check_active = "SELECT section_name FROM hr_tool_ezone.section_table WHERE section_name='$sectionName' AND section_status='Active'";

		$sql_section_check_active_list =  \DB::select(\DB::raw($sql_section_check_active));

		if($sql_section_check_active_list){

				$errorMsg = 'Section Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_section = "UPDATE hr_tool_ezone.section_table SET section_name='$sectionName' WHERE section_name='$prevSectionName' AND section_status='Active'";
			$result_update_section = \DB::update(\DB::raw($sql_active_section));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET section='$sectionName' WHERE section='$prevSectionName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			$sql_section = "SELECT DISTINCT section_name FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
			$section_lists =  \DB::select(\DB::raw($sql_section));

			return view('HR_views.view_section',compact('section_lists'));

	}

	public function confirm_division_edit(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$divisionName = Request::get('divisionName');
		$divisionName = addslashes($divisionName);
		$prevDivisionName = Request::get('prevDivisionName');
		$sql_division_check_active = "SELECT division_name FROM hr_tool_ezone.division_table WHERE division_name='$divisionName' AND division_status='Active'";

		$sql_division_check_active_list =  \DB::select(\DB::raw($sql_division_check_active));

		if($sql_division_check_active_list){

				$errorMsg = 'Division Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_division = "UPDATE hr_tool_ezone.division_table SET division_name='$divisionName' WHERE division_name='$prevDivisionName' AND division_status='Active'";
			$result_update_division = \DB::update(\DB::raw($sql_active_division));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET division='$divisionName' WHERE division='$prevDivisionName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			$sql_division = "SELECT DISTINCT division_name FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
			$division_lists =  \DB::select(\DB::raw($sql_division));

			return view('HR_views.view_division',compact('division_lists'));

	}


	public function confirm_supervisor_edit(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$supervisorName = Request::get('supervisorName');
		$supervisorName = addslashes($supervisorName);
		$prevSupervisorName = Request::get('prevSupervisorName');
		$sql_supervisor_check_active = "SELECT supervisor_name FROM hr_tool_ezone.supervisor_table WHERE supervisor_name='$supervisorName' AND supervisor_status='Active'";

		$sql_supervisor_check_active_list =  \DB::select(\DB::raw($sql_supervisor_check_active));

		if($sql_supervisor_check_active_list){

				$errorMsg = 'Supervisor Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_supervisor = "UPDATE hr_tool_ezone.supervisor_table SET supervisor_name='$supervisorName' WHERE supervisor_name='$prevSupervisorName' AND supervisor_status='Active'";
			$result_update_supervisor = \DB::update(\DB::raw($sql_active_supervisor));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET supervisor_name='$supervisorName' WHERE supervisor_name='$prevSupervisorName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			$sql_supervisor = "SELECT DISTINCT supervisor_name FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
			$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

			return view('HR_views.view_supervisor',compact('supervisor_lists'));

	}


	public function confirm_job_location_edit(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$jobLocationName = Request::get('jobLocationName');
		$jobLocationName = addslashes($jobLocationName);
		$prevJobLocationName = Request::get('prevJobLocationName');
		$sql_job_location_check_active = "SELECT job_location_name FROM hr_tool_ezone.job_location_table WHERE job_location_name='$jobLocationName' AND job_location_status='Active'";

		$sql_job_location_check_active_list =  \DB::select(\DB::raw($sql_job_location_check_active));

		if($sql_job_location_check_active_list){

				$errorMsg = 'Job Location Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_job_location = "UPDATE hr_tool_ezone.job_location_table SET job_location_name='$jobLocationName' WHERE job_location_name='$prevJobLocationName' AND job_location_status='Active'";
			$result_update_job_location = \DB::update(\DB::raw($sql_active_job_location));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET job_location='$jobLocationName' WHERE job_location='$prevJobLocationName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			$sql_job_location = "SELECT DISTINCT job_location_name FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
			$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

			return view('HR_views.view_job_location',compact('job_location_lists'));

	}


	public function confirm_office_location_edit(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$officeLocationName = Request::get('officeLocationName');
		$officeLocationName = addslashes($officeLocationName);

		$prevOfficeLocationName = Request::get('prevOfficeLocationName');
		$prevOfficeLocationName = addslashes($prevOfficeLocationName);

		$sql_office_location_check_active = "SELECT office_location_name FROM hr_tool_ezone.office_location_table WHERE office_location_name='$officeLocationName' AND office_location_status='Active'";

		$sql_office_location_check_active_list =  \DB::select(\DB::raw($sql_office_location_check_active));

		if($sql_office_location_check_active_list){

				$errorMsg = 'Office Location Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

			$sql_active_office_location = "UPDATE hr_tool_ezone.office_location_table SET office_location_name='$officeLocationName' WHERE office_location_name='$prevOfficeLocationName' AND office_location_status='Active'";
			$result_update_office_location = \DB::update(\DB::raw($sql_active_office_location));

			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET office_location='$officeLocationName' WHERE office_location='$prevOfficeLocationName' AND status='Active'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));

			$sql_office_location = "SELECT DISTINCT office_location_name FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
			$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

			return view('HR_views.view_office_location',compact('office_location_lists'));

	}

	public function confirm_employee_edit(){

			if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
			}



			$rowId = Request::get('empId');


			date_default_timezone_set('Asia/Dhaka');
			$hrId = Request::get('hrId');
			$name = Request::get('name');
			$designation = Request::get('designation');
			$joining_date = Request::get('joining_date');
			$division = Request::get('division');
			$department = Request::get('department');
			$section = Request::get('section');
			$gender = Request::get('gender');
			$email = Request::get('email');
			$phone = Request::get('phone');
			$blood_group = Request::get('blood_group');
			$marital_status = Request::get('marital_status');
			$job_location = Request::get('job_location');
			$office_location = Request::get('office_location');
			$supervisor_name = Request::get('supervisor_name');
			$date_of_birth = Request::get('date_of_birth');
			$religion = Request::get('religion');
			$emergency_contact_name = Request::get('emergency_contact_name');
			$emergency_contact_phone = Request::get('emergency_contact_phone');
			$relation = Request::get('relation');
			$home_district = Request::get('home_district');
			$present_address = Request::get('present_address');
			$permanent_address = Request::get('permanent_address');



			$name = addslashes($name);
			$email = addslashes($email);
			$phone = addslashes($phone);
			$department = addslashes($department);
			$division = addslashes($division);
			$section = addslashes($section);
			$job_location = addslashes($job_location);
			$office_location = addslashes($office_location);
			$emergency_contact_name = addslashes($emergency_contact_name);
			$emergency_contact_phone = addslashes($emergency_contact_phone);
			$relation = addslashes($relation);
			$home_district = addslashes($home_district);
			$present_address = addslashes($present_address);
			$permanent_address = addslashes($permanent_address);

			
		
			$joining_date = date('Y-m-d', strtotime($joining_date));
			$date_of_birth = date('Y-m-d', strtotime($date_of_birth));

			// return $date_of_birth;


			$sql_active_employees = "UPDATE hr_tool_ezone.employee_table SET hr_id='$hrId',name='$name',email='$email',phone='$phone',designation='$designation',department='$department',joining_date='$joining_date',division='$division',section='$section',gender='$gender',blood_group='$blood_group',marital_status='$marital_status',job_location='$job_location',office_location='$office_location',supervisor_name='$supervisor_name',date_of_birth='$date_of_birth',religion='$religion',emergency_contact_name='$emergency_contact_name',emergency_contact_phone='$emergency_contact_phone',relation='$relation',home_district='$home_district',present_address='$present_address',permanent_address='$permanent_address' WHERE employee_row_id='$rowId'";
			$result_update_emp = \DB::update(\DB::raw($sql_active_employees));


			if(Input::hasFile('image_path'))
		        { 

		        	
		        	$dirPath = '../employee_images/';
			 			$file = Input::file('image_path');
				 		
				 		$filename = $rowId.'.jpg';
				 		$file->move($dirPath,$filename);



				 	$image_source = '../employee_images/'.$rowId.'.jpg';
				 	$sql_update = "UPDATE hr_tool_ezone.employee_table SET image_path='$image_source' WHERE employee_row_id='$rowId'";
					$result = \DB::update(\DB::raw($sql_update));

		        }

			return view('HR_views.home');

			

	}

	public function delete_department(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$deptName = Request::get('deptName');


		$sql_department = "SELECT  * FROM hr_tool_ezone.department_table WHERE dept_name='$deptName'";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		foreach($department_lists as $department_list){

			$departmentName = $department_list->dept_name;

		}

		return view('HR_views.delete_department',compact('departmentName'));

	}

	public function delete_designation(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$designationName = Request::get('designationName');

		$sql_designation = "SELECT  * FROM hr_tool_ezone.designation_table WHERE designation_name='$designationName'";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		foreach($designation_lists as $designation_list){

			$designationName = $designation_list->designation_name;

		}

		return view('HR_views.delete_designation',compact('designationName'));

	}

	public function delete_division(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$divisionName = Request::get('divisionName');

		$sql_division = "SELECT  * FROM hr_tool_ezone.division_table WHERE division_name='$divisionName'";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		foreach($division_lists as $division_list){

			$divisionName = $division_list->division_name;

		}

		return view('HR_views.delete_division',compact('divisionName'));

	}

	public function delete_section(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$sectionName = Request::get('sectionName');

		$sql_section = "SELECT  * FROM hr_tool_ezone.section_table WHERE section_name='$sectionName'";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		foreach($section_lists as $section_list){

			$sectionName = $section_list->section_name;

		}

		return view('HR_views.delete_section',compact('sectionName'));

	}


	public function delete_supervisor(){



		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$supervisorName = Request::get('supervisorName');

		$sql_supervisor = "SELECT  * FROM hr_tool_ezone.supervisor_table WHERE supervisor_name='$supervisorName'";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		foreach($supervisor_lists as $supervisor_list){

			$supervisorName = $supervisor_list->supervisor_name;

		}

		return view('HR_views.delete_supervisor',compact('supervisorName'));

	}


	public function delete_job_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$jobLocationName = Request::get('jobLocationName');

		$sql_job_location = "SELECT  * FROM hr_tool_ezone.job_location_table WHERE job_location_name='$jobLocationName'";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		foreach($job_location_lists as $job_location_list){

			$jobLocationName = $job_location_list->job_location_name;

		}

		return view('HR_views.delete_job_location',compact('jobLocationName'));

	}

	public function delete_office_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$officeLocationName = Request::get('officeLocationName');
		$officeLocationName = addslashes($officeLocationName);

		$sql_office_location = "SELECT  * FROM hr_tool_ezone.office_location_table WHERE office_location_name='$officeLocationName'";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		foreach($office_location_lists as $office_location_list){

			$officeLocationName = $office_location_list->office_location_name;

		}

		return view('HR_views.delete_office_location',compact('officeLocationName'));

	}

	public function delete_employee(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$empId = Request::get('empId');

		$sql_employee = "SELECT  * FROM hr_tool_ezone.employee_table WHERE employee_row_id='$empId'";
		$employee_lists =  \DB::select(\DB::raw($sql_employee));

		foreach($employee_lists as $employee_list){

			$employeeRowId = $employee_list->employee_row_id;
			$hrId = $employee_list->hr_id;
			$name = $employee_list->name;
			$designation = $employee_list->designation;
			$joiningDate = $employee_list->joining_date;
			$division = $employee_list->division;
			$department = $employee_list->department;
			$section = $employee_list->section;
			$gender = $employee_list->gender;
			$email = $employee_list->email;
			$phone = $employee_list->phone;
			$blood_group = $employee_list->blood_group;
			$marital_status = $employee_list->marital_status;
			$job_location = $employee_list->job_location;
			$office_location = $employee_list->office_location;
			$supervisor_name = $employee_list->supervisor_name;
			$date_of_birth = $employee_list->date_of_birth;
			$religion = $employee_list->religion;
			$emergency_contact_name = $employee_list->emergency_contact_name;
			$emergency_contact_phone = $employee_list->emergency_contact_phone;
			$relation = $employee_list->relation;
			$home_district = $employee_list->home_district;
			$present_address = $employee_list->present_address;
			$permanent_address = $employee_list->permanent_address;
			$imagePath=$employee_list->image_path;
			
			
			

		}



		
		return view('HR_views.delete_employee',compact('employeeRowId','hrId','name','email','phone','designation','department','joiningDate','division','section','gender','blood_group','marital_status','job_location','office_location','supervisor_name','date_of_birth','religion','emergency_contact_name','emergency_contact_phone','relation','home_district','present_address','permanent_address','imagePath'));

	}

	public function confirm_department_delete(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$deptName = Request::get('deptName');

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE department='$deptName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Department is not empty. You cannot delete a department with employees in it. Remove or change the department of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.department_table SET dept_status='Disabled' WHERE dept_name='$deptName' AND dept_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));


		return direct('view_department');

	}

	public function confirm_designation_delete(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$designationName = Request::get('designationName');

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE designation='$designationName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Designation is not empty. You cannot delete a Designation with employees in it. Change the designation of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.designation_table SET designation_status='Disabled' WHERE designation_name='$designationName' AND designation_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));

		$sql_designation = "SELECT DISTINCT designation_name FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		return view('HR_views.view_designation',compact('designation_lists'));


	}

	public function confirm_division_delete(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$divisionName = Request::get('divisionName');

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE division='$divisionName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Division is not empty. You cannot delete a Division with employees in it. Change the Division of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.division_table SET division_status='Disabled' WHERE division_name='$divisionName' AND division_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));

		$sql_division = "SELECT DISTINCT division_name FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		return view('HR_views.view_division',compact('division_lists'));


	}

	public function confirm_section_delete(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$sectionName = Request::get('sectionName');

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE section='$sectionName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Section is not empty. You cannot delete a Section with employees in it. Change the Section of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.section_table SET section_status='Disabled' WHERE section_name='$sectionName' AND section_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));

		$sql_section = "SELECT DISTINCT section_name FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		return view('HR_views.view_section',compact('section_lists'));


	}

	public function confirm_supervisor_delete(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$supervisorName = Request::get('supervisorName');

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE supervisor_name='$supervisorName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Supervisor is not empty. You cannot delete a Supervisor with employees in it. Change the Supervisor of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.supervisor_table SET supervisor_status='Disabled' WHERE supervisor_name='$supervisorName' AND supervisor_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));

		$sql_supervisor = "SELECT DISTINCT supervisor_name FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		return view('HR_views.view_supervisor',compact('supervisor_lists'));


	}


	public function confirm_job_location_delete(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$jobLocationName = Request::get('jobLocationName');

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE job_location='$jobLocationName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Job Location is not empty. You cannot delete a Job Location with employees in it. Change the Job Location of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.job_location_table SET job_location_status='Disabled' WHERE job_location_name='$jobLocationName' AND job_location_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));

		$sql_job_location = "SELECT DISTINCT job_location_name FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		return view('HR_views.view_job_location',compact('job_location_lists'));


	}


	public function confirm_office_location_delete(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$officeLocationName = Request::get('officeLocationName');
		$officeLocationName = addslashes($officeLocationName);

		$sql_check_employee_table = "SELECT  * FROM hr_tool_ezone.employee_table WHERE office_location='$officeLocationName' AND status='Active'";
		$employee_lists =  \DB::select(\DB::raw($sql_check_employee_table));

		if($employee_lists){

			$errorMsg = 'Office Location is not empty. You cannot delete a Office Location with employees in it. Change the Office Location of the employees and then try again';

			return view('HR_views.error',compact('errorMsg'));
		}

		$sql_update = "UPDATE hr_tool_ezone.office_location_table SET office_location_status='Disabled' WHERE office_location_name='$officeLocationName' AND office_location_status='Active'";
		$result = \DB::update(\DB::raw($sql_update));

		$sql_office_location = "SELECT DISTINCT office_location_name FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		return view('HR_views.view_office_location',compact('office_location_lists'));


	}

	public function confirm_employee_delete(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$leavingDate = Request::get('leaving_date');

		$leavingDate = date('Y-m-d', strtotime($leavingDate));

		$row_id = Request::get('empId');

		$sql_update = "UPDATE hr_tool_ezone.employee_table SET status='Disabled',leaving_date='$leavingDate' WHERE employee_row_id='$row_id'";
		$result = \DB::update(\DB::raw($sql_update));

		return view('HR_views.home');
		
	}

	public function insert_employee(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		date_default_timezone_set('Asia/Dhaka');
		$hrId = Request::get('hrId');
		$name = Request::get('name');
		$designation = Request::get('designation');
		$joining_date = Request::get('joining_date');
		$division = Request::get('division');
		$department = Request::get('department');
		$section = Request::get('section');
		$gender = Request::get('gender');
		$email = Request::get('email');
		$phone = Request::get('phone');
		$blood_group = Request::get('blood_group');
		$marital_status = Request::get('marital_status');
		$job_location = Request::get('job_location');
		$office_location = Request::get('office_location');
		$supervisor_name = Request::get('supervisor_name');
		$date_of_birth = Request::get('date_of_birth');
		$religion = Request::get('religion');
		$emergency_contact_name = Request::get('emergency_contact_name');
		$emergency_contact_phone = Request::get('emergency_contact_phone');
		$relation = Request::get('relation');
		$home_district = Request::get('home_district');
		$present_address = Request::get('present_address');
		$permanent_address = Request::get('permanent_address');



		$name = addslashes($name);
		$email = addslashes($email);
		$phone = addslashes($phone);
		$division = addslashes($division);
		$section = addslashes($section);
		$department = addslashes($department);
		$job_location = addslashes($job_location);
		$office_location = addslashes($office_location);
		$emergency_contact_name = addslashes($emergency_contact_name);
		$emergency_contact_phone = addslashes($emergency_contact_phone);
		$relation = addslashes($relation);
		$home_district = addslashes($home_district);
		$present_address = addslashes($present_address);
		$permanent_address = addslashes($permanent_address);

		
	
		$joining_date = date('Y-m-d', strtotime($joining_date));
		$date_of_birth = date('Y-m-d', strtotime($date_of_birth));


		$insert_employee = "INSERT INTO hr_tool_ezone.employee_table (hr_id,name,designation,joining_date,division,department,section,gender,email,phone,blood_group,marital_status,job_location,office_location,supervisor_name,date_of_birth,religion,emergency_contact_name,emergency_contact_phone,relation,home_district,present_address,permanent_address,leaving_date,status) values ('".$hrId."','".$name."','".$designation."','".$joining_date."','".$division."','".$department."','".$section."','".$gender."','".$email."','".$phone."','".$blood_group."','".$marital_status."','".$job_location."','".$office_location."','".$supervisor_name."','".$date_of_birth."','".$religion."','".$emergency_contact_name."','".$emergency_contact_phone."','".$relation."','".$home_district."','".$present_address."','".$permanent_address."','0000-00=00','Active')";
		\DB::insert(\DB::raw($insert_employee));

		$result_list =  \DB::select(\DB::raw("SELECT employee_row_id FROM hr_tool_ezone.employee_table ORDER BY employee_row_id DESC limit 1"));

		foreach($result_list as $result)
		{
			$employee_row_id = $result->employee_row_id;
		}

		if(Input::hasFile('image_path'))
        { 

        	// $path = '../employee_images/';
        	$dirPath = '../employee_images/';
	 			$file = Input::file('image_path');
		 		
		 		$filename = $employee_row_id.'.jpg';
		 		$file->move($dirPath,$filename);



		 	$image_source = '../employee_images/'.$employee_row_id.'.jpg';
		 	$sql_update = "UPDATE hr_tool_ezone.employee_table SET image_path='$image_source' WHERE employee_row_id='$employee_row_id'";
			$result = \DB::update(\DB::raw($sql_update));

        }

		

		return redirect('home');
	}
	public function compressImage($source_image, $compress_image) {
		$image_info = getimagesize($source_image);
		if ($image_info['mime'] == 'image/jpg') {
		$source_image = imagecreatefromjpeg($source_image);
		imagejpeg($source_image, $compress_image, 75);
		}
		return $compress_image;
	}
	public function insert_image(){
		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$image_tag = Request::get('image_tag');	

		$insert_image = "INSERT INTO hr_tool_ezone.image_table (image_tag) VALUES ('".$image_tag."')";

		\DB::insert(\DB::raw($insert_image));

		$result_list =  \DB::select(\DB::raw("SELECT image_row_id FROM hr_tool_ezone.image_table ORDER BY image_row_id DESC limit 1"));

		foreach($result_list as $result)
		{
			$image_row_id = $result->image_row_id;
		}		

		if(Input::hasFile('image_path'))
        { 

        	$dirPath = '../gallery_images/';
	 		$file = Input::file('image_path');
	 		$filenameTemp = 'temp.jpg';
		 		
		 	$filename = $image_row_id.'.jpg';


		 	$compress_image = '';
			// $image_info = getimagesize($image_source);
			// if ($image_info['mime'] == 'image/jpg') {
			
		 	$file->move($dirPath,$filenameTemp);
		 	$image_sourceTemp = '../gallery_images/temp.jpg';
		 	$image_source = '../gallery_images/'.$image_row_id.'.jpg';
		 	$image_source1 = imagecreatefromjpeg($image_sourceTemp);
			imagejpeg($image_source1, $image_source, 75);
			unlink("../gallery_images/temp.jpg");  

		 	
		 	$sql_update = "UPDATE hr_tool_ezone.image_table SET image_location='$image_source' WHERE image_row_id='$image_row_id'";
			$result = \DB::update(\DB::raw($sql_update));



			// }

        }		

	}

	public function insert_news(){

			if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
			}		

			$news_title = Request::get('news_title');
			$news_title = addslashes($news_title);
			$news_description = Request::get('news_description');
			$news_description = addslashes($news_description);
			$news_date = date("Y-m-d");

			$sql_insert_news = "INSERT INTO hr_tool_ezone.news_table (news_title,news_description,news_date) VALUES ('".$news_title."','".$news_description."','".$news_date."')";
			\DB::insert(\DB::raw($sql_insert_news));		

			return redirect('view_news');



	}

	public function insert_notice(){

			if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
			}		

			$notice_title = Request::get('notice_title');
			$notice_title = addslashes($notice_title);
			$notice_description = Request::get('notice_description');
			$notice_description = addslashes($notice_description);
			$notice_date = date("Y-m-d");

			$sql_insert_notice = "INSERT INTO hr_tool_ezone.notice_table (notice_title,notice_description,notice_date) VALUES ('".$notice_title."','".$notice_description."','".$notice_date."')";
			\DB::insert(\DB::raw($sql_insert_notice));		

			return redirect('view_notice');




	}

	public function insert_event(){

			if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
			}		

			$event_title = Request::get('event_title');
			$event_title = addslashes($event_title);
			$event_description = Request::get('event_description');
			$event_description = addslashes($event_description);
			$event_date = date("Y-m-d");

			$sql_insert_event = "INSERT INTO hr_tool_ezone.event_table (event_title,event_description,event_date) VALUES ('".$event_title."','".$event_description."','".$event_date."')";
			\DB::insert(\DB::raw($sql_insert_event));		

			return redirect('view_event');




	}		

	public function insert_department(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$deptName = Request::get('deptName');
		$deptName = addslashes($deptName);

		$sql_department_check_active = "SELECT dept_name FROM hr_tool_ezone.department_table WHERE dept_name='$deptName' AND dept_status='Active'";

		$sql_department_check_active_list =  \DB::select(\DB::raw($sql_department_check_active));



		if($sql_department_check_active_list){

				$errorMsg = 'Department Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}


		$sql_insert_department = "INSERT INTO hr_tool_ezone.department_table (dept_name,dept_status) VALUES ('".$deptName."','Active')";
		\DB::insert(\DB::raw($sql_insert_department));

		return direct('view_department');

	}

	public function insert_designation(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$designationName = Request::get('designationName');
		$designationName = addslashes($designationName);

		$sql_designation_check_active = "SELECT designation_name FROM hr_tool_ezone.designation_table WHERE designation_name='$designationName' AND designation_status='Active'";

		$sql_designation_check_active_list =  \DB::select(\DB::raw($sql_designation_check_active));



		if($sql_designation_check_active_list){

				$errorMsg = 'Designation Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}


		$sql_insert_designation = "INSERT INTO hr_tool_ezone.designation_table (designation_name,designation_status) VALUES ('".$designationName."','Active')";
		\DB::insert(\DB::raw($sql_insert_designation));

		$sql_designation = "SELECT DISTINCT designation_name FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		return view('HR_views.view_designation',compact('designation_lists'));
	}

	public function insert_division(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$divisionName = Request::get('divisionName');
		$divisionName = addslashes($divisionName);

		$sql_division_check_active = "SELECT division_name FROM hr_tool_ezone.division_table WHERE division_name='$divisionName' AND division_status='Active'";

		$sql_division_check_active_list =  \DB::select(\DB::raw($sql_division_check_active));



		if($sql_division_check_active_list){

				$errorMsg = 'Division Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}


		$sql_insert_division = "INSERT INTO hr_tool_ezone.division_table (division_name,division_status) VALUES ('".$divisionName."','Active')";
		\DB::insert(\DB::raw($sql_insert_division));

		$sql_division = "SELECT DISTINCT division_name FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		return view('HR_views.view_division',compact('division_lists'));
	}


	public function insert_section(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$sectionName = Request::get('sectionName');
		$sectionName = addslashes($sectionName);

		$sql_section_check_active = "SELECT section_name FROM hr_tool_ezone.section_table WHERE section_name='$sectionName' AND section_status='Active'";

		$sql_section_check_active_list =  \DB::select(\DB::raw($sql_section_check_active));



		if($sql_section_check_active_list){

				$errorMsg = 'Section Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

		

		$sql_insert_section = "INSERT INTO hr_tool_ezone.section_table (section_name,section_status) VALUES ('".$sectionName."','Active')";
		\DB::insert(\DB::raw($sql_insert_section));

		$sql_section = "SELECT DISTINCT section_name FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		return view('HR_views.view_section',compact('section_lists'));
	}

	public function insert_supervisor(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$supervisorName = Request::get('supervisorName');
		$supervisorName = addslashes($supervisorName);

		$sql_supervisor_check_active = "SELECT supervisor_name FROM hr_tool_ezone.supervisor_table WHERE supervisor_name='$supervisorName' AND supervisor_status='Active'";

		$sql_supervisor_check_active_list =  \DB::select(\DB::raw($sql_supervisor_check_active));



		if($sql_supervisor_check_active_list){

				$errorMsg = 'Supervisor Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

		

		$sql_insert_supervisor = "INSERT INTO hr_tool_ezone.supervisor_table (supervisor_name,supervisor_status) VALUES ('".$supervisorName."','Active')";
		\DB::insert(\DB::raw($sql_insert_supervisor));

		$sql_supervisor = "SELECT DISTINCT supervisor_name FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		return view('HR_views.view_supervisor',compact('supervisor_lists'));
	}

	public function insert_job_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$jobLocationName = Request::get('jobLocationName');
		$jobLocationName = addslashes($jobLocationName);

		$sql_job_location_check_active = "SELECT job_location_name FROM hr_tool_ezone.job_location_table WHERE job_location_name='$jobLocationName' AND job_location_status='Active'";

		$sql_job_location_check_active_list =  \DB::select(\DB::raw($sql_job_location_check_active));



		if($sql_job_location_check_active_list){

				$errorMsg = 'Job Location Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

		

		$sql_insert_job_location = "INSERT INTO hr_tool_ezone.job_location_table (job_location_name,job_location_status) VALUES ('".$jobLocationName."','Active')";
		\DB::insert(\DB::raw($sql_insert_job_location));

		$sql_job_location = "SELECT DISTINCT job_location_name FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		return view('HR_views.view_job_location',compact('job_location_lists'));
	}


	public function insert_office_location(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$officeLocationName = Request::get('officeLocationName');
		$officeLocationName = addslashes($officeLocationName);

		$sql_office_location_check_active = "SELECT office_location_name FROM hr_tool_ezone.office_location_table WHERE office_location_name='$officeLocationName' AND office_location_status='Active'";

		$sql_office_location_check_active_list =  \DB::select(\DB::raw($sql_office_location_check_active));



		if($sql_office_location_check_active_list){

				$errorMsg = 'Office Location Already Exists';

				return view('HR_views.error',compact('errorMsg'));
		}

		

		$sql_insert_office_location = "INSERT INTO hr_tool_ezone.office_location_table (office_location_name,office_location_status) VALUES ('".$officeLocationName."','Active')";
		\DB::insert(\DB::raw($sql_insert_office_location));

		$sql_office_location = "SELECT DISTINCT office_location_name FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		return view('HR_views.view_office_location',compact('office_location_lists'));
	}




	public function view_employee_details(){
		
		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}


		$empId = Request::get('empId');

		$sql_employee = "SELECT  * FROM hr_tool_ezone.employee_table WHERE employee_row_id='$empId'";
		$employee_lists =  \DB::select(\DB::raw($sql_employee));

		foreach($employee_lists as $employee_list){

			$employeeRowId = $employee_list->employee_row_id;
			$hrId = $employee_list->hr_id;
			$name = $employee_list->name;
			$designation = $employee_list->designation;
			$joiningDate = $employee_list->joining_date;
			$division = $employee_list->division;
			$department = $employee_list->department;
			$section = $employee_list->section;
			$gender = $employee_list->gender;
			$email = $employee_list->email;
			$phone = $employee_list->phone;
			$blood_group = $employee_list->blood_group;
			$marital_status = $employee_list->marital_status;
			$job_location = $employee_list->job_location;
			$office_location = $employee_list->office_location;
			$supervisor_name = $employee_list->supervisor_name;
			$date_of_birth = $employee_list->date_of_birth;
			$religion = $employee_list->religion;
			$emergency_contact_name = $employee_list->emergency_contact_name;
			$emergency_contact_phone = $employee_list->emergency_contact_phone;
			$relation = $employee_list->relation;
			$home_district = $employee_list->home_district;
			$present_address = $employee_list->present_address;
			$permanent_address = $employee_list->permanent_address;
			$imagePath=$employee_list->image_path;
			
			
			

		}

		
		return view('HR_views.view_employee',compact('employeeRowId','hrId','name','email','phone','designation','department','joiningDate','division','section','gender','blood_group','marital_status','job_location','office_location','supervisor_name','date_of_birth','religion','emergency_contact_name','emergency_contact_phone','relation','home_district','present_address','permanent_address','imagePath'));

		

	}

	public function search_employee(){

		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		$sql_department = "SELECT * FROM hr_tool_ezone.department_table WHERE dept_status='Active' ORDER BY dept_name";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		$sql_designation = "SELECT * FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		$sql_division = "SELECT * FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		$sql_job_location = "SELECT * FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		$sql_office_location = "SELECT * FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		$sql_section = "SELECT * FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		$sql_supervisor = "SELECT * FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		$search_results = \DB::select(\DB::raw("SELECT * FROM hr_tool_ezone.employee_table where employee_row_id='0'"));

		$hrId = '';
		$name = '';
		$designation = '';
		$joining_date = '';
		$division = '';
		$department = '';
		$section = '';
		$gender = '';
		$email = '';
		$phone = '';
		$blood_group = '';
		$marital_status = '';
		$job_location = '';
		$office_location = '';
		$supervisor_name = '';
		$date_of_birth = '';
		$religion = '';
		$emergency_contact_name = '';
		$emergency_contact_phone = '';
		$relation = '';
		$home_district = '';
		$present_address = '';
		$permanent_address = '';

		return view('HR_views.search_employee',compact('department_lists','designation_lists','division_lists','job_location_lists','office_location_lists','section_lists','supervisor_lists','search_results','hrId','name','designation','joining_date','division','department','section','gender','email','phone','blood_group','marital_status','job_location','office_location','supervisor_name','date_of_birth','religion','emergency_contact_phone','emergency_contact_name','relation','home_district','present_address','permanent_address'));

	}

	public function search(){


		if(!isset($_SESSION['HR_USER_NAME'])){

				return redirect('/');
		}

		date_default_timezone_set('Asia/Dhaka');
		$hrId = Request::get('hrId');
		$name = Request::get('name');
		$designation = Request::get('designation');
		
		$joining_date = Request::get('joining_date');
		$joining_date_to = Request::get('joining_date_to');
		$division = Request::get('division');
		$department = Request::get('department');
		
		$section = Request::get('section');
		$gender = Request::get('gender');
		$email = Request::get('email');
		$phone = Request::get('phone');
		$blood_group = Request::get('blood_group');
		$marital_status = Request::get('marital_status');
		$job_location = Request::get('job_location');
		
		$office_location = Request::get('office_location');
		
		$supervisor_name = Request::get('supervisor_name');
		$date_of_birth = Request::get('date_of_birth');
		$religion = Request::get('religion');
		$emergency_contact_name = Request::get('emergency_contact_name');
		$emergency_contact_phone = Request::get('emergency_contact_phone');
		$relation = Request::get('relation');
		$home_district = Request::get('home_district');
		
		$present_address = Request::get('present_address');
		
		$permanent_address = Request::get('permanent_address');

		$formType = Request::get('se');
		

		$designation = addslashes($designation);
		$department = addslashes($department);
		$office_location = addslashes($office_location);
		$job_location = addslashes($job_location);
		$home_district = addslashes($home_district);
		$present_address = addslashes($present_address);
		$permanent_address = addslashes($permanent_address);

		// return $office_location;
		if($joining_date){

			$joining_date = date('Y-m-d', strtotime($joining_date));
		}
		if($joining_date_to){

			$joining_date_to = date('Y-m-d', strtotime($joining_date_to));
		}
		if($date_of_birth){

			$date_of_birth = date('Y-m-d', strtotime($date_of_birth));
		}

		$sql_search = 'SELECT * FROM hr_tool_ezone.employee_table where ';

		if($hrId != '')
		{
			$sql_search .= "hr_id LIKE '%".$hrId."%' AND ";
		}

		else
		{
			if($name !=''){
				$sql_search .= "name LIKE '%".$name."%' AND ";
			}
			if($designation !=''){
				$sql_search .= "designation = '$designation' AND ";
			}

			if($division !=''){
				$sql_search .= "division = '$division' AND ";
			}
			if($department !=''){
				$sql_search .= "department = '$department' AND ";
			}

			if($section !=''){
				$sql_search .= "section ='$section' AND ";
			}

			if($gender !=''){
				$sql_search .= "gender ='$gender' AND ";
			}
			if($email !=''){
				$sql_search .= "email LIKE '%".$email."%' AND ";
			}
			if($phone !=''){
				$sql_search .= "phone LIKE '%".$phone."%' AND ";
			}
			if($blood_group !=''){
				$sql_search .= "blood_group = '$blood_group' AND ";
			}
			if($marital_status !=''){
				$sql_search .= "marital_status LIKE '%".$marital_status."%' AND ";
			}
			if($job_location !=''){
				$sql_search .= "job_location LIKE '%".$job_location."%' AND ";
			}
			if($office_location !=''){
				$sql_search .= "office_location LIKE '%".$office_location."%' AND ";
			}

			if($supervisor_name !=''){
				$sql_search .= "supervisor_name LIKE '%".$supervisor_name."%' AND ";
			}
			if($date_of_birth !=''){
				$sql_search .= "date_of_birth LIKE '%".$date_of_birth."%' AND ";
			}
			if($religion !=''){
				$sql_search .= "religion LIKE '$religion' AND ";
			}
			if($emergency_contact_name !=''){
				$sql_search .= "emergency_contact_name LIKE '%".$emergency_contact_name."%' AND ";
			}
			if($emergency_contact_phone !=''){
				$sql_search .= "emergency_contact_phone LIKE '%".$emergency_contact_phone."%' AND ";
			}
			if($relation !=''){
				$sql_search .= "relation LIKE '%".$relation."%' AND ";
			}
			if($home_district !=''){
				$sql_search .= "home_district LIKE '%".$home_district."%' AND ";
			}
			if($present_address !=''){
				$sql_search .= "present_address LIKE '%".$present_address."%' AND ";
			}
			if($permanent_address !=''){
				$sql_search .= "permanent_address LIKE '%".$permanent_address."%' AND ";
			}
			if($joining_date !=''){
				$sql_search .= "joining_date BETWEEN '$joining_date' AND '$joining_date_to' AND ";
			}
		} 

		$sql_search .="status = 'Active' ORDER BY department,hr_id"; 

		$search_results = \DB::select(\DB::raw($sql_search));

		if($formType=="Search"){

		$sql_department = "SELECT * FROM hr_tool_ezone.department_table WHERE dept_status='Active' ORDER BY dept_name";
		$department_lists =  \DB::select(\DB::raw($sql_department));

		$sql_designation = "SELECT * FROM hr_tool_ezone.designation_table WHERE designation_status='Active' ORDER BY designation_name";
		$designation_lists =  \DB::select(\DB::raw($sql_designation));

		$sql_division = "SELECT * FROM hr_tool_ezone.division_table WHERE division_status='Active' ORDER BY division_name";
		$division_lists =  \DB::select(\DB::raw($sql_division));

		$sql_job_location = "SELECT * FROM hr_tool_ezone.job_location_table WHERE job_location_status='Active' ORDER BY job_location_name";
		$job_location_lists =  \DB::select(\DB::raw($sql_job_location));

		$sql_office_location = "SELECT * FROM hr_tool_ezone.office_location_table WHERE office_location_status='Active' ORDER BY office_location_name";
		$office_location_lists =  \DB::select(\DB::raw($sql_office_location));

		$sql_section = "SELECT * FROM hr_tool_ezone.section_table WHERE section_status='Active' ORDER BY section_name";
		$section_lists =  \DB::select(\DB::raw($sql_section));

		$sql_supervisor = "SELECT * FROM hr_tool_ezone.supervisor_table WHERE supervisor_status='Active' ORDER BY supervisor_name";
		$supervisor_lists =  \DB::select(\DB::raw($sql_supervisor));

		$designation = stripslashes($designation);
		$department = stripslashes($department);
		$office_location = stripslashes($office_location);
		$job_location = stripslashes($job_location);
		$home_district = stripslashes($home_district);
		$present_address = stripslashes($present_address);
		$permanent_address = stripslashes($permanent_address);

		
		
		return view('HR_views.search_employee',compact('department_lists','designation_lists','division_lists','job_location_lists','office_location_lists','section_lists','supervisor_lists','search_results','hrId','name','designation','joining_date','division','department','section','gender','email','phone','blood_group','marital_status','job_location','office_location','supervisor_name','date_of_birth','religion','emergency_contact_phone','emergency_contact_name','relation','home_district','present_address','permanent_address'));
		}

		if($formType=="Export"){

				$numrows = count($search_results);
				$headerArr = array('hr_id','name','designation','joining_date','division','department','section','gender','email','phone','blood_group','marital_status','job_location','office_location','supervisor_name','date_of_birth','religion','emergency_contact_phone','emergency_contact_name','relation','home_district','present_address','permanent_address','leaving_date');
				 // echo $numrows;
				$bigArr = array();

				array_push($bigArr, $headerArr);


				foreach ($search_results as $search_result) {
					
					$smallArr = array();
					
					array_push($smallArr, $search_result->hr_id);
					array_push($smallArr, $search_result->name);
					array_push($smallArr, $search_result->designation);

					$joining_date = $search_result->joining_date;
					if($joining_date!='0000-00-00'){
						$joining_date = date("d-m-Y", strtotime($joining_date));
					}
					array_push($smallArr, $joining_date);
					
					array_push($smallArr, $search_result->division);
					array_push($smallArr, $search_result->department);
					array_push($smallArr, $search_result->section);
					array_push($smallArr, $search_result->gender);
					array_push($smallArr, $search_result->email);
					array_push($smallArr, $search_result->phone);
					array_push($smallArr, $search_result->blood_group);
					array_push($smallArr, $search_result->marital_status);
					array_push($smallArr, $search_result->job_location);
					array_push($smallArr, $search_result->office_location);
					array_push($smallArr, $search_result->supervisor_name);


					$date_of_birth = $search_result->date_of_birth;
					if($date_of_birth!='0000-00-00'){
					$date_of_birth = date("d-m-Y", strtotime($date_of_birth));
					}
					array_push($smallArr, $date_of_birth);

					array_push($smallArr, $search_result->religion);
					array_push($smallArr, $search_result->emergency_contact_name);
					array_push($smallArr, $search_result->emergency_contact_phone);
					array_push($smallArr, $search_result->relation);
					array_push($smallArr, $search_result->home_district);
					array_push($smallArr, $search_result->present_address);
					array_push($smallArr, $search_result->permanent_address);



					$leaving_date = $search_result->leaving_date;
					if($leaving_date!='0000-00-00'){
					$leaving_date = date("d-m-Y", strtotime($leaving_date));
					}
					array_push($smallArr, $leaving_date);



					array_push($bigArr, $smallArr);


				}
				

				$export = fopen('../Uploaded_Files/export.csv','w');
		        foreach ($bigArr as $fields) {
		            fputcsv($export, $fields);
		        }
		        $path = '../Uploaded_Files/export.csv';
		        return response()->download($path);


			}

	}

	
	public function login_auth(){	

		

		$user_name = Request::get('user_name');
		$user_password = Request::get('user_password');

		$result_list =  \DB::select(\DB::raw("SELECT * FROM hr_tool_ezone.HR_user_table")); 

		foreach($result_list as $result)
		{
			if($result->user_name == $user_name)
			{
				
					if($result->user_password == $user_password)
					{

							$_SESSION['HR_USER_NAME'] = $user_name;								
						
							return redirect('home');
						
						
					}
					
				
			}
		}
		return redirect('login');

	}

	public function logout(){

		$_SESSION['HR_USER_NAME']=NULL;
		session_unset();

		return redirect('login');
	}
}

