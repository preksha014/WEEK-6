<?php
require('functions.php');
require('router.php');
require('Database.php');

$config = require('config.php');
$db = new Database($config['database']);

$title = $_GET['title'];
//dd($id);
$query = "select * from posts where title=?";
$items = $db->query($query, [$title])->fetch();
dd($items);
// foreach($items as $item){
//     echo '<li>'.$item['title'].'</li>';
// }
?>