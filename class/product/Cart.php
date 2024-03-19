<?php
namespace class\product;

class Cart {
	private $productArr = array();

	public function addToCart($arr) {
		$this->productArr[] = $arr;
	}
	public function removeFromCart($index) {
		unset($this->productArr[index]);	// Got from https://www.php.net/manual/en/function.unset
	}
	public function getCart() {
		return $this->productArr;
	}
	public function displayCart() {
		foreach ($this->productArr as $product) { ?>
			<tr>
				<?php $product["obj"]->displayProduct();?>
				<td> <?php echo array_column($this->getCart(), "quantity")[0];?> </td>
			</tr> 
		<?php }
	}
}

?>