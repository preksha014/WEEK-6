<?php
use Core\Container;
// use Core\Database;
// use Core\App;

// $config = require base_path('config.php');
// $db = new Database($config['database']);
// $db = App::resolve(Database::class);

$db=Container::resolve('Core\Database');
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();