<?php

namespace order;

class ProductOrder // product order class
{
	// variables
	private $quantity;

	// set and get functions
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	// display function
	public function displayProductOrder() {
		return "
			$this->quantity
		";
	}
}
?>