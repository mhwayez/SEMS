<?php session_start(); ?>
<?php include('db/connect.php'); ?>

<?php
	// add user
	if(isset($_POST['add-user'])){
		$name=ucwords($_POST['name']);
		$email=strtolower($_POST['email']);
		$role=strtolower($_POST['role']);
		$username=$_POST['username'];
		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);

		$sql="INSERT INTO users(name, email, role, username, password, rememberToken) VALUES('{$name}', '{$email}', '{$role}', '{$username}', '{$password}', NULL)";
		$query=mysqli_query($connection, $sql);

		if($query)
			$_SESSION['success']="Query successful!";
		else
			$_SESSION['failure']="Query unsuccessful!";

		header('Location: users.php');
		exit();
	}

	// add event
	if(isset($_POST['add-event'])){
		ini_set('display_errors',1); 
error_reporting(E_ALL);

		$name=ucwords($_POST['name']);
		$organizerId=(int)$_POST['organizer'];
		$judgeId=(int)$_POST['judge'];
		$location=$_POST['location'];
		$startDate=date('Y-m-d', strtotime($_POST['startDate']));
		$endDate=date('Y-m-d', strtotime($_POST['endDate']));
		$entryFee=$_POST['entryFee'];

		$sql="INSERT INTO events(name, organizerId, judgeId, location, startDate, endDate, entryFee) VALUES('{$name}', '{$organizerId}', '{$judgeId}', '{$location}', '{$startDate}', '{$endDate}', '{$entryFee}')";
		$query=mysqli_query($connection, $sql);

		if($query)
			$_SESSION['success']="Query successful!";
		else
			$_SESSION['failure']="Query unsuccessful!";

		header('Location: events.php');
		exit();
	}
?>

<?php include('db/close.php'); ?>