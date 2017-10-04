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
<!--    <script type="text/javascript" src="js/app.js"></script>-->

<!--    <script type="text/babel" src="js/react.jsx"></script>-->
<!--    <script type="text/babel" src="js/react-update.jsx"></script>-->
</head>
<body>

<!--<input value='ustaw aktywny club : .$player_name[$i]' type='submit'/>"-->
<section class="showClubPage">
    <div class="container">
        <div id="showClubs">

        </div>
    </div>
</section>

<?php
require_once 'connect.php';

$connect = @new mysqli($host, $db_user, $db_password, $db_name);

if($connect->connect_errno!=0) {

    echo "nie połaczono  z baza w pliku show update team php ";

}else{

   if ($result_club_list = $connect->query("SELECT * FROM `team` ")){
       $_SESSION['count_club_list'] = $result_club_list->num_rows;
       echo $_SESSION['count_club_list'];
       for ($i = 0; $i < $_SESSION['count_club_list']; $i ++) {

           $row_from_club = $result_club_list->fetch_assoc();

           $player_name[$i] = $row_from_club['Name-team'];
           $active_team[$i] = $row_from_club['active_team'];

            $buttonAktivClub[$i] = "<input value='$i' data-id='$i' type='submit' class='newKlasa'/>";

                echo "<div class='panel-club'>"."<p>$player_name[$i]</p>".$buttonAktivClub[$i]."<br/>".$active_team[$i]."</div>";


       }

   }

}
$connect->close();
?>

<script type="text/babel" src="js/show_update_club.jsx"> </script>
</body>
</html>


