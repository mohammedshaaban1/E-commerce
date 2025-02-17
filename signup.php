<?php
require_once "inc/connection.php";
if (!isset($_SESSION['user_id']) && !isset($_SESSION['email_admin'])) {
  include "header.php";
  include "navbar.php";
?>
  <?php require_once 'inc/errors.php'; ?>
  <div class="card-body px-5 py-5" style="background-color:darkgray;">
    <h3 class="card-title text-left mb-3">Register</h3>
    <form action="handle/handle-signup.php" method="POST">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="name" class="form-control p_input">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control p_input">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control p_input">
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="text" name="Phone" class="form-control p_input">
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control p_input">
      </div>
      <div class="form-group d-flex align-items-center justify-content-between">
        <div class="form-check">
          <div class="text-center">
            <button type="submit" name="s-submit" class="btn btn-primary btn-block enter-btn">Signup</button>
          </div>
          <div class="d-flex">
            <button class="btn btn-facebook col me-2">
              <i class="mdi mdi-facebook"></i> Facebook </button>
            <button class="btn btn-google col">
              <i class="mdi mdi-google-plus"></i> Google plus </button>
          </div>
          <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
          <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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
<?php include "footer.php";
} else {
  header("location: index.php");
  exit;
} ?>