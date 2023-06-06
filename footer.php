<?php

function createFooter(){

    if(!isset($_SESSION['userId'])){
    echo <<<HTML
    <div id="footer">
        <span id="logo" onclick='window.location="index.php"'>PhotoFkleja</span>
        <div id="login" onclick='window.location="login.php"'>Zaloguj się</div>
        <div id="new" onclick='window.location="new.php"'>+ dodaj</div>
    </div>
    HTML;
    }
    else{
        echo <<<HTML
        <div id="footer">
            <span id="logo" onclick='window.location="index.php"'>PhotoFkleja</span>
        HTML 
        . 
        '<div onclick=\'window.location="logout.php"\' id="login">'.$_SESSION['username'].'</div>'
        .
        <<<HTML
            <div id="new" onclick='window.location="new.php"'>+ dodaj</div>
        </div>
        HTML;
    }
}