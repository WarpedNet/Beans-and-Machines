<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    exit;
}
?>


<link rel="stylesheet" type="text/css" href="CSS/index.css">
<div class="main-content" align="center">
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 style="font-family:sans-serif;">Your order has been placed for the following products:</h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total</th>
        </tr>
        <?php
        if (isset($_SESSION["Cart"])) {
            $total = 0;
            foreach ($_SESSION["Cart"] as $product) { 
                $itemCost = $product["price"]*$product["quantity"];
                $total += $itemCost;
                ?>
                <tr>
                    <td><?php echo $product["name"]; ?></td>
                    <td><?php echo $product["price"]; ?></td>
                    <td><?php echo $product["quantity"]; ?></td>
                    <td><?php echo $itemCost; ?></td>
                </tr>
            <?php }} ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><?php echo $total ?></td>
            </tr>
    </table>
    <h1 style="font-family:sans-serif;">Thank you for your order!</h1>
    <button name="home" value="home" onclick="location.href='index.php'">Return to Home</button>
</div>

<?php require '../layout/footer.php'; ?>