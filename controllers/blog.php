<?php
	$start = 0;
	$perPage = 3;
	if(isset($_params[0]) && is_numeric($_params[0])) $start = ($_params[0] * $perPage) - $perPage;
	$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	$query = "SELECT * FROM blog LIMIT ".$start.", ".$perPage;
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