<div class="card-body">
<?php
    if (isset($_SESSION["user_role"])) {
        include "comment-form-user.php";
    }else{
        include "comment-form-anonim.php";
    }
?>
</div>