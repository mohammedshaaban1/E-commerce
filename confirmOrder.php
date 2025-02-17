<?php
require_once "inc/connection.php";
if (isset($_SESSION['user_id'])) {
    include "header.php";
    include "navbar.php";
    $id = $_SESSION['user_id'];
    $query = "SELECT `name`,`email`,`phone`,`address` FROM `users` WHERE id=$id";
    $runQuery = mysqli_query($con, $query);
    if (mysqli_num_rows($runQuery) == 1) {
        $data = mysqli_fetch_assoc($runQuery);
    } else {
        $msgg = "error";
    } ?>
    <section id="cart-add" class="section-p1">
        <div id="subTotal">
            <h3>Cart totals</h3>
            <form class=" col-4" action="handle/handle-confirm-order.php" method="POST">
                name<input name="name" type="text" value="<?php echo $data['name']; ?>">
                email <input name="email" type="email" value="<?php echo $data['email']; ?>">
                address<input name="address" type="text" value="<?php echo $data['address']; ?>">
                phone<input name="phone" type="text" value="<?php echo $data['phone']; ?>">
                city<br><input name="city" type="text">
                paymentType<select name="paymentType">
                    <option value="Cash_on_Delivery">Cash on Delivery</option>
                    <option value="Credit_Card">Credit Card</option>
                    <option value="Fawry">Fawry</option>
                </select>
                <button class="normal" name="save" type="submit">proceed to checkout</button>
            </form>
        </div>
    </section>
<?php include "footer.php";
} else {
    header("location:login.php");
    exit;
}
?>