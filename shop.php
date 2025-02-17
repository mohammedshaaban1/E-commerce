<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php require_once "inc/connection.php" ?>
<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <?php require_once 'inc/errors.php' ?>
    <?php require_once 'inc/success.php' ?>
    <div class="pro-container">
        <?php
        $query = "select * from products";
        $runQuery = mysqli_query($con, $query);
        if (mysqli_num_rows($runQuery) > 0) {
            $products = mysqli_fetch_all($runQuery, MYSQLI_ASSOC);
        } else {
            $msgs = "No products found";
        }
        ?>
        <?php
        if (!empty($products)) {
            $id = 0; ?>
            <?php foreach ($products as $product) { ?>
                <div class="pro">
                    <form action="handle/handle-shop.php?id=<?php echo $id++; ?>" method="post">
                        <img src="<?php echo "admin/upload/" . $product['image']; ?>" alt="" height="200" />
                        <div class="des">
                            <h3><?php echo $product['name']; ?></h3>
                            <h5><?php echo $product['desc']; ?></h5>
                            <div class="star ">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <input type="text" hidden name="id" value="<?php echo $product['id']; ?>">
                            <h4><?php echo $product['price']; ?></h4>
                            <?php if (!empty($_SESSION['user_id'])) { ?>
                                <input type="number" name="quantity" required>
                                <button type="submit"name = "send_pro"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button>
                                <?php } ?>
                            </div>
                    </form>
                </div>
        <?php }
        } else {
            echo $msgs;
        } ?>
</section>
<section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="shop.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
            <li class="page-item">
                <a class="page-link" href="shop.php?" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</section>
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext ">
        <h4>Sign Up For Newletters</h4>
        <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
    </div>
    <div class="form ">
        <input type="text " placeholder="Enter Your E-mail... ">
        <button class="normal ">Sign Up</button>
    </div>
</section>
<?php include 'footer.php' ?>