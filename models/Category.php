<?php
namespace app\models;


class Category extends Model
{
    public $nameCategory;

    public function getTableName() : string
    {
        return 'category';
    }
}