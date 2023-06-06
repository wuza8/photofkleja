<!DOCTYPE HTML>
<?php include "loginuser.php" ?>
<HEAD>
    <title>Fotofkleja - Logowanie</title>
    <link rel="stylesheet" href="style.css">
    <?php tryLogin(); ?>
</HEAD>




<body>
    <div id="login-content">
        <br>
        <span id="logo-login" onclick='window.location="index.html"'>PhotoFkleja</span>
        <br><br>
        <form id="login-form" method="POST" action="login.php">
            <br><br>
            <input type="text" name="username" placeholder="login">
            <input type="password" name="password" placeholder="hasło">
            <div id="login-error"><?php loginError(); ?> </div>
            <table id="buttonTable">
                <tr>
                    <td>
                        <input class="login-button" type="submit" value="Zaloguj">
                    </td>
                    <td>
                        <input class="login-button" type="button" onclick='window.location="register.php"' value="Rejestracja">
                    </td>
                </tr>
            </table>
            
        </form>
       
    </div>
    

</body>