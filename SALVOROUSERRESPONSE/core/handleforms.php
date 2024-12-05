<?php  

require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['insertUserBtn'])) {
	$insertUser = insertNewUser($pdo,$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['gender'], $_POST['age'], $_POST['typeofjob'],);

	if ($insertUser) {
		$_SESSION['message'] = "Successfully inserted!";
		header("Location: ../index.php");
	}
}


if (isset($_POST['editUserBtn'])) {
	$editUser = editUser($pdo,$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['gender'], $_POST['age'], $_POST['typeofjob'], $_GET['jobid']);

	if ($editUser) {
		$_SESSION['message'] = "Successfully edited!";
		header("Location: ../index.php");
	}
}

if (isset($_POST['deleteUserBtn'])) {
	$deleteUser = deleteUser($pdo,$_GET['jobid']);

	if ($deleteUser) {
		$_SESSION['message'] = "Successfully deleted!";
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
	foreach ($searchForAUser as $row) {
		echo "<tr> 
				<td>{$row['jobid']}</td>
				<td>{$row['firstname']}</td>
				<td>{$row['lastname']}</td>
				<td>{$row['email']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['age']}</td>
				<td>{$row['typeofjob']}</td>
			  </tr>";
	}
}

?>