<?php
	// requiring the validation file
	require_once "../src/validation.php";

	// variable storage for testing

		// #1
			// array of valid passwords 
			$validPasswords = array(
				"Password1#",
				"321StreetSesame(",
				"555555P#",
				"Bottle5*",
				"£sampleStreet5"
			);
			// array of invalid passwords
			$invalidPasswords= array(
				"password",
				"password1",
				"1",
				"",
				"182765",
				"A#123456789101112131415161718192021222324252627282930"
			);

		// #2
			// array of valid IDs
			$validIDs = array(0,1,2,3,4,5,6,7,8,9,10);
			// array of invalid IDs
			$invalidIDs = array(-1,-2,-3,"","A",null,);

		// #3
			// array of valid card numbers
			$validCardNumbers = array(
			"0000 0000 0000 0000",
			"0123456789012345",
			"1111-1111-1111-1111"
			);
			// array of invalid card numbers
			$invalidCardNumbers = array(
			"-1111 1111 1111 111",
			"1",
			"A",
			null,
			"{}12 2345 6789 1010"
			);

		// #4
			// array of valid phone numbers
			$validPhoneNumbers = array(
			"+1-111-1111-1111",
			"+353-2-555-666",
			"+182-44-5566-666",
			"+12-445-555-6666",
			"+182-99-9999-9999"
			);
			// array of invalid phone numbers
			$invalidPhoneNumbers = array(
			"",
			"+A-111-1111-1111",
			"+3333-12-2222-2222",
			null,
			"-1-111-1111-1111"
			);

	// testing

		// #1
			// testing password verification
			echo "<h1>Password Verification</h1>";
			// testing valid passwords
			foreach ($validPasswords as $value) {
				echo nl2br("Input: ".$value."\n"."Result: ".passwordVerify($value)."\n\n");
			}
			// testing invalid passwords
			foreach ($invalidPasswords as $value) {
				echo nl2br("Input: ".$value."\n"."Result: ".passwordVerify($value)."\n\n");
			}

		// #2
			// testing ID verification
			echo "<h1>ID Verification</h1>";
			// testing valid IDs
			foreach ($validIDs as $id) {
				echo nl2br("Input: ".$id."\n"."Result: ".(verifyID($id) ? "true" : "false")."\n\n");
			}
			// testing invalid IDs
			foreach ($invalidIDs as $id) {
				echo nl2br("Input: ".$id."\n"."Result: ".(verifyID($id) ? "true" : "false")."\n\n");
			}

		// #3
			// testing card number verification
			echo "<h1>Card Number Verification</h1>";
			// testing valid card numbers
			foreach ($validCardNumbers as $id) {
				echo nl2br("Input: ".$id."\n"."Result: ".verifyCardNumber($id)."\n\n");
			}
			// testing invalid card numbers
			foreach ($invalidCardNumbers as $id) {
				echo nl2br("Input: ".$id."\n"."Result: ".verifyCardNumber($id)."\n\n");
			}

		// #4
			// testing phone number verification
			echo "<h1>Phone Number Verification</h1>";
			// testing valid phone numbers
			foreach ($validPhoneNumbers as $id) {
				echo nl2br("Input: ".$id."\n"."Result: ".verifyPhoneNumber($id)."\n\n");
			}
			// testing invalid phone numbers
			foreach ($invalidPhoneNumbers as $id) {
				echo nl2br("Input: ".$id."\n"."Result: ".verifyPhoneNumber($id)."\n\n");
			}
?>