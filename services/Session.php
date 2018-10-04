<?php
namespace app\services;


class Session
{

    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    public function getIdUser(){
        //$_SESSION['id_user'] = 0;
        return $_SESSION['id_user'] ?: 0;
    }

    public function getLogPass(){
        $authorization['login'] = $_POST['login'];
        $authorization['password'] = $_POST['password'];
        return $authorization;
    }
}