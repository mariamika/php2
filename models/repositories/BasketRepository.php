<?php
namespace app\models\repositories;
use app\base\App;
use app\models\entities\Basket;

class BasketRepository extends Repository
{
    public $id_user;

    /**
     * BasketRepository constructor.
     * @param $id_user
     */
    public function __construct()
    {
        $this->id_user = App::call()->session->getIdUser();
    }


    public function getTableName()
    {
        return 'basket';
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

    /**
     * Список товаров в корзине пользователя
     */
    public function getBasket(){
        var_dump($this->id_user);
        $sql = "select p.id, p.name , p.description, b.amount, c.name as category, p.price, p.producer  from basket b 
                inner join product p on b.id_product = p.id
                inner join category c on p.id_category = c.id
                where b.id_user = {$this->id_user}";
        $basket = $this->db->queryObject($sql, [], $this->getEntityClass());
        if ($basket){
            return $basket;
        } else {
            return false;
        }
    }

    /**
     * Количество товаров в корзине пользователя для отображения его в меню на каждой странице
     */
    public function getCounts(){
        $sql = "select sum(amount) as amount from {$this->getTableName()} where id_user = :id_user";
        try{
            return $this->db->queryObject($sql,[':id_user' => $this->id_user], $this->getEntityClass())[0];
        } catch (\Exception $e){
            echo '<br>Количество товара в корзине не найдено<br>'; echo $e->getMessage();
        }
    }

    /**
     * Итоговая стоимость заказа в корзине (возможно это надо перенесте в OrderRepository)
     */
    public function getTotalCost(){
        $sql = "select sum(a.price * b.amount)as total from product a
                inner join basket b on a.id = b.id_product
                where b.id_user = :id_user";
        try{
            $total = $this->db->queryObject($sql,[':id_user' => $this->id_user], $this->getEntityClass());
        } catch (\Exception $e){
            echo '<br>Ошибка! Запрос итоговой стоимости не выполнен.<br>'; echo $e->getMessage();
        }
        return $total[0]->total;
    }

    /**
     * Удаление всего количества конкретного товара из корзины (у конкретного пользователя)
     */
    public function delFromBasket(){
        $id_product = App::call()->request->getParams('id');
        $tableName = $this->getTableName();
        $sql = "delete from {$tableName} where id_user = :id_user and id_product = :id_product";
        try{
            $this->db->execute($sql,[':id_user' => $this->id_user, ':id_product' => $id_product]);
            return true;
        } catch (\Exception $e){
            echo '<br>Не удалось удалить товар из корзины.<br>'; echo $e->getMessage();
            return false;
        }
    }

    /**
     * Изменение количества товара в корзине
     */
    public function changeBasket(){
        $id_product = App::call()->request->getParams('id');
        $tableName = $this->getTableName();
        $amount = App::call()->request->getParams('amount');
        $sql = "update {$tableName} set amount = :amount where id_user = :id_user and id_product = :id_product";
        try {
            $this->db->queryObject($sql, [':amount' => $amount, ':id_user' => $this->id_user, ':id_product' => $id_product], $this->getEntityClass());
            return true;
        } catch (\Exception $e){
            echo '<br>Не удалось изменить количество товара в корзине.<br>'; echo $e->getMessage();
            return false;
        }
    }

    /**
     * Добавление товара в корзину (в нужном количестве для конкретного пользователя)
     */
    public function addInBasket(){
        $id_product = App::call()->request->getParams('id');
        $amount = App::call()->request->getParams('amount');
        $tableName = $this->getTableName();

        $sql = "select * from {$tableName} where id_user = :id_user and id_product = :id_product";
        $product = $this->db->queryOne($sql, [':id_user' => $this->id_user, ':id_product' => $id_product]);

        if ($product['id_product']){
            $sql = "update {$tableName} set amount = amount + :amount where id_user = :id_user and id_product = :id_product";
            try {
                $this->db->execute($sql,[':amount' => $amount, ':id_user' => $this->id_user, ':id_product' => $id_product]);
            } catch (\Exception $e){
                echo 'Невозможно выполнить update корзины. <br>'; echo $e->getMessage();
            } finally {return true;}
        }else {
            $sql = "insert into {$tableName} (amount,id_product,id_user) values (:amount, :id_product, :id_user)";
            try {
                $this->db->execute($sql,[':amount' => $amount, ':id_user' => $this->id_user, ':id_product' => $id_product]);
            } catch (\Exception $e){
                echo 'Невозможно выполнить insert корзины. <br>'; echo $e->getMessage();
            } finally {return true;}
        }
    }
}