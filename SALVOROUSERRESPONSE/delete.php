<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getUserByjobid = getUserByjobid($pdo, $_GET['jobid']); ?>
	<div class="container" style="border-style: solid; border-color: red; background-color: #ffcbd1;height: 500px;">
		<h2>First Name: <?php echo $getUserByjobid['firstname']; ?></h2>
		<h2>Last Name: <?php echo $getUserByjobid['lastname']; ?></h2>
		<h2>Email: <?php echo $getUserByjobid['email']; ?></h2>
		<h2>Gender: <?php echo $getUserByjobid['gender']; ?></h2>
		<h2>Age: <?php echo $getUserByjobid['age']; ?></h2>
		<h2>Type of Job: <?php echo $getUserByjobid['typeofjob']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleforms.php?jobid=<?php echo $_GET['jobid']; ?>" method="POST">
				<input type="submit" name="deleteUserBtn" value="Delete" style="background-color: #f69697; border-style: solid;">
			</form>			
		</div>	

	</div>
</body>
</html>