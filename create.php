<?php
session_start();

require_once 'connect.php';

$myfile = fopen("data/table_player.json", "w") or die("Unable to open file!");

$connect = @new mysqli($host,$db_user,$db_password, $db_name);


if($connect->connect_errno!=0){
  echo "nie dziala (brak połaczenia z baza danych #@#$%(@!))";


}else{
  if($result_team_list  = $connect->query("SELECT * FROM `player` ")){
      $count_player_list = $result_team_list->num_rows;// liczba wierszy z pasujacym
      if($count_player_list > 0){
        echo "mamy cos ";
        for ($i=1; $i <= $count_player_list ; $i++) {
          $row  = $result_team_list->fetch_assoc();

          // $player_id[$i] = $row['id'];
          $player_name[$i] = $row['Imie'];
          $player_surname[$i] = $row['Nazwisko'];
          $player_country[$i] = $row['Narodowosc'];
          $player_age[$i] = $row['Wiek'];
          $player_formation[$i] = $row['Formacja'];
          $player_position[$i] = $row['Pozycja'];
          $player_betterleg[$i] = $row['Lepsza noga'];
          $player_height[$i] = $row['Wzrost'];
          $player_weight[$i] = $row['Waga'];

          // @$myPlayerObj->player_id = $player_id;
          @$myPlayerObj->player_id = $player_name;
          @$myPlayerObj->player_name = $player_surname;
          @$myPlayerObj->playar_age = $player_age;
          @$myPlayerObj->player_country = $player_country;
          @$myPlayerObj->player_formation = $player_formation;
          @$myPlayerObj->player_position = $player_position;
          @$myPlayerObj->player_betterleg = $player_betterleg;
          @$myPlayerObj->player_height = $player_height;
          @$myPlayerObj->player_weight = $player_weight;
          }

        $result_team_list->close();// !!!!! usuwanie z pamieci rekordow z bazy !!!
        }else{
          echo 'nie ma rekordow';
        }
    }else{
      echo 'blad zapytan';
    }


  echo "dziala";
  $connect->close();
}

$myJSON = json_encode($myPlayerObj);
fwrite($myfile,$myJSON);
fclose($myfile);

// header("Location: index.php");


?>
