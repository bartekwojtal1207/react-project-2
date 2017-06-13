<?php
session_start();
if((!isset($_POST['login'])) ||(!isset($_POST['password']))){
  header("Location:index.php");
  exit();
}
require_once 'connect.php';

$connect = @new mysqli($host,$db_user,$db_password, $db_name);
if($connect->connect_errno!=0){
  echo "nie dziala ";
  }else{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $login = htmlentities($login,ENT_QUOTES,"UTF-8"); // funcka do walidacji loginu  (wstrzykiwanie sql)


    // $sql = ;
    if($result  = @$connect->query(sprintf("SELECT * FROM user WHERE login = '%s'",mysqli_real_escape_string($connect,$login)))){// sprawdzamy czy polaczanie sie udaleo
      //mysqli_real_escape_string funkcja wykrywajaca probe wlamania z sql
      $count_user = $result->num_rows;// liczba wierszy z pasujacym login i haslem
        if($count_user > 0){
          $row  = $result->fetch_assoc(); // wlozenie danych do tablicy asocjacyjnej
          if (password_verify($password,$row[password])) {

          $_SESSION['login_in_system'] = true; // zmienna do sprawdzania czy jestesmy zalogowani w systemie
          $_SESSION['user'] = $row['login'];
          $_SESSION['id'] = $row['id'];

          unset($_SESSION['error_login']);
          $result->close();// !!!!! usuwanie z pamieci rekordow z bazy !!!!
          header('Location:team.php');
          echo $user;
          }else{
            $_SESSION['error_login'] = "<h3>błędne login lub haslo</h3>";
            header('Location:index.php');
          };
      }else{
        $_SESSION['error_login'] = "<h3>błędne login lub haslo</h3>";
        header('Location:index.php');
      }
  }
  $connect->close();
  echo "dziala";
};

    //echo $login."<br/>";
  //  echo $haslo;
  //  echo $login;
?>
