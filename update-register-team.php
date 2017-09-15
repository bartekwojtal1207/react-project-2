<?php
/**
 * Created by PhpStorm.
 * User: Bartek
 * Date: 2017-09-14
 * Time: 17:21
 */
?>
<?php
require_once 'connect.php';
$connect = @new mysqli($host,$db_user,$db_password, $db_name);
$myfile = fopen("data/club.json", "w") or die("Unable to open file!");

    if($connect->connect_errno!=0) {

        echo "nie dziala (brak połaczenia z baza danych #@#$%(@!))";

    }else {
        $clubName = $_POST['team_name'];
        $year_club = $_POST['year_team_create'];
        $club_NIP = $_POST['team_NIP'];
        @$myClubObj->club_id = $clubName_name;
        @$myClubObj->year_team = $year_club;
        @$myClubObj->club_NIP = $club_NIP;


//           $_SESSION['active_team'] = true;


        echo $clubName;

            if( $connect->query("INSERT INTO team VALUES(NULL,'$clubName','$year_club','$club_NIP',false)")){
                echo "zespol dodany";



            }else{
                echo 'blad0006 upddate-team';
            }
            $connect->close();
    }
    $myJSON = json_encode($myClubObj);
    fwrite($myfile,$myJSON);
    fclose($myfile);
    header('Location:show-update-team.php');



?>
