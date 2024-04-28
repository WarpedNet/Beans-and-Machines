<?php 
	// this will be the sample passwords for our equivalence path testing
	$valid = "123SesameStreet()";
	$nodigit = "bxpU(BXTVi";
	$toosmall = "pass";
	$toobig = "PasswordPasswordPasswordPassword123*";
	$nosymbol = "BoXc2kmmHGPYqVpflq1S";
	$nocaps = "qwertyuiopasdhjk123&";
	$null = "";
	$noletters = "123987";


	// method to check the password and make sure it is from the specific requirements
	 require_once '../src/validation.php';
	 
	 passwordVerify($valid); // pass
	 passwordVerify($nodigit); // fail
	 passwordVerify($toosmall); // fail
	 passwordVerify($toobig); // fail
	 passwordVerify($nosymbol); // fail
	 passwordVerify($nocaps); // fail
	 passwordVerify($null); // fail
	 passwordVerify($noletters); // fail
 ?>