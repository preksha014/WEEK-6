<?php

//login the user if credentials matches
use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (!$form->validate($email, $password)) {
      return view('session/create.view.php', [
        'errors' => $form->errors(),
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
