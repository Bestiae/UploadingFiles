<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS.css">
    <link rel="stylesheet" href="CSS_site.css">
    <script src="sortable.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add files to upload</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <a href="index.php"><img class="logo" src="long.svg" alt="Tu bolo moje logo..."></a>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Files table from server</a></li>
                <li><a href="uplodPage.php">Add file to server</a></li>
            </ul>
        </nav>
    </div>

    <div id="table">
        <?php include 'config.php';  ?>
    </div>

    <div id="form_input">
        <form  enctype="multipart/form-data"  method="post">

            <input type="hidden" name="MAX_FILE_SIZE" value="30000000">

            <!-- Название элемента input определяет имя в массиве $_FILES -->
            <label for="file">File Name: </label>

            <input type="file" name="userfile" id="file"/>
            <input type="submit" value="Send file"/>
            <!-- ЧТО ДЕЛАТЬ? ПРИ ОТПРАВКИ ЗАПРОСА, ОТКРЫВАЕТСЯ СКРИПТ, КОТОРЫЙ МНЕ НЕ НУЖНО ОТКРЫВАТЬ -->
        </form>
    </div>

    <footer>
        Copyright 2020 <a href="https://www.facebook.com/miroslav.khoma" target="_blank">contact me</a>
    </footer>
</body>
</html>