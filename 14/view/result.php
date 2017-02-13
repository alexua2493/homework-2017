<?php
session_start();
$_SESSION['qwery'] = $_POST['textarea'];
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <title>Document</title>
    </head>
    <body>
    <form method="post">
        <p>Введите запрос:</p>
             <textarea cols="30" rows="10" name="textarea">
                 <?= $_SESSION['qwery']; ?>
             </textarea>
        <input type="submit" name="ta" value="action"></input>
    </form>
    </body>
    </html>
<?php require_once '../models/db.php'; ?>