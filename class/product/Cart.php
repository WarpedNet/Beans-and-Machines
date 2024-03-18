<?php
namespace class\product;

class Cart {
	private $productObjArr = array();

	public function addToCart($object) {
		$this->productObjArr[] = $object;
	}
	public function removeFromCart($index) {
		unset($this->productObjArr[index]);	// Got from https://www.php.net/manual/en/function.unset
	}
	public function getCart() {
		return $this->productObjArr;
	}
	public function displayCart() {
		foreach ($this->productObjArr as $product) { ?>
			<tr>
				<?php $product->displayProduct();?>
			</tr> 
		<?php }
	}
}

?>