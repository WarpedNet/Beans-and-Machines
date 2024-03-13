<?php
	class {
		private $pCode;
		private $pName;
		private $pExp;
		private $pStock;

		// Set/Get methods
		public function setPcode($pCode) {
			$this->$pCode = pCode;
		}
		public function getPcode() {
			return $this->pCode;
		}
		public function setPname($pName) {
			$this->$pName = pName;
		}
		public function getPname() {
			return $this->pName;
		}
		public function setpExp($pExp) {
			$this->$pExp = pExp;
		}
		public function getpExp() {
			return $this->pExp;
		}
		public function setPstock($pStock) {
			$this->$pStock = pStock;
		}
		public function getPstock() {
			return $this->pStock;
		}

		// Display product
		public function displayProduct() {
			echo "ID" . $this->getPcode();
			echo "Name" . $this->getPname();
			echo "Expirary" . $this->getpExp();
			echo "Stock" . $this->getPstock();
		}
	}
?>