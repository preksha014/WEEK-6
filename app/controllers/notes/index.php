<?php 
$heading="My Notes";
$config = require('config.php');
$db = new Database($config['database']);

$query = "select * from notes where user_id=1";
$notes = $db->query($query)->get();
// dd($notes);

require 'views/notes/index.view.php';
?>