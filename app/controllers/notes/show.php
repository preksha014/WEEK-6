<?php
// use Core\Container;
use Core\Database;
use Core\App;
// $config = require base_path('config.php');
// $db = new Database($config['database']);
// $db=Container::resolve('Core\Database');
$db = App::resolve(Database::class);
$currentUserId = 3;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);