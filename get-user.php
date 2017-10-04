<?php

//session_start(); uruchomiona w pliku profile.php
require_once("connect.php");

try {
    echo "dziala";
    $connect = new mysqli($host,$db_user,$db_password, $db_name);

    if ($connect->connect_errno != 0){
        echo 'brak połaczenia z baza danych w pliku get user ';
    }else {
        echo ' nawiazano połaczenie z baza danych w pliku get user';


        $result_get_user_db  = $connect->query("SELECT login FROM user");
        $count_user_db = $result_get_user_db->num_rows;

        if ($count_user_db > 0) {
           echo ' znaleziono uzytkownika/ow';

            for ($i=1; $i <= $count_user_db ; $i++) {
                $row  = $result_get_user_db->fetch_assoc();
                $login_user = $row['login'];
                echo "<td>$login_user</td>";
                echo "<br/>";
            }
        }
    }
    $connect->close();
}catch (Exception $e){
    echo "błąd serwera... sprobuj nastepnym razem";
};

?>

<?php
echo "<div id='formsAddDataUser'></div>"

?>