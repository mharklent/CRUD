<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];

	// checking empty fields
	if(empty($fname) || empty($lname) || empty($gender) || empty($birthdate) || empty($address) || empty($contact)) {
				
		if(empty($fname)) {
			echo "<font color='red'>fname field is empty.</font><br/>";
		}
		
		if(empty($lname)) {
			echo "<font color='red'>lname field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
		if(empty($birthdate)) {
			echo "<font color='red'>birthdate field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>address field is empty.</font><br/>";
		}
		
		if(empty($contact)) {
			echo "<font color='red'>contact field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(fname, lname, gender, birthdate, address, contact) VALUES(:fname, :lname, :gender, :birthdate, :address, :contact)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':fname', $fname);
		$query->bindparam(':lname', $lname);
		$query->bindparam(':gender', $gender);
		$query->bindparam(':birthdate', $birthdate);
		$query->bindparam(':address', $address);
		$query->bindparam(':contact', $contact);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
if(isset($_POST['Submit'])) {	
	$classcode = $_POST['classcode'];
	$studentid = $_POST['studentid'];
	$subjectcode = $_POST['subjectcode'];
	$time = $_POST['time'];
	$teacher = $_POST['teacher'];
		
	// checking empty fields
	if(empty($classcode) || empty($studentid) || empty($subjectcode) empty($time) || empty($teacher)) {
				
		if(empty($classcode)) {
			echo "<font color='red'>classcode field is empty.</font><br/>";
		}
		
		if(empty($studentid)) {
			echo "<font color='red'>studentid field is empty.</font><br/>";
		}
		
		if(empty($subjectcode)) {
			echo "<font color='red'>subjectcode field is empty.</font><br/>";
		}
		if(empty($time)) {
			echo "<font color='red'>time field is empty.</font><br/>";
		}
		
		if(empty($teacher)) {
			echo "<font color='red'>teacher field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(classcode, studentid, subjectcode, time, teacher) VALUES(:classcode, :studentid, :subjectcode, :time, :teacher)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':classcode', $classcode);
		$query->bindparam(':studentid', $studentid);
		$query->bindparam(':subjectcode', $subjectcode);
		$query->bindparam(':time', $time);
		$query->bindparam(':teacher', $teacher);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
