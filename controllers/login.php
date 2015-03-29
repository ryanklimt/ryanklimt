<?php

	if(IsLoggedIn()) {
		header('Location: '.BASE_URL.'blog');
	}

?>