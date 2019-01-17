<?php

	$data = "218017,218046,218071,218073,218080,218085,218095,218123,218129,218131,218145,218150,218168,218200,218206,218207,218208,218209,218238,218247,218254,218305,218340,218357,218371,218406,218410,218426,218434,219002,219011,219030,219038,219054,219056,219057,219066,219074,219079,219100,219128,219147,219149,219154,219189,219273,219282,219283,219289,219303,219305,219312,219319,219329,219336,219361,219375,219388,219400,219442,219999,220007,220013,220027,220044,220055,220069,220080,220111,220123,220127,220135,220136,220137,220139,220142,220143,220169,220174,220202,220204,220207,220211,220225,220257,220286,220292,220299,220311,220318,220333,220347,220350,220352,220360,220367,220391,220393,220396,220407,220409,220412,221010,221021,221022,221023,221027,221031,221033,221043,221047,221049,221051,221056,221074,221084,221113,221115,221124,221132,221136,221144,221150,221151,221157,221168,221172,221184,221186,221192,221199,221204,221226,221228,221239,221256,221261,221276,221282,221284,221299,221322,221327,221378,221384,221385,221396,221399,221401,221403,221413,221422";

	$affected_students = explode(",", $data);

	$twentyeight = 1;
	$thirtyone = 1;
	$sixtyfour = 3;
	$fiftytwo = 3;

	$x02 = array();
	$x25 = array();
	
	//$x64 = array();
	//$x52 = array();
	//$xspecial = array();

	for ($x = 0; $x < 100; $x++) {
		$x02[] = "2018024-1";
		$x02[] = "2018024-2";
	}

	for ($x = 0; $x < 100; $x++) {
		$x25[] = "2018002-1";
		$x25[] = "2018002-2";
	}

	/*
	for ($x = 0; $x < 100; $x++) {
		$x64[] = "2016052-3";
		$x64[] = "2016052-4";
	}

	for ($x = 0; $x < 100; $x++) {
		$x52[] = "2016064-3";
		$x52[] = "2016064-4";
	}	
	*/

	// for ($x = 0; $x < 23; $x++) {
	// 	$xspecial[] = "2016088-3";
	// 	$xspecial[] = "2016088-4";
	// }		

	foreach ($affected_students as $user) {

		$schedule = json_decode(file_get_contents("http://times.bcp.org/justice/userSessions.php?studentid=$user"), true);

		$session1 = $schedule[1]["id"];
		$session2 = $schedule[2]["id"];
		$session3 = $schedule[3]["id"];
		$session4 = $schedule[4]["id"];

		echo($session1 . "<br />");
		echo($session2 . "<br />");
		echo($session3 . "<br />");
		echo($session4 . "<br />");

		if (($session1 == $session2) && ($session2 == "2018002")) {
			$session = array_pop($x02);
			echo($session . "<br /><br />");
			$attempt = file_get_contents("http://times.bcp.org/justice/register.php?studentid=$user&sessionid=$session");
			$response = json_decode($attempt);
			if ($response[0] = "success") {
				echo("User $user successfully registered for $session: " . $response[1]) . "<br />";
			} else {
				die("Error. Tried user $user. Response was: " . $response[0] . " - " . $response[1]);
			}		
		} else if (($session1 == $session2) && ($session2 == "2018024")) {
			$session = array_pop($x25);
			echo($session . "<br /><br />");
			$attempt = file_get_contents("http://times.bcp.org/justice/register.php?studentid=$user&sessionid=$session");
			$response = json_decode($attempt);
			if ($response[0] = "success") {
				echo("User $user successfully registered for $session: " . $response[1]) . "<br />";
			} else {
				die("Error. Tried user $user. Response was: " . $response[0] . " - " . $response[1]);
			}		
		}

		/**
		if (($session3 == $session4) && ($session4 == "2016064")) {
			// if (empty($xspecial)) {
				$session = array_pop($x64);
			// } else {
				// $session = array_pop($xspecial);
			// }
			echo($session . "<br /><br />");
			$attempt = file_get_contents("http://times.bcp.org/justice/register.php?studentid=$user&sessionid=$session");
			$response = json_decode($attempt);
			if ($response[0] = "success") {
				echo("User $user successfully registered for $session: " . $response[1]) . "<br />";
			} else {
				die("Error. Tried user $user. Response was: " . $response[0] . " - " . $response[1]);
			}		
		} else if (($session3 == $session4) && ($session4 == "2016052")) {
			// if (empty($xspecial)) {
				$session = array_pop($x52);
			// } else {
				// $session = array_pop($xspecial);
			// }
			echo($session . "<br /><br />");
			$attempt = file_get_contents("http://times.bcp.org/justice/register.php?studentid=$user&sessionid=$session");
			$response = json_decode($attempt);
			if ($response[0] = "success") {
				echo("User $user successfully registered for $session: " . $response[1]) . "<br />";
			} else {
				die("Error. Tried user $user. Response was: " . $response[0] . " - " . $response[1]);
			}	
		}
		*/

		echo("<br /><br />");

	}
?>