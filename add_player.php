<?php
  session_start();
  if (!isset($_SESSION['login_in_system'])){
         header("Location:index.php");
         exit();
       };
        $name_player = $_POST['name_player'];
        $surname_player = $_POST['surname_player'];
        $age_player = $_POST['age'];
        $country = $_POST['country'];
        $formation = $_POST['formation'];
        $position = $_POST['position'];
        $wzrost = $_POST['height_input'];
        $betterfoot = $_POST['betterfoot'];
        $waga = $_POST['weight_input'];
        require_once 'connect.php';
        $connect = new mysqli($host,$db_user,$db_password, $db_name);
        if($connect->connect_errno!=0){
          echo "nie dziala ";
        }else{
          echo "dziala";
            if( $connect->query("INSERT INTO player VALUES(NULL,'$name_player','$surname_player','$country','$age_player',
              '$formation','$position','$betterfoot','$wzrost','$waga')")){
              echo "DODANO GRACZA !!";
            }else{
              echo $connect->connect_errno;
              echo "<br/>";
              echo "blad";
          }

          $connect->close();
          header("Location:team.php");
        };
 ?>
