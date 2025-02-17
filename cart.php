<?php include 'inc/connection.php' ?>
<?php if (isset($_SESSION['user_id'])) { ?>
    <?php include 'header.php' ?>
    <?php include 'navbar.php' ?>
    <section id="page-header" class="about-header">
        <h2>Cart</h2>
        <p>Let's see what you have.</p>
    </section>
    <?php require_once 'inc/delet-prod.php'; ?>
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td></td>
                    <td>Remove</td>
                </tr>
            </thead>
            <?php
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM `cart` WHERE `user_id` =$id";
            $runQuery = mysqli_query($con, $query);
            if ($runQuery) {
                $prots = mysqli_fetch_all($runQuery, MYSQLI_ASSOC);
                foreach ($prots as $prot) {
            ?>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo "admin/upload/" .  $prot['image'] ?>" alt="product1"></td>
                            <td><?php echo $prot['name'] ?></td>
                            <td><?php echo $prot['desc'] ?></td>
                            <td><?php echo $prot['quan'] ?></td>
                            <td><?php echo $prot['price'] ?></td>
                            <td><?php echo $prot['subTotal'] ?></td>
                            <td></td>
                            <!-- Remove any cart item  -->
                            <form action="inc/remove.php" method="post">
                                <input type="text" name="id" hidden value="<?php echo $prot['id'] ?>">
                                <td><button name="remove" type="submit" class="btn btn-danger">Remove</button></td>
                            </form>
                        <?php } ?>
                        </tr>
                    </tbody>
                    <!-- confirm order  -->
                <?php } ?>
        </table>
    </section>
    <?php require_once 'inc/errors.php'; ?>
    <?php require_once 'inc/success.php'; ?>
    <section id="cart-add" class="section-p1">
        <form action="inc/coupon.php" method="post">
            <div id="coupon">
                <h3>Coupon</h3>
                <input type="text" name="cop" placeholder="Enter code">
                <button name="check" class="normal">Apply</button>
            </div>
            <p>Note : that the discount coupon is valid for one time use only.</p>
        </form>
        <!-- done -->

        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <?php
                    $queryCh = "SELECT sum(subTotal) as subT FROM `cart` WHERE user_id =$id";
                    $runQueryCh = mysqli_query($con, $queryCh);
                    if (mysqli_num_rows($runQuery) >= 1) {
                        $sub = mysqli_fetch_assoc($runQueryCh);
                    } else {
                        $sub['subT'] = 0;
                    } ?>
                    <td><?php echo $sub['subT']; ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>40</td>
                </tr>
                <!-- <tr>
                    <td>Tax</td>
                    <td></td>
                </tr> -->
                <tr>
                    <?php if (!empty($_SESSION['discount'])) {
                        $dis = $_SESSION['discount']; ?>
                        <td><strong><?php echo (-$dis) ?></strong></td>
                    <?php }
                    unset($_SESSION['discount']) ?>
                    <td><strong>Total</strong></td>
                    <td><strong><?php  ?></strong></td>
                </tr>
            </table>


            <form action="confirmOrder.php" method="post">
                <?php
                $carts = [
                    'product_id' => $prot['id'],
                    'quant' => $prot['quan'],
                    'subTot' => $prot['subTotal'],
                    'user_id' => $id
                ];
                $_SESSION['carts'][] = $carts;
                ?>
                <button name="Confirm" class="normal">Confirm</button>
            </form>
        </div>
    </section>
<?php
    include "footer.php";
} else {
    header("location:login.php");
    exit;
} ?>