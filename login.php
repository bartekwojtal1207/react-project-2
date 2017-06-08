<?php
session_start();
require_once 'connect.php';

$connect = @new mysqli($host,$db_user,$db_password, $db_name);
if($connect->connect_errno!=0){
  echo "nie dziala ";
}else{
  $login = $_POST['login'];
  $haslo = $_POST['password'];

  $sql = "SELECT * FROM user WHERE login = '$login' AND password = '$haslo'";
  if($result  = @$connect->query($sql)){// sprawdzamy czy polaczanie sie udaleo
    $count_user = $result->num_rows;// liczba wierszy z pasujacym login i haslem
    if($count_user > 0){
        $row  = $result->fetch_assoc(); // wlozenie danych do tablicy asocjacyjnej
        $_SESSION['user'] = $row['login'];


        $result->close();// !!!!! usuwanie z pamieci rekordow z bazy !!!!
        header('Location:team.php');
        echo $user;
    }else{

    }

  }
  $connect->close();
  echo "dziala";
};

    //echo $login."<br/>";
  //  echo $haslo;
  //  echo $login;
?>
