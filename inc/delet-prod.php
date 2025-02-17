<?php
if (isset($_SESSION['del_success'])) { ?>
    <div class="alert alert-success"><?php echo $_SESSION['del_success']; ?></div>
<?php }

unset($_SESSION['del_success']);
?>