<?php 
session_start();

function dbConnection(){
    $db["username"] = "photofklejka";
    $db["password"] = "password";
    $db["dbname"] = "photofklejka";
    $db["url"] = "localhost";

    return new mysqli($db["url"], $db["username"], $db["password"], $db["dbname"]);
}

function setupSession($user){
    $_SESSION["userId"] = $user["ID"];
    $_SESSION["username"] = $user['username'];
    $_SESSION["isAdmin"] = $user['isAdmin'];
}

function generateRedirect(){
    echo '<meta http-equiv="refresh" content="0; url=\'index.php\'" />';
}

function createLoginRedirectWhenNotLoggedIn(){
    if(!isset($_SESSION["username"]))
    echo '<meta http-equiv="refresh" content="0; url=\'login.php\'" />';
}

function logout(){
    $_SESSION["userId"] = null;
    $_SESSION["username"] = null;
    $_SESSION["isAdmin"] = null;
}