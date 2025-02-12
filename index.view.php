<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Recommanded Books</h1>
    <?php foreach ($filteredBooks as $book): ?>
        <li>
            <?= $book['name'] ?>-(<?= $book['author'] ?>)
        </li>
    <?php endforeach; ?>
</body>

</html>