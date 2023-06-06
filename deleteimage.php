<?php
include 'config.php';

if($_SESSION['isAdmin'] && $_GET['img']){

    $imgId = $_GET['img'];

    // Nawiązanie połączenia z bazą danych
    $conn = dbConnection(); 

    // Sprawdzenie poprawności połączenia
    if ($conn->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
    }

    $userId = $_SESSION['userId'];
    // Przykładowa kwerenda
    $sql = "delete from zdjecia where ID=".$imgId."";

    // Wykonanie kwerendy
    $result = $conn->query($sql);

    $conn->close();
    
    echo "Usunieto";
}
else{
    echo 'Brak danych lub uprawnien';
}

?>
<br>
<a href="index.php">Powrót do strony głównej </a>