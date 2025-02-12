<?php
function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
    die();
}

function urlIs($val)
{
    return $_SERVER['REQUEST_URI'] === $val;
}
?>