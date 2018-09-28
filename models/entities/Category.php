<?php
namespace app\models\entities;


class Category extends DataEntity
{
    public $id;
    public $nameCategory;

    /**
     * Category constructor.
     * @param $id
     * @param $nameCategory
     */
    public function __construct($id = null, $nameCategory = null)
    {
        $this->id = $id;
        $this->nameCategory = $nameCategory;
    }


}