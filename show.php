<!DOCTYPE HTML>
<?php include 'config.php'; ?>
<HEAD>
    <title>Fotofkleja</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function onLoad(){
            let info = "";
            
            let img = document.querySelector(".image-show");
            info = "Rozdzielczość: " + img.width + "x" + img.height + "<br>";

            document.querySelector("#toGenInfo").innerHTML = info;
        }
    </script>
</HEAD>

<body onLoad="onLoad()">
    <?php include "footer.php"; createFooter(); ?>
    <?php include "app.php"; $image = loadImage(); ?>
    <div id="show-content">

        <img class="image-show" src="<?php echo "./pictures/" . $image["filename"]; ?>">
        <h2>Informacje o zdjęciu</h2>
        Autor: <?php echo $image["username"] ?> <br>
        <span id="toGenInfo"> </span>
        Pobierz: <a href="<?php echo "./pictures/" . $image["filename"]; ?>" download>link</a> <br>

        <?php 
            if($_SESSION["isAdmin"]){ 
                echo "Administracja: <a href=\"deleteimage.php?img=".$_GET["img"]."\"> Usuń zdjęcie </a>";
            }
        ?>
        <br>
        <br>
        <br>
    </div>
</body>