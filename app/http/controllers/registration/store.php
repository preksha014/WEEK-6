<?php
use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate user form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide valid email";
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide atleast 7 character password";
}
if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);
//check if user email is already exists or not
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// If yes, redirect to login page
if ($user) {
    header('location: /');
    exit();

    //If not exist, then save to database and then login and redirect
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    //mark that user is logged in
    $authenticator = new Authenticator();
    $authenticator->login($user);

    header('location: /');
    exit();
}
