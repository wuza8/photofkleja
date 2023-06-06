<!DOCTYPE HTML>

<HEAD>
    <title>Fotofkleja - Logowanie</title>
    <link rel="stylesheet" href="style.css">
    
</HEAD>

<body>
    <div id="login-content">
        <br>
        <span id="logo-login" onclick='window.location="index.html"'>PhotoFkleja</span>
        <br><br>
        <form action="createuser.php" method="POST" id="login-form" >
            <br><br>
            <input type="text" name="username" placeholder="login">
            <input type="password" name="password" placeholder="hasło">
            <input type="password" placeholder="powtórz hasło">
            <table id="buttonTable">
                <tr>
                    <td>
                        <input class="login-button" type="submit" value="Zarejestruj">
                    </td>
                    <td>
                        <input class="login-button" type="button" onclick='window.location="login.php"' value="Logowanie">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

<!DOCTYPE HTML>

<HTML>
<HEAD>  </HEAD>

</HTML>