<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<pre>
    <?php
        print_r($movieData);
    ?>

    <pre>
    <form action="/ReactionModel/comment/<?php echo $movieData->id?>" method="post">
        <input type="text" name="comment" placeholder="Yorumunuzu giriniz"/>
    </form>
</body>
</html>