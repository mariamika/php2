<?php
namespace app\models;


class Category extends DbModel
{
    public $id;
    public $nameCategory;

    public static function getTableName()
    {
        return 'category';
    }
}