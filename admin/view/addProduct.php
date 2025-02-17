<?php
require_once "../../inc/connection.php";
if (isset($_SESSION['email_admin'])) {
  include "../view/header.php";
  include "../view/sidebar.php";
  include "../view/navbar.php";
?>
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <?php require_once "../../inc/success.php"; ?>
            <?php require_once "../../inc/errors.php"; ?>

            <h3 class="card-title text-left mb-3">Add Product</h3>
            <form method="POST" action="handle/handle-addProduct.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>Category</label>
                <select name="cat" class="form-control p_input">
                  <?php
                  $queryT = "SELECT * FROM `categories`";
                  $runQueryT = mysqli_query($con, $queryT);
                  if (mysqli_num_rows($runQueryT) > 0) {
                    $categors = mysqli_fetch_all($runQueryT, MYSQLI_ASSOC);
                  } else {
                    $msg = "No categors found";
                  }
                  if (!empty($categors)) {
                    foreach ($categors as $cat) { ?>
                      <option value="<?php echo $cat['id'] ?>"><?php echo $cat['title'] ?></option>
                    <?php } ?>
                </select>
              <?php } else {
                    echo $msg;
                  } ?>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" name="desc" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="img" class="form-control p_input">
              </div>
              <div class="text-center">
                <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>

<?php
  include "../view/footer.php";
} else {
  header("location: ../../index.php");
  exit;
} ?>