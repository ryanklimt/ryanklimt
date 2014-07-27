<?php
	function format_date($str) {
		$month = array(" ", "Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec");
		$y = explode(' ', $str);
		$x = explode('-', $y[0]);
		$m = (int)$x[1];
		$m = $month[$m];
		$date = $x[2][0] == "0" ? $x[2][1] : $x[2];
		return $date . ' ' . $m . ' ' . $x[0];
	}
	function numBlogPosts() {
		$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$query = "SELECT id FROM blog";
		$result = $db->query($query);
		return $result->num_rows;
	}
	function getBlogPosts($page, $perPage) {
		$start = ($page * $perPage) - $perPage;
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
		return $posts;
	}
?>