<?php
// session_start();

require 'lib/CRUD Operations/ReadProducts.php';
require 'class/product/Product.php';
use class\product\Product as productObj;

$readProductsObj = new readProducts();
$productData = $readProductsObj->readData("*");
$productObjArr = array();

foreach ($productData as $product) {
	$productObj = new productObj;
	$productObj->setProductID($product[0]);
	$productObj->setProductName($product[1]);
	$productObj->setExpiraryDate($product[2]);
	$productObj->setStock($product[3]);
	$productObjArr[] = array("pID"=>$product[0], "pObj"=>$productObj);	// 2D array because I need to search product ID
}
$_SESSION['productObjArr'] = $productObjArr;
?>