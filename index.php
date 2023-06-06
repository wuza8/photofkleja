<!DOCTYPE HTML>
<?php include 'config.php'; ?>
<?php include 'app.php'; ?>
<HEAD>
    <title>Fotofkleja</title>
    <link rel="stylesheet" href="style.css">
    
</HEAD>

<body>
    <?php include "footer.php"; createFooter(); ?>
    
    <div id="images">
       <?php generatePictures(); ?>
    </div>
</body>