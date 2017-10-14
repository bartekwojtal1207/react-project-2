<?php
/**
 * Created by PhpStorm.
 * User: Bartek
 * Date: 2017-10-07
 * Time: 14:54
 */
session_start();

require_once 'connect.php';
require_once 'check-login.php';
$connect = @new mysqli($host,$db_user,$db_password, $db_name);

if($connect->connect_errno!=0) {

}else {
        echo"polaczona z baza w pliku set-data-user.php";
        $idUser = $_SESSION['id'];
    echo  $idUser;
        $userName = $_POST['name_data_user'];
        $userSurname = $_POST['surname_data_user'];
        $numberPhoneUser = $_POST['number-user'];
        $updateUser = "UPDATE `informationuser` SET imieUser='$userName', nazwiskoUser ='$userSurname', nrTelUser= '$numberPhoneUser' WHERE id = '$idUser' ";
    if(mysqli_query($connect, $updateUser)) {
        echo 'doodne to dane';
    }else {
        echo 'nie dodano danych o uzytkownikach'.mysqli_error($connect);
    }


}
mysqli_close($connect);


?>