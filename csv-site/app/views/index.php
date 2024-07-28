<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Upload - <? echo $header ?></title>
    <link rel="stylesheet" href="static/main.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">Main</a></li>
            <li><a href="/add">Add</a></li>
            <li><a href="/edit">Edit</a></li>
        </ul>
    </nav>
    <main>
        <h1 class="title"><? echo $header ?></h1>
        <div class="main">
            <?php include $content ?>
        </div>
    </main>

</body>

</html>