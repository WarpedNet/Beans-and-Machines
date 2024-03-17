<?php
class ProductOrder {
	private $quantity;

	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function displayProductOrder() {
		return "
			$this->quantity
		";
	}
}
?>