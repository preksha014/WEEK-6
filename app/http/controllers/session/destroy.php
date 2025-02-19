<?php

use Core\Authenticator;
//log out user
$logout=new Authenticator;
$logout->logout();
header('location: /');
exit();