<?php
namespace Core;
use Core\App;
use Core\Database;
class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                //mark that user is logged in
                $this->login([
                    'email' => $user['email'],
                ]);
                return true;

            }
            return false;
        }
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];
        session_regenerate_id(true);
    }

    public function logout()
    {
        // $_SESSION = [];
        // session_destroy();
        // $params = session_get_cookie_params();
        // return setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        Session::destroy();
    }
}