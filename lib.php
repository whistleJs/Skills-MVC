<?php

use src\App\Session;

function session()
{
    return new Session();
}

function user()
{
    return session()->get('user', true);
}

function redirect($url, $msg, $type = 'success')
{
    session()->set($type, $msg);

    header("location: $url");

    exit;
}

function back($msg, $type = 'error')
{
    session()->set($type, $msg);

    echo "<script>history.back()</script>";

    exit;
}

function output($str)
{
    return str_replace(' ', '&nbsp;', htmlentities($str));
}

function makeJSON()
{
    $obj = new \StdClass();
    $obj->status = 200;

    return $obj;
}

function returnJSON($obj)
{
    echo json_encode($obj);

    exit;
}