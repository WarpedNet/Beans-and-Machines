<?php

require_once "../src/validation.php";

$validValues = array(
	"Password1#",
	"321StreetSesame(",
	"555555P#",
	"Bottle5*",
	"£sampleStreet5"
);

$invalidValues = array(
	"password",
	"password1",
	"1",
	"",
	"182765",
	"A#123456789101112131415161718192021222324252627282930"
);
foreach ($validValues as $value) {
	echo nl2br("Input: ".$value."\n"."Result: ".passwordVerify($value)."\n\n");
}
foreach ($invalidValues as $value) {
	echo nl2br("Input: ".$value."\n"."Result: ".passwordVerify($value)."\n\n");
}
?>