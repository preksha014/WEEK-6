<?php
require 'Validator.php';
$heading="My Notes";
$config = require'config.php';
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD']==='POST'){
    $errors=[];
   
    if(!Validator::string($_POST['body'],1,1000)){
        $errors['body']="Body of no more than 1000 characters is required";
    }
    // dd($errors);
    if(empty($errors)){
        $db->query("INSERT INTO notes(body,user_id) VALUES(:body,:user_id)",[
            'body'=>$_POST['body'],
            'user_id'=>1
        ]);
    }
}

require 'views/notes/create.view.php';