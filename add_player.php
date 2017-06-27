<?php
  session_start();
  if (!isset($_SESSION['login_in_system'])){
         header("Location:index.php");
         exit();
       };
        $surname_player = $_POST['surname_player'];
        $name_player = $_POST['name_player'];
        $age_player = $_POST['age'];
        $country = $_POST['country'];
        $formation = $_POST['formation'];
        $position = $_POST['position'];
        $wzrost = $_POST['wzrost'];
        $betterfoot = $_POST['betterfoot'];
        $waga = $_POST['waga'];
        require_once 'connect.php';
        $connect = new mysqli($host,$db_user,$db_password, $db_name);
        if($connect->connect_errno!=0){
          echo "nie dziala ";
        }else{
          echo "dziala";
            echo $surname_player."".$name_player."". $country."".$wzrost."".$waga."".$betterfoot;
            echo "<br/>";
            if( $connect->query("INSERT INTO player VALUES(NULL,'$surname_player','$name_player','$country','$age_player',
              '$formation','$position','$betterfoot','$wzrost','$waga')")){
              echo "DODANO GRACZA !!";// w zapytraniu blad !!!!
            }else{
              echo $connect->connect_errno;
              echo "<br/>";
              echo "blad";
          }

          $connect->close();
        };
 ?>
