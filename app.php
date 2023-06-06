<?php 

function generatePictures(){
    // Nawiązanie połączenia z bazą danych
    $conn = dbConnection();

    // Sprawdzenie poprawności połączenia
    if ($conn->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
    }

    $userId = 1;

    $sql = "select * from zdjecia";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<img class="image" onclick=\'window.location="show.php?img='.$row["ID"].'"\' src="./pictures/'.$row['filename'].'">';
        }
    } else {
        echo 'Na stronie nie ma jeszcze zdjęć :C';
    }

    // Zamknięcie połączenia z bazą danych
    $conn->close();
}

function loadImage(){

    if(isset($_GET["img"])){

        $imgId = $_GET["img"];

        // Nawiązanie połączenia z bazą danych
        $conn = dbConnection();

        // Sprawdzenie poprawności połączenia
        if ($conn->connect_error) {
            die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
        }

        $sql = "select zdjecia.filename, uzytkownicy.username from zdjecia join uzytkownicy on zdjecia.UserID = uzytkownicy.ID where zdjecia.ID=".$imgId; //?????
        $result = $conn->query($sql);

        $pictureNotFound = $result->num_rows == 0;

        if($pictureNotFound){
            return null;
        }

        return $result->fetch_assoc();
    }

    return null;
}
