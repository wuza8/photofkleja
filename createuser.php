<?php

include 'config.php';

$conn = dbConnection();

// Sprawdzenie poprawności połączenia
if ($conn->connect_error) {
    die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
}

// Rejestracja użytkownika

$username = $_POST['username'];
$password = $_POST['password'];

// Sprawdzenie, czy użytkownik o podanej nazwie już istnieje
$checkQuery = "SELECT * FROM uzytkownicy WHERE username = '$username'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    echo 'Użytkownik o podanej nazwie już istnieje.';
} else {
    // Haszowanie hasła
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Dodanie użytkownika do bazy danych
    $insertQuery = "INSERT INTO uzytkownicy (Id, username, password, isAdmin) VALUES (null, '$username', '$hashedPassword', 0)";
    if ($conn->query($insertQuery) === TRUE) {
        echo 'Rejestracja zakończona sukcesem.';
    } else {
        echo 'Błąd podczas rejestracji: ' . $conn->error;
    }
}

$conn->close();


