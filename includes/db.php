<?php

	function Query($query, $variables=array(), $orderby=null, $format="ASC") {
		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
		if($variables) {
			$query = $query . " WHERE ";
			$currentVar = 1;
			foreach($variables as $key => $value) {
				$currentVar++;
				$query = $query . $key . " = '" . mysqli_real_escape_string($db, $value) . "'";
				if($currentVar <= sizeof($variables)) $query = $query . ' AND ';
			}
			if($orderby) $query = $query . " ORDER BY " . $orderby . " " . $format;
		}
		$resultsDB = $db->query($query);
		$resultsArray = array();
		while($resultsDB->num_rows > 0 && $row = $resultsDB->fetch_assoc()) {
			array_push($resultsArray, $row);
		}
		mysqli_close($db);
		return $resultsArray;
	}

	function Insert($table, $variables=array()) {
		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
		$query = "INSERT INTO " . $table . " (";
		$currentVar = 1;
		foreach($variables as $key => $value) {
			$currentVar++;
			$query = $query . $key;
			if($currentVar <= sizeof($variables)) $query = $query . ', ';
		}
		$currentVar = 1;
		$query = $query . ") VALUES (";
		foreach($variables as $key => $value) {
			$currentVar++;
			$query = $query . "'" . mysqli_real_escape_string($db, $value) . "'";
			if($currentVar <= sizeof($variables)) $query = $query . ', ';
		}
		$query = $query . ")";
		$results = $db->query($query);
		mysqli_close($db);
		return $results;
	}

	function Update($table, $where, $variables=array()) {
		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
		$query = "UPDATE " . $table . " SET ";
		$currentVar = 1;
		foreach($variables as $key => $value) {
			$currentVar++;
			$query = $query . $key . "='" . mysqli_real_escape_string($db, $value) . "'";
			if($currentVar <= sizeof($variables)) $query = $query . ', ';
		}
		$currentVar = 1;
		$query = $query . " WHERE ";
		foreach($where as $key => $value) {
			$currentVar++;
			$query = $query . $key . "='" . mysqli_real_escape_string($db, $value) . "'";
			if($currentVar <= sizeof($where)) $query = $query . ' AND ';
		}
		$results = $db->query($query);
		mysqli_close($db);
		return $results;
	}

	function Delete($table, $where) {
		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
		$currentVar = 1;
		$query = "DELETE FROM " . $table . " WHERE ";
		foreach($where as $key => $value) {
			$currentVar++;
			$query = $query . $key . "='" . mysqli_real_escape_string($db, $value) . "'";
			if($currentVar <= sizeof($where)) $query = $query . ', ';
		}
		$results = $db->query($query);
		mysqli_close($db);
		return $results;
	}
?>