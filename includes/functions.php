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
	function query($query) {
		$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$results = $db->query($query);
		mysqli_close($db);
		return $results;
	}
	function numBlogPosts() {
		$result = query("SELECT id FROM blog");
		return $result->num_rows;
	}
	function getBlogPosts($page, $perPage) {
		$start = ($page * $perPage) - $perPage;
		$result = query("SELECT * FROM blog LIMIT ".$start.", ".$perPage);
		$posts = array();
		while($result->num_rows > 0 && $posts[$i] = $result->fetch_assoc()) {
			$i++;
		}
		return $posts;
	}
?>