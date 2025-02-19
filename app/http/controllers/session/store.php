<?php
//login the user if credentials matches
use Core\Authenticator;
use Http\Forms\LoginForm;


    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);

$auth = new Authenticator();
if ($auth->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}

if (!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

redirect('/');