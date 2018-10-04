<?php
namespace app\controllers;

use app\base\App;
use app\models\repositories\UserRepository;

class UserController extends Controller
{
    public function actionIndex(){
        $session = App::call()->session->getIdUser();
        if ($session != 0){
            $user = (new UserRepository())->getUserById($session);
            if (!$user){
                throw new \Exception('Пользователь не найден!');
            }
            echo $this->render('account',['user' => $user]);
        } else {
            $method = App::call()->request->getRequestMethod();
            if ($method == 'POST'){
                $authorization = App::call()->session->getLogPass();
                $check = (new UserRepository())->getUserByLoginPass($authorization);
                if (!$check){
                    if(empty($authorization)){$mes = 'Вы не вошли в свой аккаунт!';}
                    else {$mes = 'Неправильная пара логин - пароль!!!';}
                    echo $this->render('login',[],$mes);
                } elseif ($check){
                    $_SESSION['id_user'] = $check->id;
                    $user = (new UserRepository())->getUserById($check->id);
                    echo $this->render('account',['user' => $user]);
                }
            } else {
                $mes = 'Вы не вошли в свой аккаунт!';
                echo $this->render('login',[],$mes);
            }
        }
    }


}