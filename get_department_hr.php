<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','hr_tool_ezone');
 
$con = mysqli_connect(HOST,USER,PASS,DB);

// $sql = "SELECT DISTINCT dept_id, dept from address_info_table";
 
// $res = mysqli_query($con,$sql);
 
// $result = array();
 
// while($row = mysqli_fetch_array($res)){
// array_push($result,
// array('dept_id'=>$row[0],
// 'dept'=>$row[1]
// ));
// }

// echo json_encode(array("departments"=>$result));  

$sql = "SELECT * from employee_table WHERE status='Active' ORDER BY hr_id ";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('employee_row_id'=>$row[0],
'hr_id'=>$row[1],
'name'=>$row[2],
'designation'=>$row[3],
'joining_date'=>$row[4],
'division'=>$row[5],
'department'=>$row[6],
'section'=>$row[7],
'gender'=>$row[8],
'email'=>$row[9],
'phone'=>$row[10],
'blood_group'=>$row[11],
'marital_status'=>$row[12],
'job_location'=>$row[13],
'office_location'=>$row[14],
'supervisor_name'=>$row[15],
'date_of_birth'=>$row[16],
'religion'=>$row[17],
'emergency_contact_name'=>$row[18],
'emergency_contact_phone'=>$row[19],
'relation'=>$row[20],
'home_district'=>$row[21],
'present_address'=>$row[22],
'permanent_address'=>$row[23],
'leaving_date'=>$row[24]
));
}
 

echo json_encode(array("department_details_hr"=>$result));
 

 
mysqli_close($con);
 
?>