<?php require_once 'core/handleforms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getUserByjobid = getUserByjobid($pdo, $_GET['jobid']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleforms.php?jobid=<?php echo $_GET['jobid']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstname" value="<?php echo $getUserByjobid['firstname']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastname" value="<?php echo $getUserByjobid['lastname']; ?>">
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="text" name="email" value="<?php echo $getUserByjobid['email']; ?>">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender" value="<?php echo $getUserByjobid['gender']; ?>">
		</p>
		<p>
			<label for="firstName">Age</label> 
			<input type="text" name="age" value="<?php echo $getUserByjobid['age']; ?>">
		</p>
		<p>
			<label for="firstName">Type of job</label> 
			<input type="text" name="typeofjob" value="<?php echo $getUserByjobid['typeofjob']; ?>">
		</p>	
			<input type="submit" value="Save" name="editUserBtn">
		</p>
	</form>
</body>
</html>