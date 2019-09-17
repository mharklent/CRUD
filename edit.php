<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$age=$_POST['age'];
	$email=$_POST['email'];	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE users SET name=:name, age=:age, email=:email WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':email', $email);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $row['name'];
	$age = $row['age'];
	$email = $row['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>fname</td>
				<td><input type="text" name="name" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>lname</td>
				<td><input type="text" name="age" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>gender</td>
				<td><input type="text" name="email" value="<?php echo $gender;?>"></td>
			</tr>
			<tr> 
				<td>birthdate</td>
				<td><input type="text" name="name" value="<?php echo $birthdate;?>"></td>
			</tr>
			<tr> 
				<td>address</td>
				<td><input type="text" name="age" value="<?php echo $address;?>"></td>
			</tr>
			<tr> 
				<td>contact</td>
				<td><input type="text" name="email" value="<?php echo $contact;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
		<table border="0">
			<tr> 
				<td>classcode</td>
				<td><input type="text" name="name" value="<?php echo $classcode;?>"></td>
			</tr>
			<tr> 
				<td>studentid</td>
				<td><input type="text" name="age" value="<?php echo $studentid;?>"></td>
			</tr>
			<tr> 
				<td>subjectcode</td>
				<td><input type="text" name="email" value="<?php echo $subjectcode;?>"></td>
			</tr>
			<tr> 
				<td>time</td>
				<td><input type="text" name="age" value="<?php echo $time;?>"></td>
			</tr>
			<tr> 
				<td>teacher</td>
				<td><input type="text" name="email" value="<?php echo $teacher;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
