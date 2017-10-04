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


    if($connect->connect_errno!=0) {

        echo "nie dziala (brak połaczenia z baza danych #@#$%(@!))";

    }else {
        $clubName = $_POST['team_name'];
        $year_club = $_POST['year_team_create'];
        $club_NIP = $_POST['team_NIP'];
        @$myClubObj->club_id = $clubName_name;
        @$myClubObj->year_team = $year_club;
        @$myClubObj->club_NIP = $club_NIP;
        $myfile = fopen("data/$clubName.club.json", "w") or die("Unable to open file!");

//           $_SESSION['active_team'] = true;


        echo $clubName;

            if( $connect->query("INSERT INTO team VALUES(NULL,'$clubName','$year_club','$club_NIP',false)")){
                echo "zespol dodany";
            }else{
                echo 'blad0006 upddate-team';
            }


            if ($result_teamusera = $connect->query("SELECT `id-team` FROM `teamusera` WHERE 'teamusera.id-team' = 'team.id-team'")){

                $count_teamusera = $result_teamusera->num_rows;
                $row_from_teamusera = $result_teamusera->fetch_assoc();

                echo "count teamusera".$count_teamusera;
                echo "teamusera".$row_from_teamusera['id-team'];



            }else{
                echo 'nie dziala';
            }
            $connect->close();


    }
    $myJSON = json_encode($myClubObj);
    fwrite($myfile,$myJSON);
    fclose($myfile);
//    header('Location:show-update-team.php');



?>
