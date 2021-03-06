<?php session_start();  ?>
<!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1, user-scalable=yes">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <title>FIFA manager PRO</title>


      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
      <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

      <link rel="stylesheet" href="css/style.css">


      <script type="text/javascript"  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react-dom.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.25.0/babel.js"></script>

      <script type="text/javascript" src="slick/slick.min.js"></script>
      <script type="text/javascript" src="js/slick-run.js"></script>

      <script type="text/javascript" src="js/app.js"></script>
      <script type="text/babel" src="js/react.jsx"></script>

  </head>
  <body>
    <?php include_once 'components/header.php'; ?>
    <?php include_once 'components/navigation-top.php'; ?>



    <section class="slider">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider">
                  <div class="slide">1</div>
                  <div class="slide">2</div>
                  <div class="slide">3</div>
                  <div class="slide">4</div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section class="main_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Manage Your TEAM !</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <ul class="list_option">
              <li class="element_option"><a href="#"><div class="thumbnail">
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Tactic</a></p>
              </div></a></li>
              <li class="element_option"><a href="#"><div class="thumbnail">
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Team statistic</a></p>
              </div></a></li>
              <li class="element_option"><a href="#"><div class="thumbnail">
                <p><a class="btn btn-primary btn-lg" href="create.php" role="button">Personal ranking</a></p>
              </div></a>
              <?php
               if (isset( $_SESSION['user'])){
                 echo "ktos jest zalgowany";
               } ?>

              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
              if (isset($_SESSION['add_new_user'])) {
                echo "<h1>Witam nowy uzytkowniku</h1>";
                unset($_SESSION['add_new_user']);
              };
            ?>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="newapp">
                <?php
                  if((isset($_SESSION['login_in_system']))&&($_SESSION['login_in_system']==true)){
                    echo  "<script type='text/babel' src='js/react.jsx'> </script>";
//                    " witam w react  "
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </section>

<script type="text/javascript">

    $(function() {

        function setActiveMenu() {
            let activeMenu = $('ul.nav li').first();
            activeMenu.addClass('active');
        }

        setActiveMenu();

    });

</script>
  </body>
</html>
