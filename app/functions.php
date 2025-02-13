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

function authorize($condition,$status=Response::FORBIDDEN){
if(!$condition){
    abort($status);
}
}

function base_path($path){
    return BASE_PATH.$path;
}

function view($path,$attributes=[]){
    extract($attributes);
    require base_path('views/'.$path);
}
?>