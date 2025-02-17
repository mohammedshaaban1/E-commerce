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
            <?php require_once '../../inc/errors.php';  ?>
            <?php require_once '../../inc/success.php';  ?>
            <h3 class="card-title text-left mb-3">Add Category</h3>
            <form method="POST" action="handle/handle-addcategory.php">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control p_input">
              </div>
              <div class="text-center">
                <button type="submit" name="addCategory" class="btn btn-primary btn-block enter-btn">Add</button>
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