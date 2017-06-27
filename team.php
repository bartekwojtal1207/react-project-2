<?php session_start();  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Your Team</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js">
    </script>
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
            <div class="input-group input-group-sm">
                <span class="input-group-addon" id="basic-addon1">Login to system</span>
                <form class="form_header" action="login.php" method="post">
                  <input type="text" class="form-control" name="login" placeholder="login" aria-describedby="basic-addon1">
                  <input type="password" class="form-control"name="haslo" oncopy="return false" onpaste="return false" id="pass"placeholder="Password" aria-describedby="basic-addon1">
                </form>
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
              <li role="presentation"  class="active"><a href="team.php">Your Team</a></li>
              <li role="presentation"><a href="#">Update data</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <section class="main_team_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php if (!isset($_SESSION['login_in_system'])){
                    header("Location:index.php");
                    exit();
                  };
                  echo  "<h3>Witaj"." ".$_SESSION['user']." ! "."</h3>" ;
                ?>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5>Twoja drużyna :</h5>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="team_list">
              <?php
              require_once 'connect.php';
              $connect = @new mysqli($host,$db_user,$db_password, $db_name);
              if($connect->connect_errno!=0){
                echo "nie dziala (brak połaczenia z baza danych #@#$%(@!))";
              }else{
                if($result_team_list  = $connect->query("SELECT * FROM `player` ")){
                    $count_player_list = $result_team_list->num_rows;// liczba wierszy z pasujacym
                    if($count_player_list > 0){
                      // wlozenie danych do tablicy asocjacyjnej
                      echo $count_player_list;
                      // $player_name = $row['Nazwisko'];
                      // $player_id = $row['id'];
                      for ($i=1; $i <= $count_player_list ; $i++) {
                        $row  = $result_team_list->fetch_assoc();
                        $player_name = $row['Nazwisko'];
                        $player_id = $row['id'];
                        $player_position = $row['Pozycja'];

                        //echo "<ul><li>$player_id $player_name   $player_position</li></ul>";
                        echo "<td align='center'>$player_id</td>";
                        echo "<td >$player_name</td>";
                        echo "<br/>";
                      }
                      for ($i=0; $i < $count_player_list-1 ; $i++) {
                        # code...
                      }

                      $result_team_list->close();// !!!!! usuwanie z pamieci rekordow z bazy !!!
                      }else{
                        echo 'brak znalezien w bazie #+++000';
                      }
                  }else{
                    echo 'blad0002';
                  }
                  $connect->close();
              };
               ?>
            </div>

          </div>
        </div>
      </div>
    </section>



    <a href="logout.php"><button type="button" name="log_out">wyloguj</button></a>
    <br><br>

    <div class="add_player">
      <form action="add_player.pHP"class="add_player_form" method="post">
          imie
          <input type="text" name="name_player" ><br/>
          Nazwisko
          <input type="text" name="surname_player" ><br/>
          wiek
          <input type="date" name="age" ><br/>
          kraj
          <input type="text" name="country" ><br/>
          formacja
          <input type="text" name="formation"><br/>
          Pozycja
          <input type="text" name="position"><br/>
          lepsza noga
          <input type="checkbox" name="betterfoot" value="prawa"><input type="checkbox" name="betterfoot" value="lewa">
          wzrost
          <input type="float" name="wzrost" ><br/>
          waga
          <input type="float" name="waga" ><br/>
          <input type="submit" name="add_player_button" value="Dodaj Piłkarza do Bazy"><br/>
      </form>
    </div>

  </body>
</html>
