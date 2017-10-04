<?php
/**
 * Created by PhpStorm.
 * User: Bartek
 * Date: 2017-09-23
 * Time: 11:52
 * header teampleate
 */?>


<header>
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <div class="media media-middle">
                    <a href="index.php"><img src="img/logo.jpg" alt="logo image" class="img-responsive"></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-10 col-xs-12">
                <h1>Your Game
                    <small class="align-bottom"> is a simply !</small>
                </h1>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 ">
                <?php
                if( (isset($_SESSION['login_in_system'])) && ($_SESSION['login_in_system']==true) ) {
                    echo 'jestes juz zalogowany';
                    echo $_SESSION['login_in_system'];
                }else {
                    echo "nie nie jestes zalogowany";
                }
//                An auxiliary sign made for a moment displays over the login form a short information if you are logged in
                ?>

                <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="basic-addon1">Login to system</span>
                    <form class="form_header" action="login.php" method="post">
<!--                        form to login -->
                        <input type="text" class="form-control" name="login" placeholder="login" aria-describedby="basic-addon1">
                        <input type="password" class="form-control" aria-describedby="basic-addon1" name="password"oncopy="return false" onpaste="return false" id="pass" placeholder="Password" >
                    </form>

                    <?php
                    if(isset($_SESSION['error_login'])) {
                        echo $_SESSION['error_login'];
//                        text under form login " bledne login lub haslo"
                    };
                    ?>

                </div>
            </div>
        </div>
    </div>
</header>
