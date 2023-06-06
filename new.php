<!DOCTYPE HTML>
<?php include 'config.php'; ?>
<HEAD>
    <title>Fotofkleja</title>
    <link rel="stylesheet" href="style.css">
    <?php createLoginRedirectWhenNotLoggedIn() ?>
    <script>
        function onLoad(){
            document.querySelector("#imginput").onchange = evt => {
                const [file] = document.querySelector("#imginput").files
                if (file) {
                    document.querySelector(".image-show").src = URL.createObjectURL(file)
                }
            }
        }   
    </script>
</HEAD>

<body onLoad="onLoad()">
    
    <?php include "footer.php"; createFooter(); ?>
    
    <div id="show-content">
        <div> Wysyłanie zdjęcia </div>
        <form action="sendpicture.php" method="POST" enctype="multipart/form-data">
            <div class="floatleft"> <input id="imginput" type="file" name="photo"> </div>
            <div class="floatleft"> <button type="submit" name="submit">Wyślij zdjęcie</button> </div>
        </form>

        <div class="add-image"></div>
        <img class="image-show" src="podglad.png">
    </div>
</body>