<?php
namespace app\models\entities;

class Product extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $producer;
    public $id_category;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $producer
     * @param $categoryProduct
     */
    public function __construct($id = null, $name = null, $description = null, $price = null, $producer = null, $id_category = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->producer = $producer;
        $this->id_category = $id_category;
    }


}