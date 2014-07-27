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
?>