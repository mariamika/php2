<?php
namespace app\models\entities;


class Order extends DataEntity
{
    public $allSelectProduct;
    public $delivery;
    public $user;
    public $comments;
    public $paymentMethod;

    /**
     * Order constructor.
     * @param $allSelectProduct
     * @param $delivery
     * @param $user
     * @param $comments
     * @param $paymentMethod
     */
    public function __construct($allSelectProduct = null, $delivery = null, $user = null, $comments = null, $paymentMethod = null)
    {
        $this->allSelectProduct = $allSelectProduct;
        $this->delivery = $delivery;
        $this->user = $user;
        $this->comments = $comments;
        $this->paymentMethod = $paymentMethod;
    }


}