<?php
include 'userauthentication.php';

extract ($_POST);
$conn = mysqli_connect("localhost","root","","finaldb");
$functionName=$_GET['functionName'];
if($functionName == 'NumberOfCoursesEnrolledIn'){
	$student_id=$_GET['student_id'];
	$nbOfRecords=NumberOfCoursesEnrolledIn($student_id,$conn);
	echo $nbOfRecords;
}
else if($functionName == 'NumberOfCourses'){
	$nbOfRecords=NumberOfCourses($conn);
	echo $nbOfRecords;
}
else if($functionName == 'DisplayCourses'){
	$return_arr = array();
	$student_id=$_GET['student_id'];
	$return_arr=DisplayCourses($conn,$student_id);
	echo json_encode($return_arr);
}
else if($functionName == 'TopSixCourses'){
	$return_arr = array();
	$return_arr=TopSixCourses($conn);
	echo json_encode($return_arr);
}
else if($functionName == 'EnrollInCourse'){
	$student_id=$_GET['student_id'];
	$course_id=$_GET['course_id'];

	EnrollInCourse($conn,$course_id,$student_id);
}
else if($functionName == "EnrolledCourses"){
	$return_arr = array();
	$student_id=$_GET['student_id'];
	$return_arr = EnrolledCourses($conn,$student_id);
	echo json_encode($return_arr);

}
else if($functionName == "CourseLectures"){
	$return_arr = array();
	$course_id=$_GET['course_id'];
	$return_arr = CourseLectures($conn,$course_id);
	echo json_encode($return_arr);

}

function NumberOfCoursesEnrolledIn($student_id,$conn){
	$nbOfRecords=0;
	
	$result = mysqli_query($conn, "select COUNT(student_id) from course_enroll where student_id='$student_id'");
	 while ($row = mysqli_fetch_row($result)) {
   	$nbOfRecords=$row[0];
  }
  return $nbOfRecords;
	
}

function NumberOfCourses($conn){
	$nbOfRecords=0;
	
	$result = mysqli_query($conn, "SELECT COUNT(name)FROM courses");
	 while ($row = mysqli_fetch_row($result)) {
   	$nbOfRecords=$row[0];
  }
  return $nbOfRecords;
	
}

function DisplayCourses($conn,$student_id){
$return_arr = array();
$query="select * from courses as s left join (select IFNULL(count(ce.id),0) as enroll,ce.course_id  from course_enroll as ce where ce.student_id='$student_id') as ce on s.id=IFNULL(ce.course_id,s.id)";
	$result = mysqli_query($conn, $query);
	 while ($row = mysqli_fetch_row($result)) {
   	$course_id=$row[0];
	$name=$row[1];
   	$title=$row[2];
   	$start_date=$row[3];
   	$end_date=$row[4];
   	$author_name=$row[5];
   	$cost=$row[6];
   	$language=$row[7];
	$enroll=$row[8];
	$return_arr[] = array("course_id" => $course_id,
                    "name" => $name,
					"title"=>$title,
					"start_date" => $start_date,
                    "end_date" => $end_date,
					"author_name"=>$author_name,
					"cost" => $cost,
                    "language" => $language,		
					"enroll"=>$enroll
					);

  }
	return $return_arr;	    

}
function EnrollInCourse($conn,$course_id,$student_id){
                
      $query = "insert into course_enroll (course_id,student_id)
		values('$course_id','$student_id')";
     mysqli_query($conn, $query);
		$_SESSION['id']=$id;
		$_SESSION['message'] = 'Course Added Successfully';
		 	
}
function TopSixCourses($conn){
$return_arr = array();
$query="select course_id,c.name,c.title,c.author_name,c.cost,c.language,count(c.id) as num from course_enroll ce join courses c on c.id=ce.course_id group by c.id order by num DESC limit 6"; 
$result = mysqli_query($conn, $query);
	 while ($row = mysqli_fetch_row($result)) {
   	$course_id=$row[0];
	$name=$row[1];
   	$title=$row[2];
   	$author_name=$row[3];
   	$cost=$row[4];
   	$language=$row[5];
	$numberOfEnrolledStudents=$row[6];
	$return_arr[] = array("course_id" => $course_id,
                    "name" => $name,
					"title"=>$title,
					"author_name"=>$author_name,
					"cost" => $cost,
                    "language" => $language,		
					"numberOfEnrolledStudents"=>$numberOfEnrolledStudents
					);

  }
	return $return_arr;	    
}

function EnrolledCourses($conn,$student_id){
$return_arr = array();
$query="select * from courses c join course_enroll ce on c.id=ce.course_id where ce.student_id='$student_id'";
$result = mysqli_query($conn, $query);
	 while ($row = mysqli_fetch_row($result)) {
   	$course_id=$row[0];
	$name=$row[1];
   	$title=$row[2];
   	$start_date=$row[3];
   	$end_date=$row[4];
   	$author_name=$row[5];
   	$cost=$row[6];
   	$language=$row[7];
	$return_arr[] = array("course_id" => $course_id,
                    "name" => $name,
					"title"=>$title,
					"start_date" => $start_date,
                    "end_date" => $end_date,
					"author_name"=>$author_name,
					"cost" => $cost,
                    "language" => $language,		
					);

  }
	return $return_arr;	    
}
function CourseLectures($conn,$course_id){
$return_arr = array();
$query="select *,ifnull(e.exam_id,0) as num from courses_lectures cl left join exams e on e.lecture_id=cl.id where course_id='$course_id'";
$result = mysqli_query($conn, $query);
	 while ($row = mysqli_fetch_row($result)) {
		$lecture_id=$row[5];
		$lecture_title=$row[1];
	$lecture_file=$row[3];
   	$lecture_exam=$row[6];
	$return_arr[] = array(
					"lecture_id" => $lecture_id,
					"lecture_title" => $lecture_title,
                    "lecture_file" => $lecture_file,
					"lecture_exam"=>$lecture_exam	
					);

  }
	return $return_arr;	    

}

?>