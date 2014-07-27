<?php
	$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	$query = "SELECT * FROM blog";
	$result = $db->query($query);
	$posts = array();
	if($result->num_rows > 0) {
		$i = 0;
		while($row = $result->fetch_assoc()) {
			$posts[$i] = $row;
			$i++;
		}
	}
	mysqli_close($db);
?>