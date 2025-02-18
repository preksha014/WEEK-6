<?php

//login the user if credentials matches
use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate user form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide valid email";
}
if (!Validator::string($password)) {
    $errors['password'] = "Please provide valid password";
}
if (!empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user) {
    if (password_verify($password, $user['password'])) {
        //mark that user is logged in
        login([
            'email' => $user['email'],
        ]);
        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => 'No matching account is found for that email address and password',
]);
