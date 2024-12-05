<?php  

require_once 'dbConfig.php';

function getAllUsers($pdo) {
	$sql = "SELECT * FROM users 
			ORDER BY firstname ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}   

function getUserByjobid($pdo, $jobid) {
	$sql = "SELECT * from users WHERE jobid = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$jobid]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAUser($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM users WHERE 
			CONCAT(firstname,lastname,email,gender,
				age,typeofjob,date_added) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function insertNewUser($pdo, $firstname, $lastname, $email, 
	$gender, $age, $typeofjob) {

	$sql = "INSERT INTO users 
			(
				firstname,
				lastname,
				email,
				gender,
				age,
				typeofjob
			)
			VALUES (?,?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([
		$firstname, $lastname, $email, 
		$gender, $age, $typeofjob,
	]);

	if ($executeQuery) {
		return true;
	}

}

function editUser($pdo, $firstname, $lastname, $email, $gender, 
	$age, $typeofjob, $jobid) {

	$sql = "UPDATE users
				SET firstname = ?,
					lastname = ?,
					email = ?,
					gender = ?,
					age = ?,
					typeofjob = ?
				WHERE jobid = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstname, $lastname, $email, $gender, 
		$age, $typeofjob,$jobid]);

	if ($executeQuery) {
		return true;
	}

}


function deleteUser($pdo, $jobid) {
	$sql = "DELETE FROM users 
			WHERE jobid = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$jobid]);

	if ($executeQuery) {
		return true;
	}
}




?>