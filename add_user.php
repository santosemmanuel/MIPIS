<form method="post">
        <input type="text" name="up_password"/>
        <input type="submit" name="sub_up"/>
</form>
<?php
    if(isset($_POST['sub_up'])){

    require_once("includes/connection.php");
    $password = $_POST['up_password'];
    $new_password = base64_encode($password);

    mysql_query("UPDATE user_tbl SET password='$new_password' WHERE id=1");

    }
?>