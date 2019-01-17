<?php

	$servername = "localhost";
	$username = "justice19_us3r";
	$password = "Zq54dh5OeYVM9lgQ";
	$dbname = "justice19";
	$con = mysqli_connect($servername, $username, $password, $dbname);

  	$sql = "SELECT * FROM `sessions`";
	$result = mysqli_query($con, $sql);

    $sessions = array();
    while($row = mysqli_fetch_assoc($result)) {
        $sessions[$row["id"].'-'.$row["block"]] = $row;
    }

    echo json_encode($sessions);

	$con->close();
	
?>