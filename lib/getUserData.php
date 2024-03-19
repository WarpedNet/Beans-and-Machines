<?php
require 'lib/CRUD Operations/readUserData.php';
require 'lib/getUserData.php';

use user\User as userOBJ;

$readOBJ = new readUserData();
$displayName = $readOBJ->displayUserData("uName");
$displayEmail = $readOBJ->displayUserData("uEmail");
