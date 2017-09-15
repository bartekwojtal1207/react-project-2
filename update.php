<?php
/**
 * Created by PhpStorm.
 * User: Bartek
 * Date: 2017-09-14
 * Time: 15:38
 */

session_start();
if (!isset($_SESSION['login_in_system'])){
    header("Location:index.php");
    exit();
}
    echo "witaj ".$_SESSION['user']." !";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>FIFA manager PRO</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react-dom.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.25.0/babel.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/babel" src="js/react.jsx"></script>
    <script type="text/babel" src="js/react-update.jsx"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <div class="media media-middle">
                    <a href="#"><img src="img/logo.jpg" alt="logo image" class="img-responsive"></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-10 col-xs-12">
                <h1>Your Game
                    <small class="align-bottom"> is a simply !</small>
                </h1>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 ">
                <?php if((isset($_SESSION['login_in_system']))&&($_SESSION['login_in_system']==true)){
                    echo 'jestes juz zalogowany';
                    echo $_SESSION['login_in_system'];
                    //  exit();
                }else{
                    echo "nie nie jestes zalogowany";
                }?>
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="basic-addon1">Login to system</span>
                    <form class="form_header" action="login.php" method="post">
                        <input type="text" class="form-control" name="login" placeholder="login" aria-describedby="basic-addon1">
                        <input type="password" class="form-control" name="password"oncopy="return false" onpaste="return false" id="pass"placeholder="Password" aria-describedby="basic-addon1">
                    </form>
                    <?php if(isset($_SESSION['error_login'])){
                        echo $_SESSION['error_login'];
                    };
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="index.php">Home</a></li>
                    <li role="presentation"><a href="profile.php">Profile</a></li>
                    <li role="presentation"><a href="team.php">Your Team</a></li>
                    <li role="presentation" class="active"><a href="update.php">Update data</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<section class="add_team_section">
    <div class="container">

        <div id="newapp">
<!--            powitanie w react uzywane w wielu plikach-->
        </div>
        <div id="newapp-update-page"></div>
        <div id="newapp-update-page2"></div>
    </div>
</section>





</body>
</html>


