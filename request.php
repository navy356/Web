<?php
	require_once "pdo.php";
	//session_start();
	//if (! isset($_SESSION['name']))
	//{
	//	die('Not logged in');
	//}
	if (! isset($_REQUEST['filename'] ) || $_REQUEST['filename'] === "")
		die();
	$stmt = $pdo->prepare("SELECT file_id FROM Files WHERE file_name=:name");
	$stmt->execute(array(":name" => $_REQUEST['filename']));
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows as $row)
	{
		$file_id=$row['file_id'];
	}
	if ($rows !== false)
	{
		$stmt = $pdo->prepare("SELECT file_name, file_owner, group_owner, permissions FROM Files WHERE parent_id=:id");
		$stmt->execute(array(":id" => $file_id));
		$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$json_result = json_encode($files);
		echo $json_result;
	}
	die();
?>
