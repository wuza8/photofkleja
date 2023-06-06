<?php
include 'config.php';



function tryLogin(){
    $GLOBALS['loginError'] = '';

    //Check if form is filled
    $formNotFilled = !isset($_POST['username']) || !isset($_POST['password']);
    if($formNotFilled){
        return;
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Take user from database
    $conn = dbConnection();
    $selectQuery = "SELECT * FROM uzytkownicy WHERE username = '$username'";
    $selectResult = $conn->query($selectQuery);

    //Check if user with that username exists, if not - exit
    $userNotFound = $selectResult->num_rows == 0;

    if($userNotFound){
        $GLOBALS['loginError'] = 'Nieprawidłowe dane logowania.';
        return;
    }

    //Check the user password, if password is wrong - exit
    $user = $selectResult->fetch_assoc();

    $isPasswordGood = password_verify($password, $user['password']);

    if(!$isPasswordGood){
        $GLOBALS['loginError'] = 'Nieprawidłowe dane logowania.';
        return;
    }

    //Setup session and close db connection
    setupSession($user);
    $conn->close();

    //Generate redirect inside <head> for main page
    generateRedirect();
}



function loginError(){
    echo $GLOBALS['loginError'];
}