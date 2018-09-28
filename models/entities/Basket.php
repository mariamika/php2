<?php
namespace app\models\entities;


class Basket extends DataEntity
{
    public $id;
    public $amount;
    public $selectProduct;
    public $totalCost;

    /**
     * Basket constructor.
     * @param $id
     * @param $amount
     * @param $selectProduct
     * @param $totalCost
     */
    public function __construct($id = null, $amount = null, $selectProduct = null, $totalCost = null)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->selectProduct = $selectProduct;
        $this->totalCost = $totalCost;
    }




}