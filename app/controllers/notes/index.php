<?php 
use Core\Database;
use Core\App;
// use Core\Container;
// $config = require base_path('config.php');
// $db = new Database($config['database']);
// $db=Container::resolve(Database::class);
$db = App::resolve(Database::class);
$notes = $db->query('select * from notes where user_id=3')->get();

view('notes/index.view.php',[
    'heading' => 'My Notes',
    'notes' => $notes
]);

?>