<?php

require 'class/product/Cart.php';
use class\product\Cart as cartObj;

$cartObj = new cartObj();
$_SESSION['Cart'] = $cartObj;

?>