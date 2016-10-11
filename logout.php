<?php

	echo "Logged out scuccessfully";
    
    session_start();
	session_destroy();
	header("location:login.php");
?>