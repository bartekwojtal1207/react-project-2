<?php
/**
 * Created by PhpStorm.
 * User: Bartek
 * Date: 2017-10-07
 * Time: 16:49
 */
if (!isset($_SESSION['login_in_system'])){
    header("Location:index.php");
    exit();
};

?>