<?php

require_once "../src/validation.php";

$validPasswords = array(
	"Password1#",
	"321StreetSesame(",
	"555555P#",
	"Bottle5*",
	"£sampleStreet5"
);

$invalidPasswords= array(
	"password",
	"password1",
	"1",
	"",
	"182765",
	"A#123456789101112131415161718192021222324252627282930"
);

$validIDs = array(0,1,2,3,4,5,6,7,8,9,10);
$invalidIDs = array(-1,-2,-3,"","A",null,);

$validCardNumbers = array(
"0000 0000 0000 0000",
"0123456789012345",
"1111-1111-1111-1111"
);
$invalidCardNumbers = array(
"-1111 1111 1111 111",
"1",
"A",
null,
"{}12 2345 6789 1010"
);

$validPhoneNumbers = array(
"+1-111-1111-1111",
"+353-2-555-666",
"+182-44-5566-666",
"+12-445-555-6666",
"+182-99-9999-9999"
);

$invalidPhoneNumbers = array(
"",
"+A-111-1111-1111",
"+3333-12-2222-2222",
null,
"-1-111-1111-1111"
);

echo "<h1>Password Verification</h1>";
foreach ($validPasswords as $value) {
	echo nl2br("Input: ".$value."\n"."Result: ".passwordVerify($value)."\n\n");
}
foreach ($invalidPasswords as $value) {
	echo nl2br("Input: ".$value."\n"."Result: ".passwordVerify($value)."\n\n");
}

echo "<h1>ID Verification</h1>";
foreach ($validIDs as $id) {
	echo nl2br("Input: ".$id."\n"."Result: ".(verifyID($id) ? "true" : "false")."\n\n");
}
foreach ($invalidIDs as $id) {
	echo nl2br("Input: ".$id."\n"."Result: ".(verifyID($id) ? "true" : "false")."\n\n");
}

echo "<h1>Card Number Verification</h1>";
foreach ($validCardNumbers as $id) {
	echo nl2br("Input: ".$id."\n"."Result: ".verifyCardNumber($id)."\n\n");
}
foreach ($invalidCardNumbers as $id) {
	echo nl2br("Input: ".$id."\n"."Result: ".verifyCardNumber($id)."\n\n");
}

echo "<h1>Phone Number Verification</h1>";
foreach ($validPhoneNumbers as $id) {
	echo nl2br("Input: ".$id."\n"."Result: ".verifyPhoneNumber($id)."\n\n");
}
foreach ($invalidPhoneNumbers as $id) {
	echo nl2br("Input: ".$id."\n"."Result: ".verifyPhoneNumber($id)."\n\n");
}

?>