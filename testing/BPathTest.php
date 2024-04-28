<?php 
	// this will be the sample passwords for our basis path testing
	$pathOne = "Password123!";
	$pathTwo = "password123!";
	$pathThree = "Password123";
	$pathFour = "";
	$pathFive = "Password!";
	$pathSix = "Pw1!";

	// method to check if password is valid for each basis path test
	 require_once '../src/validation.php';
	 
	 passwordVerify($pathOne); // pass
	 passwordVerify($pathTwo); // fail
	 passwordVerify($pathThree); // fail
	 passwordVerify($pathFour); // fail
	 passwordVerify($pathFive); // fail
	 passwordVerify($pathSix); // fail
 ?>