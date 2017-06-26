<?php

  session_start();


  if(isset($_POST['email'])){ // sprawdzamy czy ktos kliknal button w rejstracji

    $registerOk = true;

    $nick  = $_POST['nick'];
    if ((strlen($nick)<3)||(strlen($nick)>20)){// sprawdzamy poprawnosc loginu
      $registerOk = false;
      $_SESSION['e_nick'] = "za krotki lub dlugi login";
    };
    if (ctype_alnum($nick)==false) {
        $registerOk = false;
        $_SESSION['e_nick'] = "używaj tylko polskich znakow";
    };
// koniec walidacji dla nicka

//sprawdzanie adresu mail(wlasciwie zbedne poniewaz type=mail sprawdza wszystko ale niech jest)
    $email = $_POST['email'];
    $emailSafe = filter_var($email, FILTER_SANITIZE_EMAIL);
    if ((filter_var($emailSafe,FILTER_VALIDATE_EMAIL)==false)||($emailSafe!=$email)) {
      $registerOk = false;
      $_SESSION['e_email'] = "podaj prawidłowy adres email";
    };
// sprawdzanie poprawnosci hash_equals
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ((strlen($password1)<8)||(strlen($password1)>20)) {
      $registerOk = false;
      $_SESSION['e_password'] = "haslo musi miec od 8 do 20 znakow";
    };
    if ($password1 != $password2) {
      $registerOk = false;
      $_SESSION['e_password'] = "hasla nie sa identyczne";
    };

    $password_hash = password_hash($password1,PASSWORD_DEFAULT);// hashowanie hasla

  // koniec walidacji hasel

  // sprawdzanie checkboxa
      if(!isset($_POST['regulations'])){
        $registerOk = false;
        $_SESSION['e_regulations'] = "potwierdz regulamin";
      };
    //sprawdzanie captcha
    $secret_key_captcha = "6Lc8SCUUAAAAAA1o6cqn6T4u40eHaSwVnqVdXq3g";
    $check_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key_captcha."&response=".$_POST['g-recaptcha-response']);
    $response_captcha = json_decode($check_captcha);

    if ($response_captcha->success==false) {
      $registerOk = false;
      $_SESSION['e_captcha'] = "potwierdz ze nie jestes botem";
    };
    require_once("connect.php");
    //sprawdzanie czy wpisany login i mail jest juz w bazie
    try {
      $connect = new mysqli($host,$db_user,$db_password, $db_name);

      if($connect->connect_errno!=0){

      }else{
        // sprawdzanie maila czy jest juz bazie
        $result = $connect->query("SELECT id FROM user WHERE email = '$email'");
        if (!$result) {
          throw new Exception($connect->error);
        }
        $count_mail = $result->num_rows;
        if ($count_mail > 0) {
          $registerOk = false;
          $_SESSION['e_email'] = "podany mail jest juz w bazie ";
        }
          // sprawdzanie loginu czy jest juz bazie
        $result = $connect->query("SELECT id FROM user WHERE login = '$nick'");

        if (!$result) {
          throw new Exception($connect->error);
        }
        $count_nick = $result->num_rows;
        if ($count_nick > 0) {
          $registerOk = false;
          $_SESSION['e_nick'] = "podany login jest juz w bazie ";
        }
          // obsluga gdy formularz jest wypelniony prawidlowo
        if($registerOk == true){
          echo "dziala";
          if ($connect->query("INSERT INTO user VALUES (NULL, '$nick','$password_hash','$email')")){
            $_SESSION['add_new_user'] = true;
            header("Location:index.php");
          }else{
          echo $connect->connect_errno;
          }
        }
        $connect->close();
      }
    }catch (Exception $e) {
      echo "błąd serwera... sprobuj nastepnym razem";
    };

  };// KONIEC SPRAWDZANIA IF CZY KLIKNELISMY W BTN

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>FIFA manager PRO - profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react.js"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react-dom.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script> <!-- captcha  human or robot-->
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
              <li role="presentation" ><a href="index.php">Home</a></li>
              <li role="presentation"class="active"><a href="#">Profile</a></li>
              <li role="presentation"><a href="team.php">Your Team</a></li>
              <li role="presentation"><a href="#">Update data</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <section class="register_section" id="main_section">
      <div class="container">
        <div class="row" style="margin-top:50px;">
          <div class="col-md-4 col-sm-12 col-xs-12">
            <form class="register_form"  method="post">
              <div class="form-group">
                <label for="inputNickname">Login:</label>
                <input type="text" class="form-control"  name="nick" id="inputNickname" placeholder="Podaj login">
              </div>
              <?php
              if(isset($_SESSION['e_nick'])){
                echo $_SESSION['e_nick'];
                unset($_SESSION['e_nick']);
              };
              ?>
              <div class="form-group">
                <label for="inputPassword1">Password:</label>
                <input type="password" class="form-control" name='password1' id="inputPassword1" placeholder="Podaj hasło">
              </div>
              <?php
              if(isset($_SESSION['e_password'])){
                echo $_SESSION['e_password'];
                unset($_SESSION['e_password']);
              };
              ?>
              <div class="form-group">
                <label for="inputPassword2">Enter the same password: </label>
                <input type="password" class="form-control" id="inputPassword2" name='password2' placeholder="powtorz haslo">
              </div>
              <div class="form-group">
                <label for="inputEmail1">Email address:</label>
                <input type="email" class="form-control" name="email" id="inputEmail1" placeholder="Email">
              </div>
              <?php

                if(isset($_SESSION['e_email'])){
                  echo $_SESSION['e_email'];
                  unset($_SESSION['e_email']);
                };
              ?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="regulations"> Accept regulations
                </label>
              </div>
              <?php
              if(isset($_SESSION['e_regulations'])){
                echo $_SESSION['e_regulations'];
                unset($_SESSION['e_regulations']);
              };
              ?>
              <div class="g-recaptcha" data-sitekey="6Lc8SCUUAAAAAPmoBA28rsReE6KOZGGfyo7FjZat"></div>
              <?php
              if(isset($_SESSION['e_captcha'])){
                echo $_SESSION['e_captcha'];
                unset($_SESSION['e_captcha']);
              };
              ?>
              <button type="submit" style="margin-top:10px;" class="btn btn-default register-btn">Register</button>
            </form>
          </div>
        </div>
        <?php
        if((isset($_SESSION['login_in_system']))&&($_SESSION['login_in_system']==true)){
         echo 'jestes juz zalogowany';
        echo "<script type='text/javascript' src='js/profile.js'> </script>";
       }else{
         echo "nie nie jestes zalogowany";
     }?>
    </section>
  </body>
</html>
