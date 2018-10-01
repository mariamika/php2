<?php
namespace app\models\repositories;
use app\models\entities\Basket;

class BasketRepository extends Repository
{
    public function getTableName()
    {
        return 'basket';
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

    public function getBasket(){
        $sql = "select p.id, p.name , p.description, b.amount, c.name as category, p.price, p.producer  from basket b 
                inner join product p on b.id_product = p.id
                inner join category c on p.id_category = c.id
                where b.id_user = 2;";
        return $this->db->queryObject($sql, [], $this->getEntityClass());
    }


}