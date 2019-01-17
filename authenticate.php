<?php

	$servername = "localhost";
	$username = "justice19_us3r";
	$password = "Zq54dh5OeYVM9lgQ";
	$dbname = "justice19";

	$con = mysqli_connect($servername, $username, $password, $dbname);

	$studentid = $_GET['studentid'];
	$studentemail = $_GET['studentemail'];

	if ($studentid == "216397") {
		header("Location: login.php"); 			
		die();
	}
	
	$studentid = mysqli_real_escape_string($con, $studentid);
	$studentemail = mysqli_real_escape_string($con, $studentemail);

  	$sql = "SELECT * FROM `users` WHERE `id` = '$studentid' AND `email` = '$studentemail'";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        setCookie("justicesummit_studentid", $row["id"], time() + 86400);
        setCookie("justicesummit_studentemail", $row["email"], time() + 86400);
        setCookie("justicesummit_studentfirst", $row["firstname"], time() + 86400);
        setCookie("justicesummit_studentlast", $row["lastname"], time() + 86400);
        setCookie("justicesummit_studentgrade", $row["grade"], time() + 86400);
        header("Location: indexNonViewOnly.php");
        die();
    } else {
        header("Location: login.php?state=2");  
        die(); 
    }     

	$con->close();
	
?>
