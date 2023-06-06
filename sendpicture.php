<!doctype html>
<head>
<?php 
include 'config.php';

if (isset($_POST['submit']) && isset($_SESSION['userId'])) {
    $uploadDir = __DIR__.'/pictures/';

    // Pobranie informacji o pliku
    $fileName = $_FILES['photo']['name'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileSize = $_FILES['photo']['size'];
    $fileError = $_FILES['photo']['error'];

    $filename =  uniqid('', true) . '_' . $fileName;

    // Sprawdzenie, czy plik został poprawnie przesłany
    if ($fileError === 0) {
        // Generowanie unikalnej nazwy pliku
        
        $fileDestination = $uploadDir . $filename;

        // Przeniesienie pliku do określonego folderu
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            generateRedirect();
        } else {
            echo 'Wystąpił problem podczas zapisywania zdjęcia.';
        }

        // Nawiązanie połączenia z bazą danych
        $conn = dbConnection(); 

        // Sprawdzenie poprawności połączenia
        if ($conn->connect_error) {
            die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
        }

        $userId = $_SESSION['userId'];
        // Przykładowa kwerenda
        $sql = "insert into zdjecia values(NULL, '".$filename."', '".$userId."')";

        // Wykonanie kwerendy
        $result = $conn->query($sql);

        $conn->close();
    } else {
        echo 'Wystąpił błąd podczas przesyłania zdjęcia: ' . $fileError;
    }
}

?>

</head>
<body>

</body>
</html>