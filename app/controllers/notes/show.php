<?php 
$currentUserId=1;
$config = require base_path('config.php');
$db = new Database($config['database']);

$note = $db->query('select * from notes where id=:id', [
    'id'=>$_GET['id']])->findOrFail();
// dd(val: $note);

authorize($note['user_id']===$currentUserId);

view('notes/show.view.php',[
    'heading' => 'Notes',
    'note' => $note
]);
?>