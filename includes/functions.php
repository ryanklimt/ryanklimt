<?php

	function NumBlogPosts() {
		return sizeof(Query("SELECT id FROM blog"));
	}

	function GetBlogPosts($page, $perPage) {
		$start = ($page * $perPage) - $perPage;
		$resultsArray = Query("SELECT * FROM blog ORDER BY date_posted DESC LIMIT " . $start . ", " . $perPage);
		$postArray = array();
		foreach($resultsArray as $result) {
			array_push($postArray, $result);
		}
		return $postArray;
	}
	
	function GetBlogPost($url) {
		$resultsArray = Query("SELECT * FROM blog", array('url' => $url));
		$postArray = array();
		if($resultsArray && isset($resultsArray[0])) {
		    $postArray = $resultsArray[0];
		}
		return $postArray;
	}

	function CreateBlogPost($title, $content) {
	    $url = strtolower($title);
	    $url = str_replace(' ','-',$url);
	    $url = preg_replace("/[^a-z-]/i", "", $url);
		return Insert("blog", array('title' => $title, 'content' => $content, 'url' => $url));
	}

	function DeleteBlogPost($id) {
		return Delete("blog", array('id' => $id));
	}

	function Login($email, $password) {
		$resultsArray = Query("SELECT * FROM user", array('email' => $email, 'password' => sha1(md5($password))));
		if($account = $resultsArray[0]) {
			$newSession = sha1(md5(uniqid($email,true)));
			Update('user', array('id' => $account['id']), array('session' => $newSession));
			$user = array(
				'id'		=> $account['id'],
				'username'	=> $account['username'],
				'fname'		=> $account['fname'],
				'lname'		=> $account['lname'],
				'email'		=> $account['email'],
				'session'	=> $newSession,
			);
			return $_SESSION['user'] = $user;
		}
	}

	function IsLoggedIn() {
		if(isset($_SESSION['user']['session'])) {
			$resultsArray = Query("SELECT id FROM user", array('session' => $_SESSION['user']['session']));
			if($resultsArray[0]['id'] == $_SESSION['user']['id']) {
				return true;
			}
		}
		unset($_SESSION['user']);
		return false;
	}

	function GetUserId() {
		if(IsLoggedIn()) return $_SESSION['user']['id'];
	}

	function LogOut() {
		unset($_SESSION['user']);
		return !GetUserId();
	}

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