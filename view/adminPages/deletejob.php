<?php
$pdo = new PDO('mysql:dbname=job;host=127.0.0.1', 'root', '' , [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$stmt = $pdo->prepare('DELETE FROM job WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: jobs.php');
}

