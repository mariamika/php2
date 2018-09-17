<?php
namespace app\models;


class Category extends Model
{
    public $id;
    public $nameCategory;

    public function getTableName() : string
    {
        return 'category';
    }
}